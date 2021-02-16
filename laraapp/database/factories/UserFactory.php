<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement($array = array('Female', 'Male'));
        $photo  = $this->faker->image('public/imgs', 140, 140, 'people');

        if ($gender == 'Female') {
            $name = $this->faker->firstNameFemale();
        } else {
            $name = $this->faker->firstNameMale();
        }
        return [
            'fullname'          => $name . ' ' . $this->faker->lastname(),
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000, $max = 3202000000 ),
            'birthdate'         => $this->faker->dateTimeBetween($starDate = '-60 years', $endDate = '-22 years'),
            'gender'            => $gender,
            'address'           => $this->faker->streetAddress,
            'photo'             => substr($photo, 7),
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),
        ];
        /*
            'gender'            => $this->faker->randomElement(['male', 'female']),
            'fullname'          => function (array $user) {return $this->faker->name($user['gender']);},
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000, $max=3202000000),
            'birthdate'         => $this->faker->dateTimeBetween($startDate = '-14609 days', $endDate = '1999-12-31', $timezone = null),
            'photo'             => function(array $user){
                $img = file_get_contents('http://lorempixel.com/800/600/people/');         
                $fileName = $user['fullname'].'.png';
                file_put_contents("public/imgs/$fileName", $img);
                return $fileName;
            },  
            'address'           => $this->faker->streetAddress,
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),*/
        //$this->faker->image($dir = 'public\imgs', $width = 480, $height = 480,'people') ,
            
        /*
        //Funciona pero no identifica genero
        return [
            'fullname'          => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'birthdate'         => $this->faker->date,
            'gender'            => $this->faker->randomElement($array = array('Female', 'Male')),
            'address'           => $this->faker->streetAddress,
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),
        ];*/
    }
}
