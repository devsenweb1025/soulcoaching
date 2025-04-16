<x-base-layout>
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Benachrichtigungen</h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" id="markAllAsRead">
                    Alle als gelesen markieren
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Typ</th>
                            <th>Nachricht</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notifications as $notification)
                            <tr>
                                <td>
                                    <span
                                        class="label label-lg label-light-{{ $notification->type === 'order' ? 'success' : 'primary' }} label-inline">
                                        @if ($notification->type === 'order')
                                            <i class="bi bi-cart"></i> Bestellung
                                        @elseif($notification->type === 'booking')
                                            <i class="bi bi-calendar"></i> Buchung
                                        @else
                                            <i class="bi bi-bell"></i> Benachrichtigung
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bolder">{{ $notification->data['title'] ?? 'Neue Benachrichtigung' }}
                                    </div>
                                    <div class="text-muted">{{ $notification->data['message'] ?? '' }}</div>
                                </td>
                                <td>{{ $notification->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    @if ($notification->read_at)
                                        <span class="label label-lg label-light-success label-inline">Gelesen</span>
                                    @else
                                        <span class="label label-lg label-light-warning label-inline">Ungelesen</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$notification->read_at)
                                        <button type="button" class="btn btn-sm btn-light-primary mark-as-read"
                                            data-id="{{ $notification->id }}">
                                            Als gelesen markieren
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Keine Benachrichtigungen gefunden</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    </div>
</x-base-layout>

<script>
    $(document).ready(function() {
        $('.mark-as-read').click(function() {
            var button = $(this);
            var notificationId = button.data('id');

            $.ajax({
                url: '/admin/notifications/' + notificationId + '/mark-as-read',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        button.closest('tr').find('.label-warning').removeClass(
                            'label-warning').addClass('label-success').text('Gelesen');
                        button.remove();
                    }
                }
            });
        });

        $('#markAllAsRead').click(function() {
            var button = $(this);

            $.ajax({
                url: '/admin/notifications/mark-all-as-read',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $('.mark-as-read').closest('tr').find('.label-warning').removeClass(
                            'label-warning').addClass('label-success').text('Gelesen');
                        $('.mark-as-read').remove();
                    }
                }
            });
        });
    });
</script>
