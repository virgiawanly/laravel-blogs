<x-admin-layout>
    <x-slot name="title">Artikel Baru</x-slot>

    <x-slot name="css">
        <!-- AdminLTE -->
        <link rel="stylesheet"
            href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">

        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/ratw3ypfzla9chgg1ugmllpxzoszb3lc951m1j2aqw64gtks/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Artikel Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('articles.index')}}">Artikel</a></li>
                        <li class="breadcrumb-item active">Buat Artikel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <div><b>Error</b></div>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul Artikel</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Judul artikel">
                            </div>
                            <div class="form-group">
                                <label for="content">Konten</label>
                                <textarea name="content" id="content" class="form-control" rows="10"
                                placeholder="Isi artikel"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" rows="5"
                                    placeholder="Preview mengenai artikel ini"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Topik</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="topics[]"
                                        data-dropdown-css-class="select2-purple" data-placeholder="Tambahkan Topik"
                                        style="width: 100%;">
                                        @foreach ($topics as $topic)
                                        <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Cover</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Terbitkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- Select2 -->
        <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>

        <!-- Current Page Script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2({
                    tags: true
                })
            })

            tinymce.init({
                selector: 'textarea#content',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste codesample help wordcount'
                ],
                codesample_languages: [
                    {text: 'HTML/XML', value: 'markup'},
                    {text: 'JavaScript', value: 'javascript'},
                    {text: 'CSS', value: 'css'},
                    {text: 'PHP', value: 'php'},
                    {text: 'Ruby', value: 'ruby'},
                    {text: 'Python', value: 'python'},
                    {text: 'Java', value: 'java'},
                    {text: 'C', value: 'c'},
                    {text: 'C#', value: 'csharp'},
                    {text: 'C++', value: 'cpp'}
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | codesample |help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            });
        </script>
    </x-slot>
</x-admin-layout>
