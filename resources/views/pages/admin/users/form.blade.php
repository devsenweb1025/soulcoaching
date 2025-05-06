<x-base-layout>
    <x-slot name="title">{{ isset($user) ? 'Benutzer bearbeiten' : 'Neuer Benutzer' }}</x-slot>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{ isset($user) ? 'Benutzer bearbeiten' : 'Neuer Benutzer' }}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif

                @include('pages.admin.users.partials._form')

                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ isset($user) ? 'Aktualisieren' : 'Speichern' }}</span>
                        <span class="indicator-progress">
                            Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>
