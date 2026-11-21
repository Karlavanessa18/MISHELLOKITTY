<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Catálogo de merch inspirado en Hello Kitty.">
    <title>@yield('title', 'My Hello Kitty | Tienda kawaii')</title>
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
</head>
<body>
    <div class="page-shell">
        <header class="site-header">
            <a class="brand" href="{{ route('store.index') }}" aria-label="Ir al inicio de My Hello Kitty">
                <span class="brand-mark" aria-hidden="true">
                    <span class="brand-mark__ear brand-mark__ear--left"></span>
                    <span class="brand-mark__ear brand-mark__ear--right"></span>
                    <span class="brand-mark__eye brand-mark__eye--left"></span>
                    <span class="brand-mark__eye brand-mark__eye--right"></span>
                    <span class="brand-mark__nose"></span>
                    <span class="brand-mark__bow">♥</span>
                </span>
                <span class="brand-copy">
                    <strong>My Hello</strong>
                    <span>Kitty shop</span>
                </span>
            </a>

            <nav class="main-nav" aria-label="Navegación principal">
                <a href="{{ route('store.index') }}#productos">Productos</a>
                <a href="{{ route('store.index') }}#coleccion">Colección</a>
            </nav>

            <button class="cart-trigger" type="button" data-cart-toggle aria-controls="cart-panel" aria-expanded="false">
                <span class="cart-trigger__icon" aria-hidden="true">🛍</span>
                <span class="cart-trigger__label">Mi carrito</span>
                <span class="cart-trigger__count" data-cart-count>0</span>
            </button>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <a class="brand brand--footer" href="{{ route('store.index') }}" aria-label="Ir al inicio de My Hello Kitty">
                <span class="brand-mark brand-mark--small" aria-hidden="true">
                    <span class="brand-mark__ear brand-mark__ear--left"></span>
                    <span class="brand-mark__ear brand-mark__ear--right"></span>
                    <span class="brand-mark__eye brand-mark__eye--left"></span>
                    <span class="brand-mark__eye brand-mark__eye--right"></span>
                    <span class="brand-mark__nose"></span>
                    <span class="brand-mark__bow">♥</span>
                </span>
                <span class="brand-copy">
                    <strong>My Hello</strong>
                    <span>Kitty shop</span>
                </span>
            </a>
            <p>Catálogo de demostración creado con Laravel. No procesa pagos ni representa una tienda oficial.</p>
        </footer>
    </div>

    <div class="cart-backdrop" data-cart-backdrop></div>
    <aside id="cart-panel" class="cart-panel" aria-hidden="true" aria-labelledby="cart-title">
        <div class="cart-panel__header">
            <div>
                <span class="eyebrow">Tu selección</span>
                <h2 id="cart-title">Mi carrito</h2>
            </div>
            <button class="icon-button" type="button" data-cart-close aria-label="Cerrar carrito">×</button>
        </div>

        <div class="cart-items" data-cart-items aria-live="polite"></div>

        <div class="cart-summary" data-cart-summary hidden>
            <div>
                <span>Total estimado</span>
                <strong data-cart-total>$ 0</strong>
            </div>
            <button class="button button--primary button--full" type="button" data-demo-checkout>Continuar (demo)</button>
        </div>
    </aside>

    <div class="toast" data-toast role="status" aria-live="polite"></div>
    <script src="{{ asset('js/store.js') }}" defer></script>
</body>
</html>
