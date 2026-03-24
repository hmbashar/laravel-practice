<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

uses(RefreshDatabase::class);

test('GET /api/products returns list', function () {
    Product::create([
        'name' => 'Sample A',
        'description' => 'Desc',
        'price' => 9.99,
        'category' => 'Electronics',
        'stock_quantity' => 1,
    ]);
    $response = $this->getJson('/api/products');
    $response->assertOk();
    $response->assertJsonFragment(['name' => 'Sample A']);
});

test('POST /api/products creates product', function () {
    $payload = [
        'name' => 'Test Product',
        'description' => 'Demo description',
        'price' => 49.99,
        'category' => 'Electronics',
        'stock_quantity' => 25,
    ];

    $response = $this->postJson('/api/products', $payload);
    $response->assertCreated();
    $response->assertJsonFragment(['name' => 'Test Product']);
    $this->assertDatabaseHas('products', ['name' => 'Test Product']);
});
