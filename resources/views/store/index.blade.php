@extends('layouts.store')

@section('title', 'My Hello Kitty | Merch con encanto')

@section('content')
    <section class="hero" id="coleccion">
        <div class="hero__copy">
            <span class="eyebrow">♡ Colección rosa · edición demo</span>
            <h1>Pequeños detalles,<br><em>mucho</em> encanto.</h1>
            <p>Un catálogo breve de accesorios, ropa y papelería para llevar un toque kawaii a cada día.</p>
            <div class="hero__actions">
                <a class="button button--primary" href="#productos">Ver productos</a>
                <a class="text-link" href="#como-funciona">¿Cómo funciona?</a>
            </div>
            <ul class="hero__notes" aria-label="Características del catálogo">
                <li><span aria-hidden="true">✿</span> Piezas con mucho color</li>
                <li><span aria-hidden="true">♡</span> Detalles de cada producto</li>
                <li><span aria-hidden="true">✦</span> Carrito de prueba</li>
            </ul>
        </div>

        <div class="hero__visual" aria-hidden="true">
            <span class="hero__blob hero__blob--one"></span>
            <span class="hero__blob hero__blob--two"></span>
            <span class="hero__spark hero__spark--one">✦</span>
            <span class="hero__spark hero__spark--two">♡</span>
            <div class="kitty-card">
                <div class="kitty-card__bow"><i></i><b></b><i></i></div>
                <div class="kitty-card__head">
                    <span class="kitty-card__ear kitty-card__ear--left"></span>
                    <span class="kitty-card__ear kitty-card__ear--right"></span>
                    <span class="kitty-card__eye kitty-card__eye--left"></span>
                    <span class="kitty-card__eye kitty-card__eye--right"></span>
                    <span class="kitty-card__nose"></span>
                    <span class="kitty-card__whisker kitty-card__whisker--one"></span>
                    <span class="kitty-card__whisker kitty-card__whisker--two"></span>
                    <span class="kitty-card__whisker kitty-card__whisker--three"></span>
                    <span class="kitty-card__whisker kitty-card__whisker--four"></span>
                </div>
                <span class="kitty-card__caption">made with love</span>
            </div>
            <div class="hero__mini-card hero__mini-card--top">New<br><strong>cute stuff</strong></div>
            <div class="hero__mini-card hero__mini-card--bottom">100%<br><strong>kawaii mood</strong></div>
        </div>
    </section>

    <section class="catalogue" id="productos">
        <div class="section-heading">
            <div>
                <span class="eyebrow">Elige tu favorito</span>
                <h2>Merch para endulzar tu rutina.</h2>
            </div>
            <p>Abre cada ficha para conocer el producto y añadirlo a tu carrito de demostración.</p>
        </div>

        <div class="product-grid">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="empty-catalogue">
                    <span aria-hidden="true">🎀</span>
                    <h2>Aún no hay productos</h2>
                    <p>Ejecuta el seeder de Laravel para cargar el catálogo inicial.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="how-it-works" id="como-funciona">
        <div class="how-it-works__art" aria-hidden="true">
            <span>♡</span>
            <span>✦</span>
            <span>🎀</span>
        </div>
        <div>
            <span class="eyebrow">Simple y bonito</span>
            <h2>Explora, conoce y guarda tus favoritos.</h2>
            <ol class="steps">
                <li><b>01</b><span>Revisa la colección y abre el detalle del producto que te guste.</span></li>
                <li><b>02</b><span>Añádelo al carrito para comprobar la interacción de la tienda.</span></li>
                <li><b>03</b><span>El total es ilustrativo: esta página no procesa pagos reales.</span></li>
            </ol>
        </div>
    </section>
@endsection
