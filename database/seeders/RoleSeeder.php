<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'slug' => 'admin'],
            ['name' => 'editor', 'slug' => 'editor'],
            ['name' => 'manager', 'slug' => 'manager'],
            ['name' => 'customer', 'slug' => 'customer'],
            ['name' => 'viewer', 'slug' => 'viewer'],            
            ['name' => 'contributor', 'slug' => 'contributor'],
            ['name' => 'moderator', 'slug' => 'moderator'],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
