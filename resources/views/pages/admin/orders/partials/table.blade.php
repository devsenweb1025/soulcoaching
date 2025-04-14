<!--begin::Table container-->
<div class="table-responsive">
    <!--begin::Table-->
    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
        <!--begin::Table head-->
        <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-50px text-start">Order #</th>
                <th class="p-0 pb-3 min-w-150px text-start">Customer</th>
                <th class="p-0 pb-3 min-w-100px text-center">Status</th>
                <th class="p-0 pb-3 min-w-100px text-center">Payment</th>
                <th class="p-0 pb-3 min-w-100px text-end">Total</th>
                <th class="p-0 pb-3 min-w-100px text-end">Date</th>
                <th class="p-0 pb-3 min-w-100px text-end">Actions</th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                #{{ $order->order_number }}
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-2">
                                <span class="symbol-label bg-light-primary">
                                    <i class="fas fa-user text-primary"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-gray-800 fw-bold mb-1">{{ $order->user->name }}</span>
                                <span class="text-gray-400 fw-semibold d-block fs-7">{{ $order->user->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        {!! $order->status_badge !!}
                    </td>
                    <td class="text-center">
                        {!! $order->payment_status_badge !!}
                    </td>
                    <td class="text-end">
                        <span class="text-gray-800 fw-bold fs-6">CHF {{ number_format($order->grand_total, 2) }}</span>
                    </td>
                    <td class="text-end">
                        <span class="text-gray-400 fw-semibold d-block fs-7">{{ $order->created_at->format('d M Y H:i') }}</span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-eye fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </a>
                            <button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-order" data-id="{{ $order->id }}">
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
                    <td colspan="7" class="text-center py-5">
                        <div class="text-gray-500 fw-semibold fs-6">No orders found.</div>
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
        Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} entries
    </div>
    {{ $orders->links('vendor.pagination.metronic') }}
</div>
<!--end::Pagination-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete action
        $('.delete-order').click(function() {
            const orderId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/orders/${orderId}`, {
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
                                'Deleted!',
                                'Order has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    });
                }
            });
        });
    });
</script>
