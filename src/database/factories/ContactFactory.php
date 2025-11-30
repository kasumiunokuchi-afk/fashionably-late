<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->lastName,
            'last_name'  => $this->faker->firstName,
            'gender'     => $this->faker->numberBetween(1, 3),
            'email'      => $this->faker->safeEmail,
            'tel'        => $this->faker->numerify('0##########'),
            'address'    => $this->faker->prefecture . ' ' .
                            $this->faker->city . ' ' .
                            $this->faker->streetAddress,
            'building'   => $this->faker->secondaryAddress,
            'category_id'=> $this->faker->numberBetween(1, 5),
            'detail'     => $this->faker->realText(120),
        ];
    }
}
