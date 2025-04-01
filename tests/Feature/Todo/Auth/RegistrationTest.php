<?php

declare(strict_types=1);

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register with single role', function () {
    $role = Role::factory()->create(['name' => 'Household', 'slug' => 'household']);

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'roles' => ['household'],
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));

    $user = User::where('email', 'test@example.com')->first();
    expect($user->roles)->toHaveCount(1)
        ->and($user->roles->first()->slug)->toBe('household');
});

test('new users can register with multiple roles', function () {
    Role::factory()->create(['name' => 'Club Member', 'slug' => 'club_member']);
    Role::factory()->create(['name' => 'Household', 'slug' => 'household']);

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'roles' => ['club_member', 'household'],
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));

    $user = User::where('email', 'test@example.com')->first();
    expect($user->roles)->toHaveCount(2)
        ->and($user->roles->pluck('slug')->all())->toEqualCanonicalizing(['club_member', 'household']);
});

test('registration fails with invalid role', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'roles' => ['invalid_role'],
    ]);

    $response->assertSessionHasErrors('roles.0');
    $this->assertGuest();
});

test('registration fails without roles', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertSessionHasErrors('roles');
    $this->assertGuest();
});
