<x-base-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Bestellung # {{ $order->order_number }}</h3>
                <span class="text-muted">Erstellt am {{ $order->created_at->format('F j, Y H:i') }}</span>
            </div>
            <div class="card-toolbar">
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-light-primary">
                        <i class="fas fa-arrow-left"></i> Zurück zu Bestellungen
                    </a>
                    <button type="button" class="btn btn-sm btn-light-primary update-status"
                        data-id="{{ $order->id }}">
                        <i class="fas fa-sync"></i> Status aktualisieren
                    </button>
                    <button type="button" class="btn btn-sm btn-light-primary update-payment-status"
                        data-id="{{ $order->id }}">
                        <i class="fas fa-credit-card"></i> Zahlung aktualisieren
                    </button>
                    <button type="button" class="btn btn-sm btn-light-primary update-tracking"
                        data-id="{{ $order->id }}">
                        <i class="fas fa-truck"></i> Sendungsverfolgung aktualisieren
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-5 g-xl-8">
                <!-- Order Summary -->
                <div class="col-xl-4">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header">
                            <h3 class="card-title">Bestellübersicht</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column mb-5">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Status:</span>
                                    {!! $order->status_badge !!}
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Zahlungsstatus:</span>
                                    {!! $order->payment_status_badge !!}
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Zahlungsmethode:</span>
                                    <span class="text-gray-800">{{ ucfirst($order->payment_method) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Zwischensumme:</span>
                                    <span class="text-gray-800">@chf($order->total)</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Versandkosten:</span>
                                    <span class="text-gray-800">@chf($order->shipping_cost)</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Gesamtsumme:</span>
                                    <span class="text-gray-800 fw-bold">@chf($order->grand_total)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="col-xl-4">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header">
                            <h3 class="card-title">Kundeninformationen</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column mb-5">
                                <div class="d-flex align-items-center mb-5">
                                    <div class="symbol symbol-50px me-5">
                                        <span class="symbol-label bg-light-primary">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-gray-800 mb-1">{{ $order->user->name }}</span>
                                        <span class="text-muted">{{ $order->user->email }}</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <h4 class="text-gray-800 mb-3">Lieferadresse</h4>
                                <div class="text-gray-600">
                                    {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}<br>
                                    {{ $order->shipping_address }}<br>
                                    {{ $order->shipping_city }}, {{ $order->shipping_postal_code }}<br>
                                    {{ $order->shipping_country }}<br>
                                    {{ $order->shipping_phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="col-xl-4">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header">
                            <h3 class="card-title">Bestellte Artikel</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Produkt</th>
                                            <th class="min-w-125px">Menge</th>
                                            <th class="min-w-125px">Preis</th>
                                            <th class="min-w-125px">Gesamt</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->product_type === 'course')
                                                            <a href="{{ $item->options['download_link'] }}"
                                                                class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</a>
                                                        @elseif ($item->product_type === 'service')
                                                            <div class="symbol symbol-50px me-3">
                                                                <img src="{{ asset('storage/' . $item->service->image) }}"
                                                                    alt="{{ $item->service->title }}">
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href="{{ route('admin.services.edit', $item->service) }}"
                                                                    class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</a>
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-50px me-3">
                                                                <img src="{{ $item->product->image_url }}"
                                                                    alt="{{ $item->product->name }}">
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span
                                                                    class="text-gray-800 mb-1">{{ $item->product->name }}</span>
                                                                <span class="text-muted">SKU:
                                                                    {{ $item->product->sku }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>@chf($item->price)</td>
                                                <td>@chf($item->quantity * $item->price)</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Bestellstatus aktualisieren</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="statusForm">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Ausstehend
                                </option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                    In Bearbeitung</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Versendet
                                </option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>
                                    Geliefert</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                    Storniert</option>
                                <option value="refunded" {{ $order->status === 'refunded' ? 'selected' : '' }}>
                                    Rückerstattet</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="button" class="btn btn-primary" id="updateStatusBtn">
                        <i class="fas fa-save"></i> Status aktualisieren
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Status Update Modal -->
    <div class="modal fade" id="paymentStatusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Zahlungsstatus aktualisieren</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="paymentStatusForm">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label required">Zahlungsstatus</label>
                            <select name="payment_status" class="form-select" required>
                                <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>
                                    Ausstehend</option>
                                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Bezahlt
                                </option>
                                <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>
                                    Fehlgeschlagen</option>
                                <option value="refunded"
                                    {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Rückerstattet</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="button" class="btn btn-primary" id="updatePaymentStatusBtn">
                        <i class="fas fa-save"></i> Status aktualisieren
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tracking Update Modal -->
    <div class="modal fade" id="trackingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Sendungsverfolgung aktualisieren</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="trackingForm">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label required">Sendungsnummer</label>
                            <input type="text" name="tracking_number" class="form-control"
                                value="{{ $order->tracking_number }}" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Sendungsverfolgungs-URL</label>
                            <input type="url" name="tracking_url" class="form-control"
                                value="{{ $order->tracking_url }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="button" class="btn btn-primary" id="updateTrackingBtn">
                        <i class="fas fa-save"></i> Sendungsverfolgung aktualisieren
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>

<script>
    $(document).ready(function() {
        // Handle status update
        $('.update-status').click(function() {
            $('#statusModal').modal('show');
        });

        $('#updateStatusBtn').click(function() {
            const form = document.getElementById('statusForm');
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/orders/{{ $order->id }}/status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
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

                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                })
                .catch(error => {
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

                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                });
        });

        // Handle payment status update
        $('.update-payment-status').click(function() {
            $('#paymentStatusModal').modal('show');
        });

        $('#updatePaymentStatusBtn').click(function() {
            const form = document.getElementById('paymentStatusForm');
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/orders/{{ $order->id }}/payment-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
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

                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                })
                .catch(error => {
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

                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                });
        });

        // Handle tracking update
        $('.update-tracking').click(function() {
            $('#trackingModal').modal('show');
        });

        $('#updateTrackingBtn').click(function() {
            const form = document.getElementById('trackingForm');
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/orders/{{ $order->id }}/tracking`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
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

                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                })
                .catch(error => {
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

                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                });
        });
    });
</script>
