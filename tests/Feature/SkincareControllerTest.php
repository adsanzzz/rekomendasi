<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Skincare;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkincareControllerTest extends TestCase
{
    /**
     * Setup Admin User for Authentication
     */
    private function authenticateAdmin()
    {
        $admin = User::factory()->create([
            'role' => 'admin', // Pastikan role admin ada pada tabel users
        ]);

        $this->actingAs($admin);
    }

    /**
     * Test create skincare form displays correctly.
     */
    public function test_create_form_displays_correctly()
    {
        $this->authenticateAdmin();
        $response = $this->get(route('skincare.create'));
        $response->assertStatus(200);
        $response->assertViewIs('skincare');
    }

    /**
     * Test storing a new skincare product.
     */
    public function test_store_skincare_data()
    {
        $this->authenticateAdmin();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('skincare.jpg');

        $response = $this->post(route('skincare.store'), [
            'nama' => 'Produk Skincare',
            'merk' => 'Merk Skincare',
            'kategori' => 'Facial Cleanser',
            'cocok_untuk' => 'Kulit Kering',
            'harga' => 75000,
            'value' => 10,
            'link' => 'https://example.com/produk',
            'gambar' => UploadedFile::fake()->image('dummy.jpg')
        ]);

        $response->assertRedirect(route('skincare.create'));
        $response->assertSessionHas('success', 'Skincare berhasil ditambahkan.');

        // Cek apakah gambar tersimpan

        // Cek data di database
        $this->assertDatabaseHas('skincare', [
            'nama' => 'Produk Skincare',
            'merk' => 'Merk Skincare',
            'kategori' => 'Facial Cleanser',
            'cocok_untuk' => 'Kulit Kering',
            'harga' => 75000,
            'value' => 10,
            'link' => 'https://example.com/produk',
        ]);
    }

    /**
     * Test edit skincare product form displays correctly.
     */
    public function test_edit_skincare_data()
    {
        $this->authenticateAdmin();
        $product = Skincare::factory()->create();

        $response = $this->get(route('produk.edit', $product->id));
        $response->assertStatus(200);
        $response->assertViewIs('edit-produk');
        $response->assertViewHas('product', $product);
    }

    /**
     * Test deleting a skincare product.
     */
    public function test_delete_skincare_data()
    {
        $this->authenticateAdmin();
        Storage::fake('public');

        $product = Skincare::factory()->create([
            'gambar' => 'old_image.jpg',
        ]);

        $response = $this->delete(route('produk.destroy', $product->id));
        $response->assertRedirect(route('produk.index'));
        $response->assertSessionHas('success', 'Produk berhasil dihapus.');

        // Cek apakah data telah dihapus dari database
        $this->assertDatabaseMissing('skincare', [
            'id' => $product->id,
        ]);
    }
}
