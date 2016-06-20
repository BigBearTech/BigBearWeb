<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'admin', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);

    return array_merge($user, ['admin' => true]);
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_slug($faker->name),
        'content' => $faker->text(500),
        'post_type' => 'post',
        'drafted_at' => Carbon\Carbon::now(),
    ];
});

$factory->defineAs(App\Post::class, 'page', function ($faker) use ($factory) {
    $user = $factory->raw(App\Post::class);

    return array_merge($user, ['post_type' => 'page']);
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'url' => $faker->domainName,
        'content' => $faker->realText,
        'status' => 'approved',
    ];
});

$factory->define(App\Testimonial::class, function (Faker\Generator $faker) {
    return [
        'display_name' => $faker->name,
        'fullname' => $faker->name,
        'email' => $faker->safeEmail,
        'location' => $faker->address,
        'url' => $faker->domainName,
        'content' => $faker->realText,
        'status' => 'approved',
        'display_url' => true,
        'featured' => false,
    ];
});

$factory->define(App\FaqGroup::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText,
    ];
});

$factory->define(App\Faq::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText,
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText,
    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText,
    ];
});

$factory->define(App\Code::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->realText,
    ];
});
