<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

final class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Club Member', 'slug' => 'club_member'],
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Household', 'slug' => 'household'],
            ['name' => 'Sponsor', 'slug' => 'sponsor'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
