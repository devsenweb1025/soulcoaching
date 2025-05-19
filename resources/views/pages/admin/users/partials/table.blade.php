<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Name</th>
            <th class="min-w-125px">E-Mail</th>
            <th class="min-w-125px">Rolle</th>
            <th class="min-w-125px">Verifiziert</th>
            <th class="min-w-125px">Registriert am</th>
            <th class="text-end min-w-100px">Aktionen</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge badge-light-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                        {{ $user->role === 'admin' ? 'Administrator' : 'Benutzer' }}
                    </span>
                </td>
                <td>
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input toggle-verification" type="checkbox"
                            data-user-id="{{ $user->id }}"
                            {{ $user->email_verified_at ? 'checked' : '' }} />
                    </div>
                </td>
                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.users.edit', $user) }}"
                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-pencil fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    @if ($user->id !== auth()->id())
                        <button type="button"
                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-user"
                            data-user-id="{{ $user->id }}">
                            <i class="ki-duotone ki-trash fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!--end::Table-->

<!--begin::Pagination-->
<div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-semibold text-gray-700">
        Zeige {{ $users->firstItem() ?? 0 }} bis {{ $users->lastItem() ?? 0 }} von {{ $users->total() }}
        Einträgen
    </div>
    {{ $users->links('vendor.pagination.index') }}
</div>
<!--end::Pagination-->