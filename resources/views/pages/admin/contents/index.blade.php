<x-base-layout>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Seiteninhalte Verwaltung</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Seite</th>
                            <th>Bereich</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->page }}</td>
                                <td>{{ $content->section }}</td>
                                <td>
                                    <a href="{{ route('admin.contents.edit', $content->id) }}"
                                        class="btn btn-primary">
                                        Bearbeiten
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-base-layout>
