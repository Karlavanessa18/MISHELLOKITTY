<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalogue_displays_a_product(): void
    {
        $product = $this->makeProduct();

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee('Merch para endulzar tu rutina.');
    }

    public function test_product_detail_is_available_through_its_slug(): void
    {
        $product = $this->makeProduct();

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->description);
    }

    private function makeProduct(): Product
    {
        return Product::create([
            'name' => 'Mochila de prueba',
            'slug' => 'mochila-de-prueba',
            'description' => 'Producto creado para comprobar la ficha del catálogo.',
            'price' => 89900,
            'image' => 'backpack',
            'category' => 'Accesorios',
            'stock' => 4,
            'is_featured' => true,
        ]);
    }
}
