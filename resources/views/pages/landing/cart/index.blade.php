<x-landing-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shopping Cart</h3>
                    </div>
                    <div class="card-body">
                        @if (Cart::count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr data-row-id="{{ $item->rowId }}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $item->options->image }}" alt="{{ $item->name }}"
                                                            class="img-thumbnail me-3 object-fit-contain" style="width: 60px; height: 60px;">
                                                        <div>
                                                            <h6 class="mb-0">
                                                                <a href="{{ route('shop', $item->id) }}"
                                                                    class="text-decoration-none text-dark">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </h6>
                                                            <small class="text-muted text-truncate d-block"
                                                                style="max-width: 400px;">{{ $item->options->description }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>CHF {{ number_format($item->price, 2) }}</td>
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
                                                <td>CHF {{ number_format($item->subtotal, 2) }}</td>
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
                                    <a href="{{ route('shop') }}" class="btn btn-light">
                                        <i class="ki-duotone ki-arrow-left fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Continue Shopping
                                    </a>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="me-4">
                                            <h5 class="mb-0 cart-count">Total Items: {{ number_format(Cart::count()) }}
                                            </h5>
                                        </div>
                                        <div class="me-4">
                                            <h5 class="mb-0 cart-total">Total Price: CHF
                                                {{ number_format(Cart::total(), 2) }}</h5>
                                        </div>
                                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">
                                            Proceed to Checkout
                                            <i class="ki-duotone ki-arrow-right fs-2 ms-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="ki-duotone ki-cart fs-2hx text-muted mb-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <h4>Your cart is empty</h4>
                                <p class="text-muted">Looks like you haven't added any items to your cart yet.</p>
                                <a href="{{ route('shop') }}" class="btn btn-primary">
                                    Start Shopping
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
                    element.textContent = `Total Items: ${count}`;
                });
            }

            function updateCartTotal(total) {
                const cartTotalElement = document.querySelector('.cart-total');
                if (cartTotalElement) {
                    cartTotalElement.textContent = `Total Price: CHF ${parseFloat(total).toFixed(2)}`;
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
                            updateCartTotal(data.cartTotal);
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
                                updateCartTotal(data.cartTotal);
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
        </script>
    @endpush
</x-landing-layout>
