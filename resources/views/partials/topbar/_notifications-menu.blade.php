<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
    <!--begin::Heading-->
    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset(theme()->getMediaUrlPath() . 'misc/pattern-1.jpg') }}')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold px-9 mt-10 mb-6">
            Benachrichtigungen
            <span class="fs-8 opacity-75 ps-3 unread-count">
                {{ auth()->user()->unreadNotifications->count() }} ungelesen
            </span>
        </h3>
        <!--end::Title-->
    </div>
    <!--end::Heading-->

    <!--begin::Items-->
    <div class="scroll-y mh-325px my-5 px-8 notifications-list">
        @forelse(auth()->user()->notifications->take(10) as $notification)
            <!--begin::Item-->
            <div class="d-flex flex-stack py-4 notification-item {{ $notification->read_at ? '' : 'bg-light-primary' }}" data-id="{{ $notification->id }}">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-35px me-4">
                        <span class="symbol-label bg-light-{{ $notification->data['type'] === 'order' ? 'success' : 'primary' }}">
                            <i class="{{ $notification->data['icon'] ?? 'fas fa-bell' }} fs-2"></i>
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <!--begin::Title-->
                    <div class="mb-0 me-2">
                        <div class="fs-6 text-gray-800 fw-bolder">
                            {{ $notification->data['title'] ?? 'Neue Benachrichtigung' }}
                        </div>
                        <div class="text-gray-400 fs-7">
                            {{ $notification->data['message'] ?? '' }}
                        </div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Section-->

                <!--begin::Label-->
                <div class="d-flex flex-column align-items-end">
                    <span class="badge badge-light fs-8 mb-2">
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                    @if(!$notification->read_at)
                        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary mark-as-read" title="Als gelesen markieren" data-id="{{ $notification->id }}">
                            <i class="fas fa-check fs-2"></i>
                        </button>
                    @endif
                </div>
                <!--end::Label-->
            </div>
            <!--end::Item-->
        @empty
            <div class="text-center py-4">
                <span class="text-gray-400 fs-7">Keine Benachrichtigungen vorhanden</span>
            </div>
        @endforelse
    </div>
    <!--end::Items-->

    <!--begin::View more-->
    <div class="py-3 text-center border-top">
        <a href="{{ route('admin.notifications.index') }}" class="btn btn-color-gray-600 btn-active-color-primary">
            Alle anzeigen
            {!! theme()->getIcon("arrow-right", "fs-5") !!}
        </a>
    </div>
    <!--end::View more-->
</div>
<!--end::Menu-->

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle mark as read button clicks
        document.querySelectorAll('.mark-as-read').forEach(button => {
            button.addEventListener('click', function() {
                const notificationId = this.dataset.id;
                const notificationItem = this.closest('.notification-item');

                // Send AJAX request to mark notification as read
                fetch(`/admin/notifications/${notificationId}/mark-as-read`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the mark as read button
                        this.remove();

                        // Remove the unread background
                        notificationItem.classList.remove('bg-light-primary');

                        // Update unread count
                        const unreadCount = document.querySelector('.unread-count');
                        const currentCount = parseInt(unreadCount.textContent);
                        const newCount = currentCount - 1;

                        if (newCount > 0) {
                            unreadCount.textContent = `${newCount} ungelesen`;
                        } else {
                            unreadCount.textContent = '0 ungelesen';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error marking notification as read:', error);
                });
            });
        });
    });
</script>
@endpush
