<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Enums\UserRole;
use App\Models\User;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = array_unique(
            array_merge(
                $this->superAdminPermissions(),
                $this->adminPermissions(),
                $this->propertyOwnerPermissions(),
                $this->tenantPermissions(),
                $this->regularPermissions(),
            )
        );

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        $this->createRoleAndPermissions(UserRole::SUPER_ADMIN, $this->superAdminPermissions());
        $this->createRoleAndPermissions(UserRole::ADMIN, $this->adminPermissions());
        $this->createRoleAndPermissions(UserRole::PROPERTY_OWNER, $this->propertyOwnerPermissions());
        $this->createRoleAndPermissions(UserRole::TENANT, $this->tenantPermissions());
        $this->createRoleAndPermissions(UserRole::REGULAR, $this->regularPermissions());

        //$this->createUserSuperAdmin();
        //$this->createUserAdmin();
    }

    private function superAdminPermissions()
    {
        return array_merge(
            $this->adminPermissions(),
            [
                'create users',
            ],
        );
    }

    private function adminPermissions()
    {
        return array_merge(
            $this->generateCrudPermissions('properties'),
            $this->generateCrudPermissions('videos_recordings_pictures'),
            $this->generateCrudPermissions('progress_sheets'),
            [
                'read users',
                'update users',
                'delete users'
            ],
            [
                'read payments',
                'read repair_requests',
                'update repair_requests',
                'delete repair_requests',
                'download repair_requests'
            ],
        );
    }

    private function propertyOwnerPermissions()
    {
        return array_merge(
            [
                'read videos_recordings_pictures',
                //'create videos_recordings_pictures',
                'read progress_sheets',
                'update users',
                'read properties',
                'read payments',
                'create payments',
                'read repair_requests',
                'create repair_requests',
                'download repair_requests'
            ]
        );
    }

    private function tenantPermissions()
    {
        return array_merge(
            [
                'read videos_recordings_pictures',
                'create videos_recordings_pictures',
                'update users',
                'read payments',
                'create payments',
                'read repair_requests',
                'create repair_requests',
            ]
        );
    }

    private function regularPermissions()
    {
        return array_merge(
            [
                //
            ]
        );
    }

    protected function createRoleAndPermissions($roleName, $permissions)
    {
        $role = Role::updateOrCreate(['name' => $roleName]);
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }

    protected function generateCrudPermissions($name)
    {
        return collect(['create', 'read', 'update', 'delete'])
            ->map(function ($action) use ($name) {
                return sprintf('%s %s', $action, $name);
            })->toArray();
    }

    protected function createUserSuperAdmin()
    {
        $user = User::updateOrCreate([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@email.com',
            'address' => 'Doctors Drive',
            'unit_number' => '3112',
            'city' => 'Los Angeles',
            'zip_code' => '90017',
            'contact_number' => '21543531321',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi--',
            'pin' => 'updateLangLater'
        ]);

        $user->assignRoleAndPin(UserRole::SUPER_ADMIN);

        $user->markEmailAsVerified();
    }

    protected function createUserAdmin()
    {
        $user = User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'address' => 'Doctors Drive',
            'unit_number' => '3112',
            'city' => 'Los Angeles',
            'zip_code' => '90017',
            'contact_number' => '21543531321',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi--',
            'pin' => 'updateLangLater'
        ]);

        $user->assignRoleAndPin(UserRole::ADMIN);

        $user->markEmailAsVerified();
    }
}
