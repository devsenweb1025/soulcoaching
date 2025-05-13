<x-base-layout>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{ isset($partner) ? 'Partner bearbeiten' : 'Neuer Partner' }}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
            <form
                action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($partner))
                    @method('PUT')
                @endif

                @include('pages.admin.partners.partials.form')

                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ isset($partner) ? 'Aktualisieren' : 'Speichern' }}</span>
                    </button>
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-light me-3">Abbrechen</a>
                </div>
                <!--end::Actions-->
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>
