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
                    @php
                        $isJson = false;
                        $jsonContent = null;
                        try {
                            $jsonContent = json_decode($content->content, true);
                            $isJson = json_last_error() === JSON_ERROR_NONE;
                        } catch (\Exception $e) {
                            $isJson = false;
                        }
                    @endphp

                    @if($isJson)
                        @if(is_array($jsonContent) && !isset($jsonContent[0]))
                            {{-- Handle nested JSON structure (like trainings) --}}
                            @foreach($jsonContent as $category => $items)
                                <div class="mb-4">
                                    <h4 class="mb-3">{{ ucfirst(str_replace('_', ' ', $category)) }}</h4>
                                    <div class="items-container" data-category="{{ $category }}">
                                        @foreach($items as $index => $item)
                                            <div class="item-group mb-3">
                                                <textarea name="content[{{ $category }}][]" class="form-control mb-2">{{ $item }}</textarea>
                                                <button type="button" class="btn btn-sm btn-danger remove-item">Entfernen</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary add-item" data-category="{{ $category }}">Neues Element hinzufügen</button>
                                </div>
                            @endforeach
                        @else
                            {{-- Handle simple array JSON (like qualifications) --}}
                            <div class="items-container">
                                @foreach($jsonContent as $index => $item)
                                    <div class="item-group mb-3">
                                        <textarea name="content[]" class="form-control mb-2">{{ $item }}</textarea>
                                        <button type="button" class="btn btn-sm btn-danger remove-item">Entfernen</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-sm btn-primary add-item">Neues Element hinzufügen</button>
                        @endif
                    @else
                        {{-- Handle regular content --}}
                        <textarea name="content" id="kt_docs_ckeditor_classic" class="form-control">{{ $content->content }}</textarea>
                    @endif
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

    // Handle dynamic form elements
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor
        KTUtil.onDOMContentLoaded(function() {
            KTFormsCKEditorClassic.init();
        });

        // Add new item
        document.querySelectorAll('.add-item').forEach(button => {
            button.addEventListener('click', function() {
                const category = this.dataset.category;
                const container = category
                    ? document.querySelector(`.items-container[data-category="${category}"]`)
                    : document.querySelector('.items-container');

                const newItem = document.createElement('div');
                newItem.className = 'item-group mb-3';

                if (category) {
                    newItem.innerHTML = `
                        <textarea name="content[${category}][]" class="form-control mb-2"></textarea>
                        <button type="button" class="btn btn-sm btn-danger remove-item">Entfernen</button>
                    `;
                } else {
                    newItem.innerHTML = `
                        <textarea name="content[]" class="form-control mb-2"></textarea>
                        <button type="button" class="btn btn-sm btn-danger remove-item">Entfernen</button>
                    `;
                }

                container.appendChild(newItem);
            });
        });

        // Remove item
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('.item-group').remove();
            }
        });
    });
</script>

<style>
    .item-group {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    .item-group textarea {
        flex: 1;
    }
</style>
