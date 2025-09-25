<?php

namespace Database\Factories;

use App\Models\RepairRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enums\{RepairRequestStatus, UserRole, PropertyInspection, PropertyMaintenance, PropertyManagementNeed, PropertyLandscaping, PropertyFrequencyOfInspection};

class RepairRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RepairRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $maintenanceSelect = PropertyMaintenance::getValues();
        $inspectionsSelect = PropertyInspection::getValues();
        $mgtNeedsSelect    = PropertyManagementNeed::getValues();
        $landscapingSelect = PropertyLandscaping::getValues();
        $foiSelect         = PropertyFrequencyOfInspection::getValues();

        shuffle($maintenanceSelect);
        shuffle($landscapingSelect);
        shuffle($mgtNeedsSelect);
        shuffle($inspectionsSelect);
        shuffle($foiSelect);

        $user_id = User::factory()
                    ->afterCreating(function (User $user) {
                        $role = [ UserRole::TENANT, UserRole::PROPERTY_OWNER, UserRole::REGULAR ];
                        shuffle($role);
                        $user->assignRoleAndPin( array_shift( $role ) );
                    })
                    ->createOne()
                    ->id;

        return [
            'user_id' => $user_id,
            'maintenance' => array_shift( $maintenanceSelect ),
            'landscaping' => array_shift( $landscapingSelect ),
            'management_needs' => array_shift( $mgtNeedsSelect ),
            'inspections' => array_shift( $inspectionsSelect ),
            'frequency_of_inspection' => array_shift( $foiSelect ),
            'number_of_units' => rand (1, 1000),
            'address' => $this->faker->streetName,
            'contact_number' => $this->faker->phoneNumber,
            'status' => RepairRequestStatus::PENDING,
            'remarks' => $this->faker->text,
        ];
    }
}
