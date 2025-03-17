@extends('layouts.template')

@section('title', 'Create A New Post')

@section('CSS')
    <!-- QuillJS Full Feature -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet"> --}}

    {{-- SummerNote --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 mx-auto col-md-12">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                <h3 class="fw-bold">Create a New Post</h3>
                <a href="{{ route('training.posts') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>
                    Back</a>
            </div>

            <form method="POST" action="{{ route('training.posts.create.post') }}" id="createPost" class="mt-4"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" class="form-control form-control-lg" id="title" name="title"
                        placeholder="Enter a compelling title..." value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="8"
                        placeholder="Write your description...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                    <input type="file" class="form-control form-control-lg" id="thumbnail" value="{{ old('thumbnail') }}"
                        name="thumbnail">
                    {{-- @error('thumbnail')
                        <span class="text-danger">{{$message}}</span>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="publish_date" class="form-label fw-semibold">Publish Date</label>
                    <div class="input-group">
                        <input type="datetime-local" class="form-control" id="publish_date" name="publish_date" 
                            value="{{ old('publish_date') }}">
                        <label class="input-group-text"><i class="fas fa-calendar-alt"></i></label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    {{-- <div id="editor" style="height: 800px"></div> --}}
                    {{-- <input type="hidden" name="content" id="hiddenContent" value="{{ old('content') }}"> --}}
                    <textarea id="editor" name="content" value="{{ old('content') }}"></textarea>

                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Publish</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('JS')
    {{-- SummerNote --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                height: 300, // Chiều cao khung soạn thảo
                placeholder: 'Nhập nội dung...',
                tabsize: 2,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

    </script>    

    <!-- QuillJS Core -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script> --}}

    <!-- QuillJS Extensions -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-table@1.2.9/dist/quill-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-mention@2.1.0/dist/quill.mention.min.js"></script> --}}

    {{-- <script>
        var ImageResize = Quill.import("modules/imageResize");

        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        font: []
                    }],
                    [{
                        size: ['small', false, 'large', 'huge']
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        script: 'sub'
                    }, {
                        script: 'super'
                    }],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    [{
                        indent: '-1'
                    }, {
                        indent: '+1'
                    }],
                    [{
                        align: []
                    }],
                    [{
                        direction: 'rtl'
                    }],
                    ['link', 'image', 'video', 'blockquote', 'code-block', 'formula'],
                    ['clean']
                ],
                clipboard: {
                    matchVisual: false
                },
                imageResize: {},
                mention: {
                    allowedChars: /^[A-Za-z\s]*$/,
                    mentionDenotationChars: ["@"],
                    source: function(searchTerm, renderList) {
                        const values = [{
                            id: 1,
                            value: 'Admin'
                        }, {
                            id: 2,
                            value: 'User'
                        }];
                        renderList(values.filter(v => v.value.toLowerCase().includes(searchTerm)));
                    }
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var oldContent = document.getElementById("hiddenContent").value;

            if (oldContent) {
                quill.root.innerHTML = oldContent;
            }
        });

        quill.on('text-change', function() {
            document.querySelector('#hiddenContent').value = quill.root.innerHTML;
        });
    </script> --}}


@endsection
