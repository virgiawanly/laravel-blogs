<x-admin-layout>
    <x-slot name="title">Topik</x-slot>

    <x-slot name="css">
        <!-- DataTables -->
        <link rel="stylesheet"
            href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
            href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Topik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item">Topik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="card-title">Topik</h2>
                    </div>
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <table id="post-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Topik</th>
                                        <th>Slug</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topics as $topic)
                                        <tr>
                                            <td>{{ $topic->name }}</td>
                                            <td>{{ $topic->slug }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#topicModal{{ $topic->id }}">
                                                    <i class="fas fa-edit mr-2"></i><span>Edit</span>
                                                </button>
                                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST"
                                                    onsubmit="
                                                        return confirm('Delete this topic?');
                                                    ">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm m-1"><i
                                                            class="fas fa-trash-alt mr-2"></i><span>Hapus</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="topicModal{{ $topic->id }}" tabindex="-1"
                                            aria-labelledby="topicModal{{ $topic->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('topics.update', $topic->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="topicModal{{ $topic->id }}Label">Edit topik</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Topik</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $topic->name }}" name="name"
                                                                    placeholder="Nama topik...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Slug</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $topic->slug }}" name="slug"
                                                                    placeholder="slug-topik">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('topics.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h2 class="card-title">Buat topik baru</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Topik</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama topik...">
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="slug-topik">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Buat Topik</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- jQuery -->
        <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- Page specific script -->
        <script>
            $(function() {
                $('#post-table').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    </x-slot>
</x-admin-layout>
