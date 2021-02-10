<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Nintendo Switch',
	        'description' => 'Lorem ipsum dolor sit amet',
	        

        	/*'fullname' => Str::random(10),
	        'email' => Str::random(10).'@gmail.com',
	        'phone'=> Str::random(10),
	        'birthdate'=> Str::random(10),
	        'gender'=> Str::random(10),
	        'address'=> Str::random(10),
	        'rol'=> Str::random(10),
	        'active'=> Str::random(10),
	        'password'=> Str::random(10),*/


        ]);

        //Método ORM
        $cat = new Category;
        $cat->name = 'Xbox Series X';
     	$cat->description = 'lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name = 'Play Station 5';
     	$cat->description = 'lorem ipsum dolor sit amet';
        $cat->save();
                    
    }
}
