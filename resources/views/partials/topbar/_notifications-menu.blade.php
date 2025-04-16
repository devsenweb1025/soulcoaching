<?php
    // List items
    $alerts = array(
        array(
            'title' => 'Project Alice',
            'description' => 'Phase 1 development',
            'time' => '1 hr',
            'icon' => 'technology-2',
            'state' => 'primary'
        ),
        array(
            'title' => 'HR Confidential',
            'description' => 'Confidential staff documents',
            'time' => '2 hrs',
            'icon' => 'information-5',
            'state' => 'danger'
        ),
        array(
            'title' => 'Company HR',
            'description' => 'Corporeate staff profiles',
            'time' => '5 hrs',
            'icon' => 'briefcase',
            'state' => 'warning'
        ),
        array(
            'title' => 'Project Redux',
            'description' => 'New frontend admin theme',
            'time' => '2 days',
            'icon' => 'cloud-change',
            'state' => 'success'
        ),
        array(
            'title' => 'Project Breafing',
            'description' => 'Product launch status update',
            'time' => '21 Jan',
            'icon' => 'icons/duotune/maps/map001.svg',
            'state' => 'primary'
        ),
        array(
            'title' => 'Banner Assets',
            'description' => 'Collection of banner images',
            'time' => '21 Jan',
            'icon' => 'graph-3',
            'state' => 'info'
        ),
        array(
            'title' => 'Icon Assets',
            'description' => 'Collection of SVG icons',
            'time' => '20 March',
            'icon' => 'color-swatch',
            'state' => 'warning'
        )
    );

    // Content library
    $logs = array(
        array( 'code' => '200 OK', 'state' => 'success', 'message' => 'New order', 'time' => 'Just now'),
        array( 'code' => '500 ERR', 'state' => 'danger', 'message' => 'New customer', 'time' => '2 hrs'),
        array( 'code' => '200 OK', 'state' => 'success', 'message' => 'Payment process', 'time' => '5 hrs'),
        array( 'code' => '300 WRN', 'state' => 'warning', 'message' => 'Search query', 'time' => '2 days'),
        array( 'code' => '200 OK', 'state' => 'success', 'message' => 'API connection', 'time' => '1 week'),
        array( 'code' => '200 OK', 'state' => 'success', 'message' => 'Database restore', 'time' => 'Mar 5'),
        array( 'code' => '300 WRN', 'state' => 'warning', 'message' => 'System update', 'time' => 'May 15'),
        array( 'code' => '300 WRN', 'state' => 'warning', 'message' => 'Server OS update', 'time' => 'Apr 3'),
        array( 'code' => '300 WRN', 'state' => 'warning', 'message' => 'API rollback', 'time' => 'Jun 30'),
        array( 'code' => '500 ERR', 'state' => 'danger', 'message' => 'Refund process', 'time' => 'Jul 10'),
        array( 'code' => '500 ERR', 'state' => 'danger', 'message' => 'Withdrawal process', 'time' => 'Sep 10'),
        array( 'code' => '500 ERR', 'state' => 'danger', 'message' => 'Mail tasks', 'time' => 'Dec 10'),
    );
?>

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
    <!--begin::Heading-->
    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset(theme()->getMediaUrlPath() . 'misc/pattern-1.jpg') }}')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold px-9 mt-10 mb-6">
            Benachrichtigungen
            <span class="fs-8 opacity-75 ps-3">
                {{ auth()->user()->unreadNotifications->count() }} ungelesen
            </span>
        </h3>
        <!--end::Title-->
    </div>
    <!--end::Heading-->

    <!--begin::Items-->
    <div class="scroll-y mh-325px my-5 px-8">
        @forelse(auth()->user()->notifications->take(10) as $notification)
            <!--begin::Item-->
            <div class="d-flex flex-stack py-4">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-35px me-4">
                        <span class="symbol-label bg-light-{{ $notification->type === 'order' ? 'success' : 'primary' }}">
                            @if($notification->type === 'order')
                                {!! theme()->getIcon('shopping-cart', 'fs-2 svg-icon-success') !!}
                            @elseif($notification->type === 'booking')
                                {!! theme()->getIcon('calendar', 'fs-2 svg-icon-primary') !!}
                            @else
                                {!! theme()->getIcon('notification-bing', 'fs-2 svg-icon-primary') !!}
                            @endif
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
                <span class="badge badge-light fs-8">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
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
