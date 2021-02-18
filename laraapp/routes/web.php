<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('showuser/{id}', function (Request $request) {
    $id = $request->id;
    $user = App\Models\User::find($id);
    return view('showuser')->with('user', $user);
    });
Route::get('showusers/', function () {
    $users = App\Models\User::limit(10)->get();
    foreach ($users as $user){
        /** calculate age */
        
        $time   = strtotime($user->birthdate); 
        $now    = time(); 
        $age    = ($now-$time)/(60*60*24*365.25); 
        $age    = floor($age);

        $user->age = $age;

        /** Calculate registration time */

        $created_at = strtotime($user->created_at);

        $difference = time() - (int)$created_at;

        $intervals = array
        (
            $difference > 31556925    => array('year',    31556926),
            $difference < 31556926    => array('month',   2628000),
            $difference < 2629744     => array('week',    604800),
            $difference < 604800      => array('day',     86400),
            $difference < 86400       => array('hour',    3600),
            $difference < 3600        => array('minute',  60),
            $difference < 60          => array('Now',  1)
        );

        $registered = floor($difference/$intervals[1][1]);
        $user->registered = $registered.' '.$intervals[1][0].($registered > 1 ? 's' : '').' ago';
    }
    return view('showusers')->with('users',$users);
});
