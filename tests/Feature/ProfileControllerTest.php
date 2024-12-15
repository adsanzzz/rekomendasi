<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        // Membuat pengguna baru
        $user = User::factory()->create();

        // Pastikan pengguna ada di database
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function testEditProfileForm()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertStatus(200)
            ->assertViewIs('profile.edit');
    }

    public function testDeleteAccount()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->delete(route('profile.destroy'), [
                'password' => 'password',
            ])
            ->assertRedirect('/');

        // Pastikan pengguna tidak ada di database
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function testUpdateUserProfile()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status', 'profile-updated');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    public function testUpdateUserProfileWithInvalidData()
{
    $user = User::factory()->create();

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => '',
            'email' => 'not-an-email',
        ])
        ->assertSessionHasErrors(['name', 'email']); // Pastikan ada error
}

}
