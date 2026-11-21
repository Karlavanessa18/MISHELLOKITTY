<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the compact storefront catalogue.
     */
    public function index(): View
    {
        return view('store.index', [
            'products' => Product::query()
                ->orderByDesc('is_featured')
                ->orderBy('name')
                ->get(),
        ]);
    }

    /**
     * Show one product and a few related catalogue suggestions.
     */
    public function show(Product $product): View
    {
        $relatedProducts = Product::query()
            ->whereKeyNot($product->getKey())
            ->where('category', $product->category)
            ->orderByDesc('is_featured')
            ->take(3)
            ->get();

        if ($relatedProducts->count() < 3) {
            $relatedProducts = Product::query()
                ->whereKeyNot($product->getKey())
                ->orderByDesc('is_featured')
                ->orderBy('name')
                ->take(3)
                ->get();
        }

        return view('store.show', compact('product', 'relatedProducts'));
    }
}
