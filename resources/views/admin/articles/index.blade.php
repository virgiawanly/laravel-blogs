<x-admin-layout>
    <x-slot name="title">Postingan</x-slot>

    <x-slot name="css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Postingan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Postingan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{-- <h2 class="card-title">Semua Postingan</h2>--}}
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="fas fa-globe-asia mr-1"></i> Diterbitkan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="#">Trash</a>
                            </li>
                        </ul>
                        <a href="{{ route('articles.create') }}" class="btn btn-primary ml-auto card-tools"><i class="fas fa-plus mr-2"></i><span>Buat Postingan</span></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="post-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Postingan</th>
                                        <th>Author</th>
                                        <th>Topik</th>
                                        <th>Diterbitkan</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                    <tr>
                                        <td title="{{ $article->title }}">
                                            <div class="d-flex">
                                                <img src="{{$article->imagePath()}}" alt="" loading="lazy" width="50" height="50" class="img-circle" style="object-fit: cover; object-position: center">
                                            <div class="ml-3"><a href="{{ route('articles.read', $article->slug) }}" class="text-dark">{{ $article->title }}</a></div>
                                            </div>
                                        </td>
                                        <td>{{ $article->author->name }}</td>
                                        <td>
                                            @foreach ($article->topics as $topic)
                                            <div class="badge badge-success">{{ $topic->name }}</div>
                                            @endforeach
                                        </td>
                                        <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm m-1"><i class="fas fa-edit mr-2"></i><span>Edit</span></a>
                                            <form action="{{ route('articles.destroy', $article->id) }}" class="d-inline" method="POST"
                                                onsubmit="
                                                    return confirm('Hapus postingan?');
                                                ">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm m-1"><i
                                                        class="fas fa-trash-alt mr-2"></i><span>Hapus</span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- jQuery -->
        <script src="{{asset('adminlte')}}/plugins/jquery/jquery.min.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('adminlte')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('adminlte')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('adminlte')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- Page specific script -->
        <script>
            $(function () {
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
