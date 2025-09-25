<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RepairRequest;
use App\Models\Property;
use App\Enums\UserRole;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [ UserRole::PROPERTY_OWNER, UserRole::REGULAR ];

        $repeat = 30;
        
        User::factory()->count($repeat)
            ->afterCreating(function (User $user) use($role) {
                shuffle($role);
                $user->assignRoleAndPin( array_shift( $role ) );
            })
            ->create();

        RepairRequest::factory()->count($repeat)->create();

        Property::factory()->count($repeat)
            ->afterCreating(function (Property $property) {
                $tenants = User::factory()->count(5)
                    ->afterCreating(function (User $user) {
                        $user->assignRoleAndPin( UserRole::TENANT );
                    })
                    ->create();
                $property->tenants()->saveMany($tenants);
            })->create();
    }
}
