<?php

declare(strict_types=1);

use App\Models\Role;
use App\Models\User;
use App\Policies\RolePolicy;

test('isAdmin returns true for admin user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create(['name' => 'Admin', 'slug' => 'admin']);
    $user->roles()->attach($role);

    $policy = new RolePolicy();

    expect($policy->isAdmin($user))->toBeTrue();
});

test('isAdmin returns false for non-admin user', function () {
    $user = User::factory()->create();
    $policy = new RolePolicy();

    expect($policy->isAdmin($user))->toBeFalse();
});

test('isClubMember returns true for club member user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create(['name' => 'Club Member', 'slug' => 'club_member']);
    $user->roles()->attach($role);

    $policy = new RolePolicy();

    expect($policy->isClubMember($user))->toBeTrue();
});

test('isClubMember returns false for non-club member user', function () {
    $user = User::factory()->create();
    $policy = new RolePolicy();

    expect($policy->isClubMember($user))->toBeFalse();
});

test('isHousehold returns true for household user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create(['name' => 'Household', 'slug' => 'household']);
    $user->roles()->attach($role);

    $policy = new RolePolicy();

    expect($policy->isHousehold($user))->toBeTrue();
});

test('isHousehold returns false for non-household user', function () {
    $user = User::factory()->create();
    $policy = new RolePolicy();

    expect($policy->isHousehold($user))->toBeFalse();
});

test('isSponsor returns true for sponsor user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create(['name' => 'Sponsor', 'slug' => 'sponsor']);
    $user->roles()->attach($role);

    $policy = new RolePolicy();

    expect($policy->isSponsor($user))->toBeTrue();
});

test('isSponsor returns false for non-sponsor user', function () {
    $user = User::factory()->create();
    $policy = new RolePolicy();

    expect($policy->isSponsor($user))->toBeFalse();
});
