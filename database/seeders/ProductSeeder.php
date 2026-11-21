<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the store with a small, reusable catalogue.
     */
    public function run(): void
    {
        $now = now();

        Product::query()->upsert([
            [
                'name' => 'Mochila Kitty Pop',
                'slug' => 'mochila-kitty-pop',
                'description' => 'Mochila rosa con bolsillo frontal, cierre seguro y espacio para tus esenciales.',
                'price' => 89900,
                'image' => 'backpack',
                'category' => 'Accesorios',
                'stock' => 12,
                'is_featured' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Buzo Pink Mood',
                'slug' => 'buzo-pink-mood',
                'description' => 'Buzo suave de corte relajado, ideal para días cómodos con mucho estilo.',
                'price' => 109900,
                'image' => 'sweatshirt',
                'category' => 'Ropa',
                'stock' => 8,
                'is_featured' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Termo Sweet Day',
                'slug' => 'termo-sweet-day',
                'description' => 'Termo reutilizable para acompañarte en la universidad, oficina o paseo.',
                'price' => 49900,
                'image' => 'tumbler',
                'category' => 'Hogar',
                'stock' => 18,
                'is_featured' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Agenda Mini Dreams',
                'slug' => 'agenda-mini-dreams',
                'description' => 'Agenda de bolsillo con páginas punteadas para organizar tus ideas favoritas.',
                'price' => 35900,
                'image' => 'notebook',
                'category' => 'Papelería',
                'stock' => 20,
                'is_featured' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Llavero Cherry Bow',
                'slug' => 'llavero-cherry-bow',
                'description' => 'Llavero ligero con detalle de moño para darle personalidad a tus llaves.',
                'price' => 19900,
                'image' => 'keychain',
                'category' => 'Accesorios',
                'stock' => 25,
                'is_featured' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Set de stickers Kawaii',
                'slug' => 'set-stickers-kawaii',
                'description' => 'Set de stickers para decorar tu libreta, computador o termo favorito.',
                'price' => 14900,
                'image' => 'stickers',
                'category' => 'Papelería',
                'stock' => 30,
                'is_featured' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['slug'], [
            'name',
            'description',
            'price',
            'image',
            'category',
            'stock',
            'is_featured',
            'updated_at',
        ]);
    }
}
