<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory d#efinitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//user
$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//invoice
$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence,
        'user_id' => function () {
          return factory("App\User")->create()->id;
        },
        'amount' => 0.0
    ];
});

//ticket
$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'user_id' => function () {
          return factory("App\User")->create()->id;
        },
        'title' => $faker->name,
        'description' => $faker->sentence,
        'complete' => false,
        'priority' => 'low'
    ];
});

//reply
$factory->define(App\TicketReply::class, function (Faker $faker) {
    return [
        'ticket_id' => function () {
          return factory("App\Ticket")->create()->id;
        },
        'user_id' => function () {
          return factory("App\User")->create()->id;
        },
        'description' => $faker->sentence
    ];
});

//task
$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => function () {
          return factory("App\User")->create()->id;
        },
        'title' => $faker->name,
        'description' => $faker->sentence
    ];
});
