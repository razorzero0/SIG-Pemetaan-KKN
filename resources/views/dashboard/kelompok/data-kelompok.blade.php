@extends('dashboard/main')
@section('content')
    <div class="right_col" role="main">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Kelompok</h2>
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


                    <button type="button" class="btn btn-primary w-25 h-50 my-2 mx-4" data-toggle="modal"
                        data-target="#exampleModal">
                        Tambah Kelompok
                    </button>

                    <div class="card-body">

                        <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No. Kelompok</th>
                                    <th>DPL</th>
                                    <th>Desa</th>
                                    <th>Ketua Grup</th>
                                    <th>Aksi</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                
                                function option($obj, $target)
                                {
                                    if ($obj == $target) {
                                        return 'selected';
                                    }
                                    // else {
                                    //     return 'disabled';
                                    // }
                                }
                                
                                ?>

                                @foreach ($group as $g)
                                    <?php $no += 1; ?>
                                    <tr>
                                        <td width="0.5rem">{{ $g->group_no }}</td>
                                        <td>{{ $g->lecturer ? $g->lecturer->name : 'belum ada' }}</td>
                                        <td>{{ $g->location ? $g->location->village : 'belum ada' }}</td>
                                        <td>{{ $g->group_leader }}</td>
                                        <td>
                                            @csrf
                                            @method('DELETE')
                                            <form action="{{ route('data-group.destroy', $g->group_id) }} " method="POST">
                                                <a href="{{ route('data-group.edit', $g->group_id) }}"
                                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> edit</a>
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('apakah yakin untuk menghapus data ?')"><i
                                                        class="fa fa-trash"></i> hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelompok</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('data-group.store') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label for="group_no">No Kelompok</label>
                                            <input type="number" class="form-control" id="group_no" name="group_no">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">DPL</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="lecturer_id">
                                                @foreach ($lecturer as $l)
                                                    <option value="{{ $l->lecturer_id }}">{{ $l->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label for="group_leader">Ketua Kelompok</label>
                                            <input type="text" class="form-control" id="group_leader"
                                                name="group_leader">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih Desa</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="location_id">
                                                @foreach ($location as $l)
                                                    <option value="{{ $l->location_id }}">{{ $l->village }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <button type="submit" name="submit"
                                            class="btn btn-primary col-12 my-2">Simpan</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





@endsection
