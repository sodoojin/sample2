<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Core\Entities\Reservation::class, function (Faker\Generator $faker) {
    return [
        'sender_id' => factory(\Core\Entities\User::class)->create()->id,
        'receiver_id' => factory(\Core\Entities\User::class)->create()->id,
        'appointed_day' => $faker->dateTime->format('Y-m-d H:i:s'),
        'comment' => $faker->paragraph(),
    ];
});