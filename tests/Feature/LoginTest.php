<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman login dapat diakses.
     */
    public function test_halaman_login_dapat_diakses(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('login');
    }

    /**
     * Test pengguna dengan role user dapat login dengan akun valid.
     */
    public function test_pengguna_user_dapat_login_dengan_akun_valid(): void
    {
        $user = User::factory()->create([
            'role' => 'user', // Role user
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/landing'); // Sesuaikan halaman redirect setelah login berhasil
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test login gagal jika email atau password kosong.
     */
    public function test_login_gagal_jika_email_atau_password_kosong(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /**
     * Test login gagal jika email atau password salah.
     */
    public function test_login_gagal_jika_email_atau_password_salah(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /**
     * Test login gagal jika email benar dan password salah.
     */
    public function test_login_gagal_jika_email_benar_dan_password_salah(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /**
     * Test login gagal jika password benar dan email salah.
     */
    public function test_login_gagal_jika_password_benar_dan_email_salah(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'wrongemail@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /**
     * Test pengguna user diarahkan ke halaman user setelah login.
     */
}
