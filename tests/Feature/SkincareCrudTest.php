<?php

namespace Tests\Feature;

use App\Models\Skincare;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkincareCrudTest extends TestCase
{

    /**
     * Setup untuk pengguna admin.
     */
    private function createAdminUser()
    {
        return User::factory()->create([
            'role' => 'admin',
        ]);
    }

    /**
     * Setup untuk pengguna non-admin.
     */
    private function createNonAdminUser()
    {
        return User::factory()->create([
            'role' => 'user',
        ]);
    }

    /**
     * Test admin dapat menambahkan skincare.
     */
    public function test_admin_dapat_menambahkan_skincare()
{
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->post('/skincare', [
            'nama' => 'Produk Baru',
            'merk' => 'Merk A',
            'kategori' => 'Kategori A',
            'cocok_untuk' => 'All Skin Types',
            'harga' => 100000,
            'value' => 101,
            'link' => 'https://example.com',
            'gambar' => 'dummy.jpg',
        ])
        ->assertRedirect(route('skincare.create')); // Rute yang benar

    $this->assertDatabaseHas('skincare', ['nama' => 'Produk Baru']);
}
    /**
     * Test admin dapat melihat daftar skincare.
     */
    public function test_admin_dapat_melihat_daftar_skincare(): void
    {
        $admin = $this->createAdminUser();
        Skincare::factory()->count(5)->create();

        $this->actingAs($admin)
            ->get('/skincare')
            ->assertStatus(200)
            ->assertSee('Skincare'); // Sesuaikan dengan konten halaman
    }

    /**
     * Test admin dapat mengedit skincare.
     */
    public function test_admin_dapat_mengedit_skincare(): void
    {
        $admin = $this->createAdminUser();
        $skincare = Skincare::factory()->create();

        $this->actingAs($admin)
            ->put("/skincare/{$skincare->id}", [
                'nama' => 'Produk Diedit',
                'merk' => $skincare->merk,
                'kategori' => $skincare->kategori,
                'cocok_untuk' => $skincare->cocok_untuk,
                'harga' => $skincare->harga,
                'value' => $skincare->value,
                'link' => $skincare->link,
                'gambar' => 'dummy_edited.jpg',
            ])
            ->assertRedirect('/produk/index'); // Sesuaikan dengan rute setelah penyimpanan

        $this->assertDatabaseHas('skincare', ['nama' => 'Produk Diedit']);
    }

    /**
     * Test admin dapat menghapus skincare.
     */
    public function test_admin_dapat_menghapus_skincare(): void
    {
        $admin = $this->createAdminUser();
        $skincare = Skincare::factory()->create();

        $this->actingAs($admin)
            ->delete("/skincare/{$skincare->id}")
            ->assertRedirect('/produk/index'); // Sesuaikan dengan rute setelah penghapusan

        $this->assertDatabaseMissing('skincare', ['id' => $skincare->id]);
    }

    /**
     * Test non-admin tidak dapat melakukan operasi CRUD.
     */
    public function test_non_admin_tidak_dapat_melakukan_crud(): void
    {
        $user = $this->createNonAdminUser();
        $skincare = Skincare::factory()->create();

        $this->actingAs($user)
            ->post('/skincare', [
                'nama' => 'Produk Baru',
                'merk' => 'Merk Terkenal',
                'kategori' => 'Serum',
                'cocok_untuk' => 'All Skin Types',
                'harga' => 150000,
                'value' => 101,
                'link' => 'https://example.com',
                'gambar' => 'dummy.jpg',
            ])
            ->assertStatus(403);

        $this->actingAs($user)
            ->put("/skincare/{$skincare->id}", [
                'nama' => 'Produk Diedit',
                'merk' => $skincare->merk,
                'kategori' => $skincare->kategori,
                'cocok_untuk' => $skincare->cocok_untuk,
                'harga' => $skincare->harga,
                'value' => $skincare->value,
                'link' => $skincare->link,
                'gambar' => 'dummy_edited.jpg',
            ])
            ->assertStatus(403);

        $this->actingAs($user)
            ->delete("/skincare/{$skincare->id}")
            ->assertStatus(403);
    }
}
