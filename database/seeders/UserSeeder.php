<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => bcrypt('123456'),'role' => 'admin'],
            ['name' => 'Editor User', 'email' => 'editor@example.com', 'password' => bcrypt('123456'), 'role' => 'editor'],
            ['name' => 'Manager User', 'email' => 'manager@example.com', 'password' => bcrypt('123456'), 'role' => 'manager'],            
            ['name' => 'Customer User', 'email' => 'customer@example.com', 'password' => bcrypt('123456'), 'role' => 'customer'],            
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => bcrypt('123456'), 'role' => 'viewer'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => bcrypt('123456'), 'role' => 'contributor'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'password' => bcrypt('123456'), 'role' => 'moderator'],
        ];

        foreach ($users as $data) {
            $createdUser = \App\Models\User::factory()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $role = \App\Models\Role::where('slug', $data['role'])->first();

            if($role) {
                $createdUser->roles()->attach($role);
            }
        }
    }
}
