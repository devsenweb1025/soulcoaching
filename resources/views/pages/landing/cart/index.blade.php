<x-landing-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Warenkorb</h3>
                    </div>
                    <div class="card-body">
                        @if (Cart::count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Produkt</th>
                                            <th>Preis</th>
                                            <th>Menge</th>
                                            <th>Total</th>
                                            <th>Löschen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr data-row-id="{{ $item->rowId }}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $item->options->image) }}"
                                                            alt="{{ $item->name }}"
                                                            class="img-thumbnail me-3 object-fit-contain"
                                                            style="width: 60px; height: 60px;">
                                                        <div>
                                                            <h6 class="mb-0">
                                                                <a href="{{ route('shop.show', $item->options->slug) }}"
                                                                    class="text-decoration-none text-dark">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </h6>
                                                            <small class="text-muted text-truncate d-block"
                                                                style="max-width: 400px;">{{ $item->options->description }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>@chf($item->price)</td>
                                                <td>
                                                    <div class="input-group">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            onclick="decrementQuantity('{{ $item->rowId }}')">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            value="{{ $item->qty }}" style="width: 50px;" readonly
                                                            data-row-id="{{ $item->rowId }}">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            onclick="incrementQuantity('{{ $item->rowId }}')">+</button>
                                                    </div>
                                                </td>
                                                <td>@chf($item->subtotal)</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="removeItem('{{ $item->rowId }}')">
                                                        <i class="ki-duotone ki-trash fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                            <span class="path5"></span>
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <a href="{{ route('shop.index') }}" class="btn btn-light">
                                        <i class="ki-duotone ki-arrow-left fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Weiter einkaufen
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Lieferart</h5>
                                            <div class="mb-4">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input shipping-option" type="radio"
                                                        name="shipping_option" id="shipping-small" value="small"
                                                        {{ session('shipping_option', 'middle') === 'small' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="shipping-small">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>Leichtes Paket</strong>
                                                                <div class="text-muted small">Für kleine Artikel bis zu 2kg
                                                                </div>
                                                            </div>
                                                            <span class="text-primary">CHF 8.50</span>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input shipping-option" type="radio"
                                                        name="shipping_option" id="shipping-middle" value="middle"
                                                        {{ session('shipping_option', 'middle') === 'middle' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="shipping-middle">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>Mittleres Paket</strong>
                                                                <div class="text-muted small">Für mittlere Artikel bis zu 5kg
                                                                </div>
                                                            </div>
                                                            <span class="text-primary">CHF 11.50</span>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input shipping-option" type="radio"
                                                        name="shipping_option" id="shipping-big" value="big"
                                                        {{ session('shipping_option', 'middle') === 'big' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="shipping-big">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>Schweres Paket</strong>
                                                                <div class="text-muted small">Für grosse Artikel bis zu 10kg
                                                                </div>
                                                            </div>
                                                            <span class="text-primary">CHF 20.50</span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-end">
                                                <div class="mb-2">
                                                    <h5 class="mb-0 shipping-cost">Versand: @chf(session('shipping_cost', 11.5))</h5>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="mb-0 cart-total">Total: @chf((float) Cart::total(null, '.', '') + (float) session('shipping_cost', 11.5))</h5>
                                                </div>
                                                <a href="{{ route('cart.checkout') }}" class="btn btn-primary">
                                                    Weiter zur Zahlung
                                                    <i class="ki-duotone ki-arrow-right fs-2 ms-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="ki-duotone ki-basket fs-2hx text-muted mb-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <h4>Dein Warenkorb ist leer</h4>
                                <p class="text-muted">Sieht so aus als hättest du noch keine Produkte im Warenkorb.</p>
                                <a href="{{ route('shop.index') }}" class="btn btn-primary">
                                    Einkauf starten
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function updateCartCount(count) {
                document.querySelectorAll('.cart-count').forEach(element => {
                    element.textContent = `${count}`;
                });
            }

            function updateCartTotal(total, shipping_cost = 0) {
                const cartTotalElement = document.querySelector('.cart-total');
                if (cartTotalElement) {
                    cartTotalElement.textContent =
                        `Total Price: CHF ${(parseFloat(total) + parseFloat(shipping_cost)).toFixed(2)}`;
                }
            }

            function showToast(message, type = 'success') {
                const toast = document.createElement('div');
                toast.className = `position-fixed top-0 end-0 p-3`;
                toast.style.zIndex = '5';
                toast.innerHTML = `
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-${type === 'success' ? 'check-circle' : 'cross-circle'} fs-2x text-${type} me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <strong class="me-auto">${type === 'success' ? 'Erfolg' : 'Fehler'}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            function setButtonLoading(button, isLoading) {
                if (isLoading) {
                    button.disabled = true;
                    button.innerHTML = `
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                `;
                } else {
                    button.disabled = false;
                    button.innerHTML = button.getAttribute('data-original-content');
                }
            }

            function incrementQuantity(rowId) {
                const input = document.querySelector(`input[data-row-id="${rowId}"]`);
                if (input) {
                    const newQuantity = parseInt(input.value) + 1;
                    updateQuantity(rowId, newQuantity);
                }
            }

            function decrementQuantity(rowId) {
                const input = document.querySelector(`input[data-row-id="${rowId}"]`);
                if (input) {
                    const newQuantity = parseInt(input.value) - 1;
                    if (newQuantity >= 1) {
                        updateQuantity(rowId, newQuantity);
                    }
                }
            }

            function updateQuantity(rowId, quantity) {
                const input = document.querySelector(`input[data-row-id="${rowId}"]`);
                if (!input) return;

                // Store original value in case we need to revert
                const originalValue = input.value;

                // Update input value immediately for better UX
                input.value = quantity;

                fetch(`/cart/update/${rowId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => {
                        if (response.status === 401) {
                            window.location.href = '/login';
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update the subtotal in the table row
                            const row = document.querySelector(`tr[data-row-id="${rowId}"]`);
                            if (row) {
                                const subtotalCell = row.querySelector('td:nth-child(4)');
                                if (subtotalCell) {
                                    subtotalCell.textContent = `CHF ${parseFloat(data.itemTotal).toFixed(2)}`;
                                }
                            }

                            // Update the subtotal in the mobile card
                            const card = document.querySelector(`.card[data-row-id="${rowId}"]`);
                            if (card) {
                                const subtotalElement = card.querySelector('.text-end strong');
                                if (subtotalElement) {
                                    subtotalElement.textContent = `CHF ${parseFloat(data.itemTotal).toFixed(2)}`;
                                }
                            }

                            // Update cart totals
                            updateCartCount(data.cartCount);
                            updateCartTotal(data.cartTotal, data.shippingCost);
                            showToast(data.message);
                        } else {
                            // Revert to original value on error
                            input.value = originalValue;
                            showToast(data.message || 'Fehler beim Aktualisieren der Menge.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Revert to original value on error
                        input.value = originalValue;
                        showToast('Fehler beim Aktualisieren der Menge. Bitte versuchen Sie es erneut.', 'error');
                    });
            }

            function removeItem(rowId) {
                if (confirm('Möchten Sie diesen Artikel wirklich entfernen?')) {
                    const button = event.target.closest('button');
                    button.setAttribute('data-original-content', button.innerHTML);
                    setButtonLoading(button, true);

                    fetch(`/cart/remove/${rowId}`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => {
                            if (response.status === 401) {
                                window.location.href = '/login';
                                return;
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                const row = document.querySelector(
                                    `tr[data-row-id="${rowId}"], .card[data-row-id="${rowId}"]`);
                                if (row) {
                                    row.remove();
                                }
                                updateCartCount(data.cartCount);
                                updateCartTotal(data.cartTotal, data.shippingCost);
                                showToast(data.message);

                                if (data.isCartEmpty) {
                                    window.location.reload();
                                }
                            } else {
                                showToast(data.message || 'Fehler beim Entfernen des Artikels.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('Fehler beim Entfernen des Artikels. Bitte versuchen Sie es erneut.', 'error');
                        })
                        .finally(() => {
                            setButtonLoading(button, false);
                        });
                }
            }

            // Add shipping option change handler
            document.querySelectorAll('.shipping-option').forEach(radio => {
                radio.addEventListener('change', function() {
                    const shippingOption = this.value;
                    const shippingCosts = {
                        'small': 8.50,
                        'middle': 11.50,
                        'big': 20.50
                    };

                    fetch('/cart/update-shipping', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                shipping_option: shippingOption,
                                shipping_cost: shippingCosts[shippingOption]
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update shipping cost display
                                document.querySelector('.shipping-cost').textContent =
                                    `Shipping: CHF ${parseFloat(data.shipping_cost).toFixed(2)}`;
                                // Update total
                                document.querySelector('.cart-total').textContent =
                                    `Total: CHF ${(parseFloat(data.total) + parseFloat(data.shipping_cost)).toFixed(2)}`;
                                showToast('Versandoption aktualisiert erfolgreich');
                            } else {
                                showToast(data.message, 'error');
                            }
                        })
                        .catch(error => {
                            showToast('Fehler beim Aktualisieren der Versandoption. Bitte versuchen Sie es erneut.', 'error');
                        });
                });
            });
        </script>
    @endpush
</x-landing-layout>
