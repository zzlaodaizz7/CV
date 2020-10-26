<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cv;
use Faker\Generator as Faker;

$factory->define(Cv::class, function (Faker $faker) {
    return [
        //
        'name'			=> "Duy",
        'birthday'		=>	'2020-09-03',
        'email'			=> 'kaka.33.yb01@gmail.com',
        'phone'			=> '0389317219',
        'exp'			=>	'0',
        'description'	=>	'1111',
        'salary'		=> '0,10',
        'source'		=>	'FB',
        'job'			=>	'Nodejs DEV',
        'cv'			=>	'uploads/cv/1600878537-Do-Khuong-Duy-CV.pdf',
        'status'		=> 	'default',
    ];	
});
