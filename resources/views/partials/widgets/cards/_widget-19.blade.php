<!--begin::Lists Widget 19-->
<div class="card card-flush h-xl-100">
    <!--begin::Heading-->
    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
        style="background-image:url('{{ asset(theme()->getMediaUrlPath() . 'svg/shapes/top-green.png') }}')" data-bs-theme="light">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column text-white pt-15">
            <span class="fw-bold fs-2x mb-3">My Tasks</span>

            <div class="fs-4 text-white">
                <span class="opacity-75">You have</span>

                <span class="position-relative d-inline-block">
                    <a href="#" class="link-white opacity-75-hover fw-bold d-block mb-1">4 tasks</a>

                    <!--begin::Separator-->
                    <span
                        class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                    <!--end::Separator-->
                </span>

                <span class="opacity-75">to comlete</span>
            </div>
        </h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar pt-5">
            <!--begin::Menu-->
            <button
                class="btn btn-sm btn-icon btn-active-color-primary btn-color-white bg-white bg-opacity-25 bg-hover-opacity-100 bg-hover-white bg-active-opacity-25 w-20px h-20px"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">

                <i class="ki-duotone ki-dots-square fs-4"><span class="path1"></span><span class="path2"></span><span
                        class="path3"></span><span class="path4"></span></i>
            </button>


            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">
                        New Ticket
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">
                        New Customer
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                    <!--begin::Menu item-->
                    <a href="#" class="menu-link px-3">
                        <span class="menu-title">New Group</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu item-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                Admin Group
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                Staff Group
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                Member Group
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">
                        New Contact
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary  btn-sm px-4" href="#">
                            Generate Reports
                        </a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->

            <!--end::Menu-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Heading-->

    <!--begin::Body-->
    <div class="card-body mt-n20">
        <!--begin::Stats-->
        <div class="mt-n20 position-relative">
            <!--begin::Row-->
            <div class="row g-3 g-lg-6">
                <!--begin::Col-->
                <div class="col-6">
                    <!--begin::Items-->
                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px me-5 mb-8">
                            <span class="symbol-label">
                                <i class="ki-duotone ki-flask fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </span>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Stats-->
                        <div class="m-0">
                            <!--begin::Number-->
                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">37</span>
                            <!--end::Number-->

                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">Courses</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6">
                    <!--begin::Items-->
                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px me-5 mb-8">
                            <span class="symbol-label">
                                <i class="ki-duotone ki-bank fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </span>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Stats-->
                        <div class="m-0">
                            <!--begin::Number-->
                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">6</span>
                            <!--end::Number-->

                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">Certificates</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6">
                    <!--begin::Items-->
                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px me-5 mb-8">
                            <span class="symbol-label">
                                <i class="ki-duotone ki-award fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </span>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Stats-->
                        <div class="m-0">
                            <!--begin::Number-->
                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">4,7</span>
                            <!--end::Number-->

                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">Avg. Score</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6">
                    <!--begin::Items-->
                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px me-5 mb-8">
                            <span class="symbol-label">
                                <i class="ki-duotone ki-timer fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </span>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Stats-->
                        <div class="m-0">
                            <!--begin::Number-->
                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">822</span>
                            <!--end::Number-->

                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">Hours Learned</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
<!--end::Lists Widget 19-->
