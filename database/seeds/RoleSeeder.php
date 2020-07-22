<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);
        $user = Role::create(['name' => 'guest']);

        // get permissions
        $order = Permission::create(['name' => 'can order']);

        // staff permissions
        $cmsAccess = Permission::create(['name' => 'can use cms']);
        $completeOrder = Permission::create(['name' => 'can complete order']);
        $editItems = Permission::create(['name' => 'can edit items']);
        $editCategories = Permission::create(['name' => 'can edit categories']);

        // admin specific permissions (admin gets all permissions)
        $promote = Permission::create(['name' => 'can promote']);
        $editPayments = Permission::create(['name' => 'can edit payments']);
        $viewUsers = Permission::create(['name' => 'can view users']);

        $admin->syncPermissions([$cmsAccess, $completeOrder, $editCategories, $editItems, $promote, $editPayments, $viewUsers, $order]);
        $staff->syncPermissions([$cmsAccess, $order, $completeOrder, $editItems, $editCategories]);
        $user->syncPermissions([$order]);
    }
}