<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Vanguard\Permission;
use Vanguard\PermissionRole;

class AddCourseSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'id'=>8,
            'name' => 'manage.courses',
            'display_name' => 'Courses',
            'removable' => 0
        ]);

        Permission::create([
            'id'=>9,
            'name' => 'courses.list',
            'display_name' => 'List Courses',
            'removable' => 0
        ]);

        PermissionRole::create([
            'permission_id' => 8,
            'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 9,
            'role_id' => 2
        ]);
    }
}
