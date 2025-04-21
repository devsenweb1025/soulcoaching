<div id="products-container">
    @forelse ($products as $product)
        <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-delay="500">
            <div class="card card-stretch shadow card-borderless mb-5">
                <div class="card-header py-5">
                    <div class="w-100 h-200px"
                        style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Heading-->
                    <div class="mb-5 text-start">
                        <a href="{{ route('shop.show', $product->slug) }}" class="text-decoration-none">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 text-hover-primary mb-3 fw-bold">
                                {{ $product->name }}
                            </h1>
                            <!--end::Title-->
                        </a>
                        <!--begin::Price-->
                        <div class="text-start">
                            <span class="fs-2 fw-bold text-primary">
                                @chf($product->price)
                            </span>
                            @if ($product->compare_price)
                                <span class="text-muted text-decoration-line-through ms-2">
                                    @chf($product->compare_price)
                                </span>
                            @endif
                        </div>
                        <!--end::Price-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Features-->
                    <div class="w-100">
                        <div class="text-gray-600 fw-semibold fs-5 description-text">
                            @php
                                $shortText =
                                    strlen($product->description) > 150
                                        ? substr($product->description, 0, 150) . '...'
                                        : $product->description;
                            @endphp
                            <span class="short-text">{{ $shortText }}</span>
                            <span class="full-text" style="display: none;">{{ $product->description }}</span>
                        </div>
                        <a href="#" class="text-primary show-more-link">Mehr anzeigen</a>
                    </div>
                    <!--end::Features-->
                </div>
                <div class="card-footer">
                    <div class="card-toolbar text-center">
                        <form class="add-to-cart-form d-flex align-items-center justify-content-between"
                            data-product-id="{{ $product->id }}" method="POST"
                            action="{{ route('cart.add', ['productId' => $product->id]) }}">
                            @csrf
                            <div class="input-group me-2 w-auto">
                                <button class="btn btn-outline-secondary btn-sm" type="button"
                                    onclick="decrementQuantity(this)">-</button>
                                <input type="number" class="form-control text-center" name="quantity" value="1"
                                    min="1" style="width: 50px;">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                Keine Produkte gefunden.
            </div>
        </div>
    @endforelse

    @if ($products->hasMorePages())
        <div class="text-center mt-10">
            <button type="button" class="btn btn-primary" id="load-more-products">
                <span class="indicator-label">Mehr Produkte laden</span>
                <span class="indicator-progress" style="display: none;">
                    Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    @endif
</div>
