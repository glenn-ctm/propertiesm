<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enums\UserRole;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $amenitiesSelect = ['Downstairs Unit', 'Washer/Dryer Hook Up', 'Parking Place', 'Upstairs Unit', 'Community Laundry', 'Exterior Storage'];

        shuffle($amenitiesSelect);

        $owner_id = User::factory()
                    ->afterCreating(function (User $user) {
                        $user->assignRoleAndPin( UserRole::PROPERTY_OWNER );
                    })
                    ->createOne()
                    ->id;

        return [
            'owner_id' => $owner_id,
            'city' => $this->faker->streetName,
            'address' => $this->faker->streetName,
            'zip_code' => $this->faker->postcode,
            'description' => $this->faker->text,
            'amenities' => array_slice( $amenitiesSelect, 0, 2 ),
            'regulation' => ['waterFieldFurniture' => 'Not Permitted'],
            'number_of_units' => rand (1, 1000),
            'rooms' => rand (1, 5),
            'bathrooms' => rand (1, 5),
            'square_footage' => rand (1, 5000),
            'pets' => $this->faker->name,
            'owner_pays' => rand (1, 5000),
            'rent' => rand (100, 5000),
            'security' => rand (100, 5000),
            'security_relief_available' => 1,
            'comment' => $this->faker->text
        ];
    }
}
