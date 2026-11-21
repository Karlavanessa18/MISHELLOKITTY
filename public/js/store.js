(() => {
    const storageKey = 'my-hello-kitty-cart';
    const cartPanel = document.querySelector('#cart-panel');
    const backdrop = document.querySelector('[data-cart-backdrop]');
    const cartItems = document.querySelector('[data-cart-items]');
    const cartSummary = document.querySelector('[data-cart-summary]');
    const cartTotal = document.querySelector('[data-cart-total]');
    const cartCounts = document.querySelectorAll('[data-cart-count]');
    const toast = document.querySelector('[data-toast]');
    let toastTimer;

    const readCart = () => {
        try {
            const savedCart = JSON.parse(localStorage.getItem(storageKey) || '[]');

            if (!Array.isArray(savedCart)) {
                return [];
            }

            return savedCart.filter((item) => (
                item && Number.isFinite(Number(item.id)) && typeof item.name === 'string' && Number.isFinite(Number(item.price))
            ));
        } catch {
            return [];
        }
    };

    let cart = readCart();

    const money = (amount) => new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        maximumFractionDigits: 0,
    }).format(amount);

    const saveCart = () => localStorage.setItem(storageKey, JSON.stringify(cart));

    const setCartOpen = (open) => {
        document.body.classList.toggle('cart-open', open);
        cartPanel.setAttribute('aria-hidden', String(!open));
        document.querySelectorAll('[data-cart-toggle]').forEach((button) => {
            button.setAttribute('aria-expanded', String(open));
        });

        if (open) {
            cartPanel.querySelector('[data-cart-close]').focus();
        }
    };

    const showToast = (message) => {
        if (!toast) {
            return;
        }

        window.clearTimeout(toastTimer);
        toast.textContent = message;
        toast.classList.add('is-visible');
        toastTimer = window.setTimeout(() => toast.classList.remove('is-visible'), 3200);
    };

    const emptyCart = () => {
        const empty = document.createElement('div');
        empty.className = 'cart-empty';

        const text = document.createElement('div');
        const emoji = document.createElement('span');
        const paragraph = document.createElement('p');
        emoji.textContent = '🎀';
        paragraph.textContent = 'Aún no has añadido ningún producto.';
        text.append(emoji, paragraph);
        empty.append(text);

        return empty;
    };

    const renderCart = () => {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        const totalPrice = cart.reduce((total, item) => total + (item.price * item.quantity), 0);

        cartCounts.forEach((count) => {
            count.textContent = String(totalItems);
        });

        cartItems.replaceChildren();

        if (cart.length === 0) {
            cartItems.append(emptyCart());
            cartSummary.hidden = true;
            return;
        }

        cart.forEach((item) => {
            const row = document.createElement('article');
            row.className = 'cart-item';

            const mark = document.createElement('div');
            mark.className = 'cart-item__mark';
            mark.textContent = '♡';

            const information = document.createElement('div');
            const name = document.createElement('span');
            name.className = 'cart-item__name';
            name.textContent = item.name;
            const meta = document.createElement('span');
            meta.className = 'cart-item__meta';
            meta.textContent = `${item.quantity} × ${money(item.price)}`;
            information.append(name, meta);

            const remove = document.createElement('button');
            remove.className = 'cart-item__remove';
            remove.type = 'button';
            remove.textContent = 'Quitar';
            remove.addEventListener('click', () => {
                cart = cart.filter((cartItem) => cartItem.id !== item.id);
                saveCart();
                renderCart();
            });

            row.append(mark, information, remove);
            cartItems.append(row);
        });

        cartSummary.hidden = false;
        cartTotal.textContent = money(totalPrice);
    };

    document.querySelectorAll('[data-add-product]').forEach((button) => {
        button.addEventListener('click', () => {
            const product = {
                id: String(button.dataset.productId),
                name: button.dataset.productName || 'Producto',
                price: Number(button.dataset.productPrice),
            };
            const existingItem = cart.find((item) => item.id === product.id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ ...product, quantity: 1 });
            }

            saveCart();
            renderCart();
            showToast(`${product.name} se añadió a tu carrito.`);
        });
    });

    document.querySelectorAll('[data-cart-toggle]').forEach((button) => {
        button.addEventListener('click', () => setCartOpen(true));
    });

    document.querySelectorAll('[data-cart-close]').forEach((button) => {
        button.addEventListener('click', () => setCartOpen(false));
    });

    backdrop.addEventListener('click', () => setCartOpen(false));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && document.body.classList.contains('cart-open')) {
            setCartOpen(false);
        }
    });

    document.querySelector('[data-demo-checkout]').addEventListener('click', () => {
        showToast('El pago es demostrativo; no se realizará ningún cobro.');
    });

    renderCart();
})();
