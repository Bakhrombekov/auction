<?php

use App\Models\Category;
use App\Models\Classification;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('is using the testing environment', function () {
    expect(app()->environment())->toBe('testing');
});

test('can run migrate Successfully', function () {
    $exitCode = $this->artisan('migrate')->run();

    expect($exitCode)->toBe(0);
})->depends('is using the testing environment');

test('can run db:seed Successfully', function () {

    $this->artisan('db:seed');

    expect(Category::class)->toBeGreaterThanOrEqual(6)
        ->and(Classification::class)->toBeGreaterThanOrEqual(9)
        ->and(Material::class)->toBeGreaterThanOrEqual(5)
        ->and(ProductStatus::class)->toBeGreaterThanOrEqual(3)
        ->and(Product::class)->toBeGreaterThanOrEqual(12);
})->depends('can run migrate Successfully');
