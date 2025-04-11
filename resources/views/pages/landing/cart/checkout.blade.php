<x-landing-layout>
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-350px px-9">
        <div class="cloud">
            <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                data-framer-background-image-wrapper="true">
                <img decoding="async" loading="lazy"
                    src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                    style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
            </div>
        </div>
        <!--begin::Heading-->
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Checkout
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Checkout Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <div class="row g-5">
                    <!--begin::Order Summary-->
                    <div class="col-lg-4">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Order Summary</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="min-w-150px">Product</th>
                                                <th class="min-w-100px">Quantity</th>
                                                <th class="min-w-100px">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50px me-5">
                                                                <img src="{{ $item->options->image }}" class="" alt="" />
                                                            </div>
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>CHF {{ number_format($item->price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Subtotal:</span>
                                    <span class="text-dark fw-bold fs-5">CHF {{ number_format(Cart::subtotal(), 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Tax (7.7%):</span>
                                    <span class="text-dark fw-bold fs-5">CHF {{ number_format(Cart::tax(), 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <span class="fw-bold fs-5">Total:</span>
                                    <span class="text-dark fw-bold fs-5">CHF {{ number_format(Cart::total(), 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Order Summary-->

                    <!--begin::Checkout Form-->
                    <div class="col-lg-8">
                        <div class="card shadow card-borderless mb-5">
                            <div class="card-header">
                                <h3 class="card-title">Shipping & Payment Information</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('cart.checkout.process') }}" method="POST" id="checkoutForm">
                                    @csrf
                                    <!--begin::Shipping Information-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Shipping Information</h4>
                                        <div class="row g-5">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">First Name</label>
                                                <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Last Name</label>
                                                <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Phone</label>
                                                <input type="tel" name="phone" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Address</label>
                                                <input type="text" name="address" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">City</label>
                                                <input type="text" name="city" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Postal Code</label>
                                                <input type="text" name="postal_code" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Country</label>
                                                <select name="country" class="form-select form-select-solid" required>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="AT">Austria</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Shipping Information-->

                                    <!--begin::Payment Information-->
                                    <div class="mb-10">
                                        <h4 class="mb-5">Payment Information</h4>
                                        <div class="row g-5">
                                            <div class="col-12">
                                                <label class="required fw-semibold fs-6 mb-2">Card Number</label>
                                                <input type="text" name="card_number" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Expiry Date</label>
                                                <input type="text" name="expiry_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="MM/YY" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">CVV</label>
                                                <input type="text" name="cvv" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Payment Information-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('cart.index') }}" class="btn btn-light me-3">Back to Cart</a>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Place Order</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Checkout Form-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Checkout Section-->
</x-landing-layout>

@push('scripts')
<script>
    // Form validation
    const form = document.getElementById('checkoutForm');
    const submitButton = form.querySelector('button[type="submit"]');
    const indicatorLabel = submitButton.querySelector('.indicator-label');
    const indicatorProgress = submitButton.querySelector('.indicator-progress');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Show loading state
        submitButton.setAttribute('data-kt-indicator', 'on');
        indicatorLabel.style.display = 'none';
        indicatorProgress.style.display = 'inline-block';

        // Simulate form submission
        setTimeout(() => {
            form.submit();
        }, 1000);
    });
</script>
@endpush
