<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Type;
use App\Models\Role;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionType = Type::firstOrCreate([
            'name' => class_basename(Permission::class), 
            'label' => class_basename(Permission::class).' Type', 
            'description' => "This is the type for statuses used in permissions."
        ]);

        $enabledPermissionStatus = Status::firstOrCreate([
            'name' => 'enabled',
            'label' => 'Enabled',
            'type_id' => $permissionType->id
        ]);

        Status::firstOrCreate([
            'name' => 'disabled',
            'label' => 'Disabled',
            'type_id' => $permissionType->id
        ]);


        Permission::firstOrCreate([
            'name' => 'super',
            'label' => 'Super Admin Permission',
            'description' => 'This provides access to all abilities.',
            'status_id' => $enabledPermissionStatus->id
        ]);

        Permission::firstOrCreate([
            'name' => 'edit_student_data',
            'label' => 'Edit Student Data',
            'description' => 'Role with this permission can edit any student data.',
            'status_id' => $enabledPermissionStatus->id
        ]);

        Permission::firstOrCreate([
            'name' => 'add_student_to_list',
            'label' => 'Add Student To List',
            'description' => 'This permission allows to add any student to an assistance list.',
            'status_id' => $enabledPermissionStatus->id
        ]);

        Permission::firstOrCreate([
            'name' => 'remove_student',
            'label' => 'Remove Student',
            'description' => 'Role with this permission can remove students from an assistance list.',
            'status_id' => $enabledPermissionStatus->id
        ]);

        Permission::firstOrCreate([
            'name' => 'subscribe_student',
            'label' => 'Subscribe Student',
            'description' => 'Role with this permission can subscribe students to a course.',
            'status_id' => $enabledPermissionStatus->id
        ]);

        Permission::firstOrCreate([
            'name' => 'edit_subscription',
            'label' => 'Edit Subscription',
            'description' => 'Role with this permission can edit student subscriptions.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'remove_subscription',
            'label' => 'Remove Subscription',
            'description' => 'Role with this permission can remove student subscriptions.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_subscription_status',
            'label' => 'Edit Subscription Status',
            'description' => 'Role with this permission can change the status of student subscriptions.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_student_status',
            'label' => 'Edit Student Status',
            'description' => 'Role with this permission can change the status of students.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'add_list',
            'label' => 'Add List',
            'description' => 'Role with this permission can create new assistance lists.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_list',
            'label' => 'Edit List',
            'description' => 'Role with this permission can edit assistance lists.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'remove_list',
            'label' => 'Remove List',
            'description' => 'Role with this permission can remove assistance lists.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_list_status',
            'label' => 'Edit List Status',
            'description' => 'Role with this permission can change the status of assistance lists.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'add_course',
            'label' => 'Add Course',
            'description' => 'Role with this permission can create new courses.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_course',
            'label' => 'Edit Course',
            'description' => 'Role with this permission can edit course information.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'remove_course',
            'label' => 'Remove Course',
            'description' => 'Role with this permission can remove courses.',
            'status_id' => $enabledPermissionStatus->id
        ]);
        
        Permission::firstOrCreate([
            'name' => 'edit_course_status',
            'label' => 'Edit Course Status',
            'description' => 'Role with this permission can change the status of courses.',
            'status_id' => $enabledPermissionStatus->id
        ]);
    }
}
