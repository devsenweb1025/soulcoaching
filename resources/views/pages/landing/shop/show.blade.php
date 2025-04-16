<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Product Details Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Back Button-->
                <div class="mb-10">
                    <a href="{{ route('shop.index') }}" class="btn btn-light-primary">
                        <i class="ki-duotone ki-arrow-left fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Zurück zum Shop
                    </a>
                </div>
                <!--end::Back Button-->

                <!--begin::Product Details-->
                <div class="d-flex flex-column pt-lg-20">
                    <div class="row g-5">
                        <!--begin::Product Image-->
                        <div class="col-lg-6">
                            <div class="card card-stretch shadow card-borderless">
                                <div class="card-body p-10">
                                    <div class="w-100 h-400px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Product Image-->

                        <!--begin::Product Info-->
                        <div class="col-lg-6">
                            <div class="card card-stretch shadow card-borderless">
                                <div class="card-body p-10">
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 mb-3 fw-bold">
                                        {{ $product->name }}
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Price-->
                                    <div class="mb-5">
                                        <span class="fs-2 fw-bold text-primary">
                                            CHF {{ number_format($product->price, 2, ',', '.') }}
                                        </span>
                                        @if ($product->compare_price)
                                            <span class="text-muted text-decoration-line-through ms-2">
                                                CHF {{ number_format($product->compare_price, 2, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                    <!--end::Price-->

                                    <!--begin::Description-->
                                    <div class="mb-10">
                                        <h3 class="text-gray-900 mb-3">Beschreibung</h3>
                                        <div class="text-gray-600 fw-semibold fs-5">
                                            {!! nl2br(e($product->description)) !!}
                                        </div>
                                    </div>
                                    <!--end::Description-->

                                    <!--begin::Add to Cart-->
                                    <div class="card-toolbar">
                                        <form class="add-to-cart-form" data-product-id="{{ $product->id }}" method="POST"
                                            action="{{ route('cart.add', ['productId' => $product->id]) }}">
                                            @csrf
                                            <div class="d-flex align-items-center">
                                                <div class="input-group me-2 w-auto">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                                        onclick="decrementQuantity(this)">-</button>
                                                    <input type="number" class="form-control text-center"
                                                        name="quantity" value="1" min="1"
                                                        style="width: 50px;">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                                        onclick="incrementQuantity(this)">+</button>
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ki-duotone ki-basket fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    In den Warenkorb
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--end::Add to Cart-->
                                </div>
                            </div>
                        </div>
                        <!--end::Product Info-->
                    </div>
                </div>
                <!--end::Product Details-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Product Details Section-->
</x-landing-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartForm = document.querySelector('.add-to-cart-form');

        addToCartForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;

            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Wird hinzugefügt...
            `;

            const productId = form.dataset.productId;
            const quantity = form.querySelector('input[name="quantity"]').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]')
                .getAttribute('content');

            // Create form data
            const formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('quantity', quantity);

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 401) {
                        // Unauthorized - redirect to login
                        window.location.href = '/login';
                        return;
                    }
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Update cart count in profile dropdown
                        document.querySelectorAll('.cart-count').forEach(element => {
                            element.textContent = `${data.cartCount}`;
                        });

                        // Show success message
                        const toast = document.createElement('div');
                        toast.className = 'position-fixed top-0 end-0 p-3';
                        toast.style.zIndex = '5';
                        toast.innerHTML = `
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="ki-duotone ki-check-circle fs-2x text-success me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <strong class="me-auto">Erfolg</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ${data.message}
                            </div>
                        </div>
                    `;
                        document.body.appendChild(toast);

                        // Remove toast after 3 seconds
                        setTimeout(() => {
                            toast.remove();
                        }, 3000);
                    } else {
                        throw new Error(data.message || 'Failed to add item to cart');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error message
                    const toast = document.createElement('div');
                    toast.className = 'position-fixed top-0 end-0 p-3';
                    toast.style.zIndex = '5';
                    toast.innerHTML = `
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="ki-duotone ki-cross-circle fs-2x text-danger me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <strong class="me-auto">Fehler</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            ${error.message}
                        </div>
                    </div>
                `;
                    document.body.appendChild(toast);

                    // Remove toast after 3 seconds
                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                })
                .finally(() => {
                    // Reset button state
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                });
        });
    });

    function incrementQuantity(button) {
        const input = button.parentElement.querySelector('input');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity(button) {
        const input = button.parentElement.querySelector('input');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
