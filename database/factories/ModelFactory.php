<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dependency::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'ncl' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Memo::class, static function (Faker\Generator $faker) {
    return [
        'odependency_id' => $faker->randomNumber(5),
        'number_memo' => $faker->randomNumber(5),
        'ref_obs' => $faker->sentence,
        'date_doc' => $faker->date(),
        'date_entry' => $faker->date(),
        'date_exit' => $faker->date(),
        'ddependency_id' => $faker->randomNumber(5),
        'admin_user_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Memo::class, static function (Faker\Generator $faker) {
    return [
        'odependency_id' => $faker->randomNumber(5),
        'number_memo' => $faker->sentence,
        'ref_obs' => $faker->sentence,
        'date_doc' => $faker->date(),
        'date_entry' => $faker->date(),
        'date_exit' => $faker->date(),
        'ddependency_id' => $faker->randomNumber(5),
        'admin_user_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
