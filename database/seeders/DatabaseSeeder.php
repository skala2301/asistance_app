<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Type;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::firstOrCreate(
        //     ['email' => 'test@example.com'],
        //     [
        //         'name' => 'Test User',
        //         'password' => Hash::make('password'),
        //         'email_verified_at' => now(),
        //     ]
        // );

        $userType = Type::firstOrCreate([
            'name' => class_basename(User::class), 
            'label' => class_basename(User::class)." Type", 
            'description' => "This is the type for statuses used in users"
        ]);

        Status::firstOrCreate([
            'name'=>'enabled', 
            'label' => 'Enabled',
            'type_id' => $userType->id 
        ]);

        Status::firstOrCreate([
            'name'=>'disabled', 
            'label' => 'Disabled',
            'type_id' => $userType->id 
        ]);
        
    }
}
