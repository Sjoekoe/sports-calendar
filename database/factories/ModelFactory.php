<?php

use App\Accounts\EloquentAccount;
use App\Athletes\EloquentAthlete;
use App\Teams\EloquentTeam;
use App\Users\EloquentUser;
use Faker\Generator;

$factory->define(EloquentUser::class, function (Generator $faker) {
    return [];
});

$factory->define(EloquentAccount::class, function (Generator $faker) {
    return [];
});

$factory->define(EloquentAthlete::class, function (Generator $faker) {
    return [];
});
$factory->define(EloquentTeam::class, function (Generator $faker){
    return [];
});
