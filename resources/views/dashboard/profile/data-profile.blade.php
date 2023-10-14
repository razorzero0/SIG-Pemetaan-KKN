@extends('dashboard/main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Profile</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Profile</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif


                                <div class="form-horizontal form-label-left" novalidate>


                                    <span class="section">Personal Info</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly id="name" class="form-control col-md-7 col-xs-12"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" readonly id="email" name="email" required="required"
                                                value="{{ $user->email }}" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Role
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="role" readonly id="role" name="role" required="required"
                                                value="{{ auth()->user()->roles->pluck('name')[0] }}"
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group my-2 ">
                                        <div class="col-md-6 col-md-offset-3 text-center">

                                            <a href="{{ route('data-profile.edit', auth()->user()->user_id) }}"
                                                id="send"class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- /page content -->
@endsection
