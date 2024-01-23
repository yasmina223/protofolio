@extends('layouts.master')
@section('title')
Setting
@stop
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Setting</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    setting</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('settings.update', $settings->id) }}" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    {{-- 1 --}}

                    <img src="{{ asset($settings->file_name ?? 'settings/1699996129.jpg') }}" alt="">
                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label"> NAME</label>
                            <input type="text" class="form-control" placeholder="name" name="name" id="name"
                                required>
                        </div>

                        <div class="col">
                            <label>jop_name</label>
                            <input class="form-control fc-datepicker" placeholder="your_jop" name="jop_name" id="jop_name"
                                type="text" required>
                        </div>
                    </div>
                    {{-- 2 --}}
                    <div class="row">
                        <div class="col">
                            <label>description</label>
                            <input class="form-control fc-datepicker" name="description" id="description" type="text"
                                required>
                        </div>
                        <div class="col">
                            <label>email</label>
                            <input class="form-control fc-datepicker" type="email" placeholder="@gmail.com" name="email"
                                id="email" required>
                        </div>
                    </div>
                    {{-- 3 --}}
                    <div class="row">
                        <div class="col">
                            <label>phone</label>
                            <input class="form-control fc-datepicker" type="phone" name="phone" id="phone"
                                placeholder="010254897" required>
                        </div>
                        <div class="col">
                            <label>file_name</label>
                            <input class="form-control fc-datepicker" name="file_name" id="file_name" type="file"
                                required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                        <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>

                    </div>




            </div>
        </div>

        </form>
    </div>
    </div>
    </div>
    </div> --

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
