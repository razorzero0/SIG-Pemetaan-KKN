@extends('dashboard/main')
@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Kelompok</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('data-group.update', $group->group_id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="group_no">No Kelompok</label>
                                <input type="number" class="form-control" id="group_no" name="group_no"
                                    value="{{ $group->group_no }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">DPL</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="lecturer_id">
                                    <?php
                                    function option($obj, $target)
                                    {
                                        if ($obj == $target) {
                                            return 'selected';
                                        }
                                    } ?>
                                    @foreach ($lecturer as $l)
                                        <option
                                            {{ option($l->lecturer_id, $group->lecturer ? $group->lecturer->lecturer_id : 0) }}
                                            value="{{ $l->lecturer_id }}">
                                            {{ $l->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="group_leader">Ketua Kelompok</label>
                                <input type="text" class="form-control" id="group_leader" name="group_leader"
                                    value="{{ $group->group_leader }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Desa</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="location_id">
                                    @foreach ($location as $l)
                                        <option
                                            {{ option($l->location_id, $group->location ? $group->location->location_id : 0) }}
                                            value="{{ $l->location_id }}">
                                            {{ $l->village }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary col-12 my-2">Simpan</button>
                        </form>


                    </div>


                </div>
            </div>
        </div>

    </div>



@endsection
