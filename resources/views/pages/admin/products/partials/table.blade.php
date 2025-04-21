<!--begin::Table container-->
<div class="table-responsive">
    <!--begin::Table-->
    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
        <!--begin::Table head-->
        <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-50px text-start">Bild</th>
                <th class="p-0 pb-3 min-w-150px text-start">Name</th>
                <th class="p-0 pb-3 min-w-100px text-start">SKU</th>
                <th class="p-0 pb-3 min-w-100px text-end">Preis</th>
                <th class="p-0 pb-3 min-w-100px text-end">Menge</th>
                <th class="p-0 pb-3 min-w-100px text-center">Status</th>
                <th class="p-0 pb-3 min-w-100px text-center">Hervorgehoben</th>
                <th class="p-0 pb-3 min-w-100px text-end">Aktionen</th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <div class="symbol symbol-50px me-2">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="object-fit-contain"
                                    alt="{{ $product->name }}" />
                            @else
                                <div class="symbol-label bg-light">
                                    <i class="ki-duotone ki-photo fs-2x text-gray-400">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#"
                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $product->name }}</a>
                            <span
                                class="text-gray-400 fw-semibold d-block fs-7">{{ Str::limit($product->description, 50) }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="text-gray-800 fw-bold d-block mb-1 fs-6">{{ $product->sku ?? 'N/A' }}</span>
                    </td>
                    <td class="text-end">
                        <span class="text-gray-800 fw-bold fs-6">@chf($product->price)</span>
                    </td>
                    <td class="text-end">
                        <span class="text-gray-800 fw-bold fs-6">{{ $product->quantity }}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $product->is_active ? 'success' : 'danger' }} fs-7 fw-bold">
                            {{ $product->is_active ? 'Aktiv' : 'Inaktiv' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span
                            class="badge badge-light-{{ $product->is_featured ? 'success' : 'warning' }} fs-7 fw-bold">
                            {{ $product->is_featured ? 'Ja' : 'Nein' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-pencil fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-product" data-id="{{ $product->id }}">
                                <i class="ki-duotone ki-trash fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="text-gray-500 fw-semibold fs-6">Keine Produkte gefunden.</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
<!--end::Table container-->

<!--begin::Pagination-->
<div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-semibold text-gray-700">
        Zeige {{ $products->firstItem() ?? 0 }} bis {{ $products->lastItem() ?? 0 }} von {{ $products->total() }}
        Einträgen
    </div>
    {{ $products->links('vendor.pagination.index') }}
</div>
<!--end::Pagination-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete action
        $('.delete-product').click(function() {
            const productId = $(this).data('id');
            Swal.fire({
                title: 'Sind Sie sicher?',
                text: "Diese Aktion kann nicht rückgängig gemacht werden!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ja, löschen!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/products/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Gelöscht!',
                                'Produkt wurde erfolgreich gelöscht.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Fehler!',
                            'Etwas ist schief gelaufen.',
                            'error'
                        );
                    });
                }
            });
        });
    });
</script>
