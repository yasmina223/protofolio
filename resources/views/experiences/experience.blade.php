@extends('layouts.master')
@section('title')
    experience
@endsection
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
                <h4 class="content-title mb-0 my-auto">Experiences</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    experience</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
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

    @if (session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                        data-toggle="modal" href="#modaldemo8">ADD</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="wd-15p border-bottom-0"> from_date</th>
                                            <th class="wd-15p border-bottom-0"> to_date</th>
                                            <th class="wd-15p border-bottom-0"> position</th>
                                            <th class="wd-15p border-bottom-0"> company</th>
                                            <th class="wd-15p border-bottom-0"> status</th>
                                            <th class="wd-15p border-bottom-0"> process</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($experiences as $experience)
                                            <tr>
                                                <td>{{ $experience->id }}</td>
                                                <td>{{ $experience->from_date }}</td>
                                                <td>{{ $experience->to_date }}</td>
                                                <td>{{ $experience->position }}</td>
                                                <td>{{ $experience->company }}</td>
                                                <td>{{ $experience->status }}</td>
                                                <td>
                                                    <button class="btn btn-outline-success btn-sm"
                                                        data-id="{{ $experience->id }}"
                                                        data-from_date="{{ $experience->from_date }}"
                                                        data-to_date="{{ $experience->to_date }}"
                                                        data-position="{{ $experience->position }}"
                                                        data-company="{{ $experience->company }}"
                                                        data-status="{{ $experience->status }}" data-toggle="modal"
                                                        data-target="#edit_Product">تعديل</button>


                                                    <button class="btn btn-outline-danger btn-sm "
                                                        data-id="{{ $experience->id }}"
                                                        data-from_date="{{ $experience->from_date }}"
                                                        data-to_date="{{ $experience->to_date }}"
                                                        data-position="{{ $experience->position }}"
                                                        data-company="{{ $experience->company }}"
                                                        data-status="{{ $experience->status }}" data-toggle="modal"
                                                        data-target="#modaldemo9">حذف</button>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end table --}}

                <!-- add-->
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title"> Add </h6><button aria-label="Close" class="close"
                                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('experiences.store') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="row">
                                            <label for="exampleInputEmail1">From_Date</label>
                                            <input type="text" class="form-control" id="from_date" name="from_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">To_Date</label>
                                            <input type="text" class="form-control" id="to_date" name="to_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Position</label>
                                            <input type="text" class="form-control" id="position" name="position">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company</label>
                                            <input type="text" class="form-control" id="company" name="company">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <input type="text" class="form-control" id="status" name="status">
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- edit --}}
            <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="experiences/update" method="post">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">From_date:</label>
                                    <input type="hidden" class="form-control" name="id" id="id">
                                    <input type="text" class="form-control" name="from_date" id="from_date">
                                </div>
                                <div class="form-group">
                                    <label for="title">To_Date:</label>
                                    <input type="text" class="form-control" name="to_date" id="to_date">
                                </div>
                                <div class="form-group">
                                    <label for="title">Position:</label>
                                    <input type="text" class="form-control" name="position" id="position">
                                </div>


                                <div class="form-group">
                                    <label for="title">Company:</label>
                                    <input type="text" class="form-control" name="company" id="company">
                                </div>
                                <div class="form-group">
                                    <label for="title">Status:</label>
                                    <input type="text" class="form-control" name="status" id="status">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- delete -->
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Delete</h6><button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="experiences/destroy" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" value="">
                                <input class="form-control" name="from_date" id="from_date" type="text" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>


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
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        $('#edit_Product').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var from_date = button.data('from_date')
            var to_date = button.data('to_date')
            var position = button.data('position')
            var company = button.data('company')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #from_date').val(from_date);
            modal.find('.modal-body #to_date').val(to_date);
            modal.find('.modal-body #position').val(position);
            modal.find('.modal-body #company').val(company);
            modal.find('.modal-body #status').val(status);

        })

        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var from_date = button.data('from_date')
            var to_date = button.data('to_date')
            var position = button.data('position')
            var company = button.data('company')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #from_date').val(from_date);
            modal.find('.modal-body #to_date').val(to_date);
            modal.find('.modal-body #position').val(position);
            modal.find('.modal-body #company').val(company);
            modal.find('.modal-body #status').val(status);
        })
    </script>
@endsection
