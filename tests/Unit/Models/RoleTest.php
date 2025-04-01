<?php

use App\Models\Role;
use App\Models\User;

test('role can be created', function () {
    $role = Role::factory()->create();

    expect($role)
        ->toBeInstanceOf(Role::class)
        ->and($role->name)->not->toBeEmpty()
        ->and($role->slug)->not->toBeEmpty();
});

test('role can be assigned to user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    $user->roles()->attach($role);

    expect($user->roles)
        ->toHaveCount(1)
        ->and($user->roles->first()->id)->toBe($role->id);
});

test('user can have multiple roles', function () {
    $user = User::factory()->create();
    $roles = Role::factory(3)->create();

    $user->roles()->attach($roles);

    expect($user->roles)->toHaveCount(3);
});

test('role can have multiple users', function () {
    $users = User::factory(3)->create();
    $role = Role::factory()->create();

    foreach ($users as $user) {
        $user->roles()->attach($role);
    }

    expect($role->users)->toHaveCount(3);
});

test('role has predefined states', function () {
    $adminRole = Role::factory()->create(['name' => 'Admin', 'slug' => 'admin']);
    $clubMemberRole = Role::factory()->create(['name' => 'Club Member', 'slug' => 'club_member']);
    $householdRole = Role::factory()->create(['name' => 'Household', 'slug' => 'household']);
    $sponsorRole = Role::factory()->create(['name' => 'Sponsor', 'slug' => 'sponsor']);

    expect($adminRole->slug)->toBe('admin')
        ->and($clubMemberRole->slug)->toBe('club_member')
        ->and($householdRole->slug)->toBe('household')
        ->and($sponsorRole->slug)->toBe('sponsor');
});
