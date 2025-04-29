<x-base-layout>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $content->page }} => {{ $content->section }} Inhalt bearbeiten</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contents.update', $content->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <textarea name="content" id="kt_docs_ckeditor_classic" class="form-control">{{ $content->content }}</textarea>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Änderungen speichern</button>
                    <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">Abbrechen</a>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>

<script src="{{ asset('plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script>
    var KTFormsCKEditorClassic = function() {
        var exampleClassic = function() {
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'), {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'bold', 'italic',
                            '|', 'bulletedList', 'numberedList'
                        ]
                    },
                    language: 'de'
                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        return {
            init: function() {
                exampleClassic();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function() {
        KTFormsCKEditorClassic.init();
    });
</script>
