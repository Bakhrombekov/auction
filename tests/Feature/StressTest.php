<?php

use App\Models\Category;
use App\Models\Classification;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('is using the testing environment', function () {
    expect(app()->environment())->toBe('testing');
});

test('can run migrate Successfully', function () {
    $exitCode = $this->artisan('migrate')->run();

    expect($exitCode)->toBe(0);
})->depends('is using the testing environment');

test('Handles bulk insert into the database', function () {
    $totalPosts = 10000;

    for ($i = 0; $i < $totalPosts; $i++) {
        Category::create([
            'name' => "Category $i",
            'alias' => str("Category $i")->slug(),
            'icon' => "category icon $i",
        ]);
        Classification::create([
            'name' => "Classification $i",
        ]);
    }
    sleep(3);

    expect(Category::count())->toBe($totalPosts)
        ->and(Classification::count())->toBe($totalPosts);

})->depends('can run migrate Successfully');
