<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = ['admin', 'organizer', 'player'];

        foreach ($users as $user) {
            $role = Role::create([
                'name' => $user
            ]);
            $profile = User::query()
                ->create([
                    'id' => Uuid::uuid(),
                    'name' => $user,
                    'email' => $user . "@gmail.com",
                    'password' => bcrypt('123456788'),
                    'phone_number' => '09876543678',
                    'email_verified_at' => now()
                ]);
            $profile->assignRole($role);
        }
    }
}
