@extends('dashboard/main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Dosen Pembimbing Lapangan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif


                    <button type="button" class="btn btn-primary w-25 h-50 mt-4 mx-4" data-toggle="modal"
                        data-target="#addModal">
                        Tambah DPL
                    </button>

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIDN</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($dpl as $dosen)
                                    <tr>
                                        <td>{{ $no += 1 }}</td>
                                        <td>{{ $dosen->name }}</td>
                                        <td>{{ $dosen->nidn }}</td>

                                        <td style="display: flex;gap:5px;" class="my-5">
                                            <button class="btn btn-xs btn-success" data-toggle="modal"
                                                data-target="#editModal{{ $no }}"><i class="fa fa-edit "></i>
                                                Edit</button>
                                            <form action="{{ route('data-dpl.destroy', $dosen->lecturer_id) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('apakah yakin untuk menghapus data ?')"><i
                                                        class="fa fa-trash"></i> hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- EDIT Modal -->
                                    <div class="modal fade" id="editModal{{ $no }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    <h4 class="modal-title" id="editModalLabel">Edit DPL</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('data-dpl.update', $dosen->lecturer_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Nama DPL</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $dosen->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nidn">NIDN</label>
                                                            <input type="text" class="form-control" id="nidn"
                                                                name="nidn" value="{{ $dosen->nidn }}">
                                                        </div>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary col-12 ml-auto">Simpan</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- ADD  Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title" id="addModalLabel">Tambah DPL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-dpl.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama DPL</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" name="nidn">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary col-12 ml-auto">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->



    <script></script>
    <!-- /page content -->
@endsection
