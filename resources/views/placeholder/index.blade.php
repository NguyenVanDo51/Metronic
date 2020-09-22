@extends('templates.app')

@push('style')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('body')
page-header-menu-fixed
@endsection

@section('content')
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-content-wrapper">
                <div class="page-head">
                    <div class="container">
                        <div class="page-title">
                            <h1>PLaceholder</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
{{--                                            <button id="sample_editable_1_new" class="btn green"> Add New--}}
{{--                                                <i class="fa fa-plus"></i>--}}
{{--                                            </button>--}}
                                            <a class="btn green" data-toggle="modal" href="#new"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> User Id </th>
                                    <th> Title </th>
                                    <th> Body </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td> {{ $post['id'] ?? ""}} </td>
                                        <td> {{ $post['userId'] ?? ""}} </td>
                                        <td> {{ $post['title'] ?? ""}} </td>
                                        <td> {{ $post['body'] ?? ""}} </td>
                                        <td>
{{--                                            <a class="edit" href="{{ route('placeholder.update', $post['id']) }}"> Edit </a>--}}
                                            <a class="btn green edit" data-toggle="modal" href="#edit"> Edit </a>
                                        </td>
                                        <td>
{{--                                            <a class="delete" href="{{ route('placeholder.destroy', $post['id']) }}"> Delete </a>--}}
                                            <a class="btn red delete" data-toggle="modal" href="#delete"> Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="edit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <form action="{{route('placeholder.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    <label for="id">ID</label>
                    <input type="text" readonly id="id" name="id" class="form-control">

                    <label for="userId">User ID</label>
                    <input type="text" id="userId" name="userId" placeholder="User Id" class="form-control" style="margin-bottom: 1rem;">
                    @error('userId')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control"  style="margin-bottom: 1rem;">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Body" style="margin-bottom: 1rem;"></textarea>
                    @error('body')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green">Save&nbsp;</button>
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- MODAL NEW -->
    <div class="modal fade" id="new" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <form action="{{route('placeholder.store')}}" method="POST">
                    @csrf
                <div class="modal-body">
                    <label for="userIdNew">User ID</label>
                    <input type="text" id="userIdNew" name="userIdNew" placeholder="User Id" class="form-control" style="margin-bottom: 1rem;">

                    @error('userIdNew')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="titleNew">Title</label>
                    <input type="text" id="titleNew" name="titleNew" placeholder="Title" class="form-control" style="margin-bottom: 1rem;">

                    @error('titleNew')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="bodyNew">Body</label>
                    <textarea class="form-control" id="bodyNew" name="bodyNew" rows="5" placeholder="Body" style="margin-bottom: 1rem;"></textarea>

                    @error('bodyNew')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green">Add New</button>
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- MODAL DELETE -->
    <div class="modal fade" id="delete" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <form action="{{route('placeholder.destroy')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" id="idDelete" name="idDelete">
                        <p>Are you sure delete user <span id="user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn green">Delete</button>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection

@push('script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
{{--    <script src="{{ asset('assets/pages/scripts/table-datatables-editable.min.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/ui-modals.min.js" type="text/javascript') }}"></script>

    <script>
        var table = $("#sample_editable_1").dataTable({
            // lengthMenu: [[5, 15, 20, -1], [5, 15, 20, "All"]],
            // pageLength: 5,
            // language: {lengthMenu: " _MENU_ records"},
            // columnDefs: [{orderable: !0, targets: [0]}, {searchable: !0, targets: [0]}],
            order: [[0, "asc"]]
        })

    $('#sample_editable_1 tbody').on('click', 'tr', function() {
            if($(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }else {
                var row = table.$('tr.selected').removeClass('selected');
                console.log($(this).children()[0].textContent);
                $('input#id').val($(this).children()[0].textContent);
                $('input#userId').val($(this).children()[1].textContent);
                $('input#title').val($(this).children()[2].textContent);
                $('textarea#body').val($(this).children()[3].textContent);
                $(this).addClass('selected');

                $('input#idDelete').val($(this).children()[0].textContent);
                $('span#user').innerText($(this).children()[1].textContent);
            }
        });
        // $('#sample_editable_1').on()
    </script>
@endpush
