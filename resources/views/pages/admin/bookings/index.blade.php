<x-base-layout>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Booking Calendar</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Details Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-calendar-check me-2"></i>
                        <span id="eventName">Booking Details</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Event Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-calendar-event me-2 text-primary"></i>
                                        <div>
                                            <small class="text-muted">Event Type</small>
                                            <p class="mb-0" id="eventType"></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-clock me-2 text-primary"></i>
                                        <div>
                                            <small class="text-muted">Start Time</small>
                                            <p class="mb-0" id="eventStart"></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-clock-fill me-2 text-primary"></i>
                                        <div>
                                            <small class="text-muted">End Time</small>
                                            <p class="mb-0" id="eventEnd"></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-globe me-2 text-primary"></i>
                                        <div>
                                            <small class="text-muted">Timezone</small>
                                            <p class="mb-0" id="eventTimezone"></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                                        <div>
                                            <small class="text-muted">Location</small>
                                            <p class="mb-0" id="eventLocation"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Invitees</h6>
                                </div>
                                <div class="card-body">
                                    <div id="inviteesList" class="list-group list-group-flush">
                                        <!-- Invitees will be populated here -->
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Questions & Answers</h6>
                                </div>
                                <div class="card-body">
                                    <div id="questionsAnswers" class="list-group list-group-flush">
                                        <!-- Q&A will be populated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="joinMeetingBtn" class="btn btn-primary" target="_blank">
                        <i class="bi bi-camera-video me-2"></i>Join Meeting
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
<style>
    .fc-event {
        cursor: pointer;
    }
</style>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: {
                url: '{{ route('admin.bookings.events') }}',
                method: 'GET',
                success: function(response) {
                    // Transform Calendly events to FullCalendar format
                    return response.collection.map(function(event) {
                        return {
                            id: event.uri,
                            title: event.name || 'Meeting',
                            start: event.start_time,
                            end: event.end_time,
                            backgroundColor: getEventColor(event.status),
                            extendedProps: {
                                eventType: event.event_type,
                                status: event.status,
                                location: event.location,
                                timezone: event.timezone,
                                uri: event.uri
                            }
                        };
                    });
                }
            },
            eventClick: function(info) {
                fetch(`/admin/bookings/invitees?eventUri=${info.event.extendedProps.uri}`)
                    .then(response => response.json())
                    .then(data => {
                        const event = info.event;
                        const props = event.extendedProps;

                        // Set basic event info
                        $('#eventName').text(event.title);
                        $('#eventType').text(props.eventType || 'N/A');
                        $('#eventStart').text(event.start.toLocaleString());
                        $('#eventEnd').text(event.end.toLocaleString());

                        // Get timezone from first invitee
                        const timezone = data.collection?.[0]?.timezone || 'N/A';
                        $('#eventTimezone').text(timezone);

                        // Handle location and join link
                        const location = props.location;
                        if (location?.join_url) {
                            $('#eventLocation').html(`
                                <a href="${location.join_url}" target="_blank" class="text-primary">
                                    <i class="bi bi-link-45deg me-1"></i>Join Meeting
                                </a>
                            `);
                            $('#joinMeetingBtn').attr('href', location.join_url).show();
                        } else if (location?.location) {
                            $('#eventLocation').text(location.location);
                            $('#joinMeetingBtn').hide();
                        } else {
                            $('#eventLocation').text('N/A');
                            $('#joinMeetingBtn').hide();
                        }

                        // Handle invitees
                        const inviteesList = $('#inviteesList');
                        inviteesList.empty();
                        if (data.collection && data.collection.length > 0) {
                            data.collection.forEach(function(invitee) {
                                inviteesList.append(`
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="bi bi-person-circle text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">${invitee.name || 'N/A'}</h6>
                                                <p class="mb-0 text-muted small">${invitee.email || 'N/A'}</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="badge bg-${invitee.status === 'active' ? 'success' : 'danger'}">
                                                    ${invitee.status}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            inviteesList.append(`
                                <div class="list-group-item text-center text-muted">
                                    No invitees found
                                </div>
                            `);
                        }

                        // Handle questions and answers
                        const qaContainer = $('#questionsAnswers');
                        qaContainer.empty();
                        if (data.collection?.[0]?.questions_and_answers?.length > 0) {
                            data.collection[0].questions_and_answers.forEach(function(qa) {
                                qaContainer.append(`
                                    <div class="list-group-item">
                                        <h6 class="mb-1">${qa.question}</h6>
                                        <p class="mb-0 text-muted">${qa.answer || 'No answer provided'}</p>
                                    </div>
                                `);
                            });
                        } else {
                            qaContainer.append(`
                                <div class="list-group-item text-center text-muted">
                                    No questions and answers
                                </div>
                            `);
                        }

                        $('#eventModal').modal('show');
                    });
            },
            eventDidMount: function(info) {
                // Add tooltips to events
                $(info.el).tooltip({
                    title: `${info.event.title}\nStatus: ${info.event.extendedProps.status}`,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            }
        });
        calendar.render();
    });

    function getEventColor(status) {
        switch (status) {
            case 'active':
                return '#28a745'; // Green
            case 'canceled':
                return '#dc3545'; // Red
            default:
                return '#6c757d'; // Gray
        }
    }
</script>
