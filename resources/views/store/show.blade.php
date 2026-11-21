@extends('layouts.store')

@section('title', $product->name.' | My Hello Kitty')

@section('content')
    <section class="product-detail-wrap">
        <nav class="breadcrumbs" aria-label="Migas de pan">
            <a href="{{ route('store.index') }}">Inicio</a>
            <span aria-hidden="true">/</span>
            <a href="{{ route('store.index') }}#productos">Productos</a>
            <span aria-hidden="true">/</span>
            <span>{{ $product->name }}</span>
        </nav>

        <article class="product-detail">
            <div class="product-detail__art">
                <x-product-art :product="$product" size="product-art--large" />
            </div>

            <div class="product-detail__info">
                <span class="category-chip">{{ $product->category }}</span>
                @if ($product->is_featured)
                    <span class="detail-badge">♡ Favorito de la colección</span>
                @endif
                <h1>{{ $product->name }}</h1>
                <p class="product-detail__description">{{ $product->description }}</p>
                <p class="detail-price">$ {{ number_format((float) $product->price, 0, ',', '.') }} <small>COP</small></p>

                <dl class="product-facts">
                    <div>
                        <dt>Disponibilidad</dt>
                        <dd class="{{ $product->stock > 0 ? 'fact-available' : 'fact-unavailable' }}">
                            {{ $product->stock > 0 ? $product->stock.' unidades disponibles' : 'Producto agotado' }}
                        </dd>
                    </div>
                    <div>
                        <dt>Categoría</dt>
                        <dd>{{ $product->category }}</dd>
                    </div>
                    <div>
                        <dt>Referencia</dt>
                        <dd>MYH-{{ strtoupper(str_replace('-', '', $product->slug)) }}</dd>
                    </div>
                </dl>

                <div class="detail-actions">
                    @if ($product->stock > 0)
                        <button
                            class="button button--primary"
                            type="button"
                            data-add-product
                            data-product-id="{{ $product->id }}"
                            data-product-name="{{ $product->name }}"
                            data-product-price="{{ (float) $product->price }}"
                        >
                            Añadir al carrito
                        </button>
                    @else
                        <span class="sold-out-note">Este producto está agotado.</span>
                    @endif
                    <a class="text-link" href="{{ route('store.index') }}#productos">Seguir explorando</a>
                </div>

                <p class="demo-note">Esta es una ficha de muestra. Consulta la disponibilidad real antes de comprar.</p>
            </div>
        </article>
    </section>

    @if ($relatedProducts->isNotEmpty())
        <section class="related-products">
            <div class="section-heading section-heading--compact">
                <div>
                    <span class="eyebrow">También te puede gustar</span>
                    <h2>Más detalles bonitos.</h2>
                </div>
            </div>
            <div class="product-grid product-grid--related">
                @foreach ($relatedProducts as $relatedProduct)
                    <x-product-card :product="$relatedProduct" />
                @endforeach
            </div>
        </section>
    @endif
@endsection
