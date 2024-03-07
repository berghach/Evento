<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(class:CategorySeeder::class);
        $this->call(class:RoleSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        $clients = User::factory(2)->create();

        foreach ($clients as $user) {
            $user->assignRole('client');
        }

        $organisers = User::factory(2)->create();

        foreach ($organisers as $user) {
            $user->assignRole('organiser');
        }

        $this->call(class:EventSeeder::class);
    }
}
