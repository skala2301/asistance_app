<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Type;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleType = Type::firstOrCreate([
            'name' => class_basename(Role::class), 
            'label' => class_basename(Role::class).' Type', 
            'description' => "This is the type for statuses used in roles"
        ]);

        $enabledRoleStatus = Status::firstOrCreate([
            'name' => 'enabled',
            'label' => 'Enabled',
            'type_id' => $roleType->id
        ]);

        Status::firstOrCreate([
            'name' => 'disabled',
            'label' => 'Disabled',
            'type_id' => $roleType->id
        ]);

        Role::firstOrCreate([
            'name' => 'admin',
            'label' => 'Administrator',
            'description' => 'Is the administrator of the site, has access to admin dashboard',
            'status_id' => $enabledRoleStatus->id
        ]);

        Role::firstOrCreate([
            'name' => 'teacher',
            'label' => 'Teacher',
            'description' => 'Can manage courses, add lists, add students to assistance lists',
            'status_id' => $enabledRoleStatus->id
        ]);

        Role::firstOrCreate([
            'name' => 'student',
            'label' => 'Student',
            'description' => 'Students may or may not have accounts, this role is for a student with account which can view their results online',
            'status_id' => $enabledRoleStatus->id
        ]);
    }
}
