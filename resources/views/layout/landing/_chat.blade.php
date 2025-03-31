<!-- Add this before the closing </body> tag -->

<!--begin::Chat Button-->
<div class="position-fixed bottom-0 end-0 p-6 z-index-3">
    <button type="button" class="btn btn-icon btn-circle btn-primary shadow-sm" data-kt-drawer-show="true"
        data-kt-drawer-target="#kt_drawer_chat">
        <!--begin::Svg Icon-->
        <span class="svg-icon svg-icon-2">
            {!! theme()->getIcon('message-text-2', 'fs-1 text-white') !!}
        </span>
        <!--end::Svg Icon-->
    </button>
</div>
<!--end::Chat Button-->

<!--begin::Chat Drawer-->
<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true"
    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
    data-kt-drawer-direction="end">

    <!--begin::Card-->
    <div class="card w-100 rounded-0">
        <!--begin::Card header-->
        <div class="card-header pe-5">
            <!--begin::Title-->
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <h3 class="fs-2 fw-bold mb-1">Live Chat</h3>
                    <div class="text-gray-400 fs-6">Direkt mit uns in Kontakt treten</div>
                </div>
            </div>
            <!--end::Title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-light-primary" data-kt-drawer-dismiss="true">
                    {!! theme()->getIcon('cross', 'fs-2') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
            <!-- Add your chat widget/iframe here -->
            <div class="h-100 d-flex flex-column">
                <!-- You can embed your preferred chat solution here -->
                <div class="text-center text-gray-600 fs-5 mb-5">
                    Wie können wir Ihnen helfen?
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Chat Drawer-->
