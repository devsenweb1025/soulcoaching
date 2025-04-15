<x-landing-layout>
    @include('pages.landing._partials._background')

    <!--begin::Product Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Product-->
                <div class="card card-stretch shadow card-borderless mb-5">
                    <div class="card-body">
                        <div class="row g-5">
                            <!--begin::Product Image-->
                            <div class="col-lg-6">
                                <div class="position-relative">
                                    <div class="w-100 h-400px"
                                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                    </div>
                                    @if($product->isOnSale())
                                        <div class="position-absolute top-0 end-0 m-2">
                                            <span class="badge badge-danger fs-6">
                                                -{{ $product->discount_percentage }}%
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                @if($product->images)
                                    <div class="row g-2 mt-4">
                                        @foreach(json_decode($product->images) as $image)
                                            <div class="col-3">
                                                <div class="w-100 h-100px cursor-pointer"
                                                    style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ asset('storage/' . $image) }})"
                                                    onclick="changeMainImage(this)">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <!--end::Product Image-->

                            <!--begin::Product Details-->
                            <div class="col-lg-6">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 mb-3 fw-bold">
                                    {{ $product->name }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Price-->
                                <div class="mb-5">
                                    <span class="fs-2 fw-bold text-primary">
                                        {{ $product->formatted_price }}
                                    </span>
                                    @if($product->compare_price)
                                        <span class="text-muted text-decoration-line-through ms-2">
                                            {{ $product->formatted_compare_price }}
                                        </span>
                                    @endif
                                </div>
                                <!--end::Price-->

                                <!--begin::Description-->
                                <div class="mb-5">
                                    <h4 class="text-gray-900 mb-3">Beschreibung</h4>
                                    <div class="text-gray-600 fs-6">
                                        {{ $product->description }}
                                    </div>
                                </div>
                                <!--end::Description-->

                                <!--begin::Stock Status-->
                                <div class="mb-5">
                                    @if($product->isInStock())
                                        <span class="badge badge-success fs-6">
                                            <i class="ki-duotone ki-check-circle fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Auf Lager
                                        </span>
                                    @else
                                        <span class="badge badge-danger fs-6">
                                            <i class="ki-duotone ki-cross-circle fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Nicht auf Lager
                                        </span>
                                    @endif
                                </div>
                                <!--end::Stock Status-->

                                <!--begin::Add to Cart-->
                                <div class="mb-5">
                                    <form class="add-to-cart-form d-flex align-items-center"
                                          data-product-id="{{ $product->id }}"
                                          method="POST"
                                          action="{{ route('cart.add', ['productId' => $product->id]) }}">
                                        @csrf
                                        <div class="input-group me-2 w-auto">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="decrementQuantity(this)">-</button>
                                            <input type="number" class="form-control text-center"
                                                name="quantity" value="1" min="1"
                                                style="width: 50px;">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="incrementQuantity(this)">+</button>
                                        </div>
                                        <button type="submit" class="btn btn-primary" {{ $product->isInStock() ? '' : 'disabled' }}>
                                            <i class="ki-duotone ki-basket fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            In den Warenkorb
                                        </button>
                                    </form>
                                </div>
                                <!--end::Add to Cart-->

                                <!--begin::Product Meta-->
                                <div class="mb-5">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-gray-600 me-2">SKU:</span>
                                        <span class="text-gray-900">{{ $product->sku ?? 'N/A' }}</span>
                                    </div>
                                    @if($product->barcode)
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-600 me-2">Barcode:</span>
                                            <span class="text-gray-900">{{ $product->barcode }}</span>
                                        </div>
                                    @endif
                                </div>
                                <!--end::Product Meta-->
                            </div>
                            <!--end::Product Details-->
                        </div>
                    </div>
                </div>
                <!--end::Product-->

                <!--begin::Related Products-->
                @if($relatedProducts->count() > 0)
                    <div class="mt-20">
                        <h2 class="text-gray-900 mb-10">Ähnliche Produkte</h2>
                        <div class="row g-5">
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="col-lg-3">
                                    <div class="card card-stretch shadow card-borderless">
                                        <div class="card-header py-5">
                                            <div class="w-100 h-200px"
                                                style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ $relatedProduct->image ? asset('storage/' . $relatedProduct->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="text-gray-900 mb-3 fw-bold">
                                                <a href="{{ route('shop.show', $relatedProduct->slug) }}" class="text-gray-900 text-hover-primary">
                                                    {{ $relatedProduct->name }}
                                                </a>
                                            </h3>
                                            <div class="text-start">
                                                <span class="fs-2 fw-bold text-primary">
                                                    {{ $relatedProduct->formatted_price }}
                                                </span>
                                                @if($relatedProduct->compare_price)
                                                    <span class="text-muted text-decoration-line-through ms-2">
                                                        {{ $relatedProduct->formatted_compare_price }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!--end::Related Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Product Section-->
</x-landing-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function(e) {
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
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
                        const cartCountElement = document.querySelector('.cart-count');
                        if (cartCountElement) {
                            cartCountElement.textContent = data.cartCount;
                        }

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

    function changeMainImage(element) {
        const mainImage = document.querySelector('.w-100.h-400px');
        mainImage.style.backgroundImage = element.style.backgroundImage;
    }
</script>
