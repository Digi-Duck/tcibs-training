<?php

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

Route::get('/hello',function(){

    // dd('123',12);
    //dump die

    // $box = '123';

    // dd($box1 ?? '123');

    // if($box == 0){
    //     dd('1');
    // }elseif($box == 1){
    //     dd('1');
    // }else{
    //     dd('0');
    // }

    // for($i = 0; $i < 10; $i++){
    //     $number += $i;
    // }

    // dd($number,$i);

    // $box = ['a',['b'],['c',['d'],'e'],'f','g'];
    // //d
    // dd($box[2][1][0]);

    // $box = ['abd'=>'123'];
    // dd($box['abc']);
    //"123"

    // $box = [1,2,3,4,5,6,7];
    // foreach($box as $item){
    //     echo $item;
    //     // dump($item);
    // };

    // $box = ['A','B','C','D','E','F','G'];
    // foreach($box as $index =>$value){
    //     echo($index);
    //     echo($value);
    //     dump($item);
    // };

    // return '123';
});

// Route::get('/hello/{number}',function($number){
//     dd($number);
//     return '123';
// });

Route::get('/hello/{number1}',function($a = null){
    dd($a);
    // return '123';
});
