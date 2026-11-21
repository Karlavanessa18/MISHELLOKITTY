@props(['product'])

<article class="product-card">
    <div class="product-card__visual">
        @if ($product->is_featured)
            <span class="product-card__badge">Favorito</span>
        @endif
        <x-product-art :product="$product" />
    </div>

    <div class="product-card__body">
        <span class="category-chip">{{ $product->category }}</span>
        <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
        <p>{{ \Illuminate\Support\Str::limit($product->description, 88) }}</p>

        <div class="product-card__bottom">
            <div>
                <span class="price">$ {{ number_format((float) $product->price, 0, ',', '.') }}</span>
                <span class="stock {{ $product->stock > 0 ? '' : 'stock--empty' }}">
                    {{ $product->stock > 0 ? $product->stock.' disponibles' : 'Agotado' }}
                </span>
            </div>

            @if ($product->stock > 0)
                <button
                    class="add-button"
                    type="button"
                    data-add-product
                    data-product-id="{{ $product->id }}"
                    data-product-name="{{ $product->name }}"
                    data-product-price="{{ (float) $product->price }}"
                >
                    Añadir
                </button>
            @endif
        </div>
    </div>
</article>
