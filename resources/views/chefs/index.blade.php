<!DOCTYPE html>
<html lang="en">
<head>
    <x-header_admin></x-header_admin>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <x-navbar_admin></x-navbar_admin>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-sidebar_admin></x-sidebar_admin>


    <div class="content-wrapper">
        <div class="row p-3">
            <div class="col-6"><h3>Chef List</h3></div>
            <div class="col-6 text-sm-right">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addChef">
                    New
                </button>
            </div>
        </div>
        {{--        {!! $dataTable->table() !!}--}}
        <table id="myTable" class="table table-striped">
            <thead>
            <tr>
                <th>full_Name</th>
                <th>email</th>
                <th>phone</th>
                <th>Action</th>
            </tr>
            </thead>


        </table>
        <!-- add Modal -->
        <div class="modal fade" id="addChef" tabindex="-1" role="dialog" aria-labelledby="addChef"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addChef">New Chef</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.chef.store') }}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="fname"> Name: </label>
                                        <input type="text" name="fname" id="fname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"> Email: </label>
                                        <input type="email" name="email" id="email" rows="10"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"> Phone: </label>
                                        <input type="phone" name="phone" id="email" rows="10"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Image</label>
                                        <input type="file" name="img" id="img" class="form-control">
                                    </div>
                                    <div class="row mt-3 modal-footer">
                                        <div class="col-4 ">
                                            <button type="submit" class="btn btn-warning">Save</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{--        edit modal--}}
        <div class="modal fade" id="editChef" tabindex="-1" role="dialog" aria-labelledby="addcategory"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editcategory">edit Chef</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.chef.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="editModalId" id="editModalId">
                                    <div class="form-group">
                                        <label for="fnameedit"> Name: </label>
                                        <input type="text" name="fnameedit" id="fnameedit" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailedit"> Email: </label>
                                        <input type="email" name="emailedit" id="emailedit" rows="10"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneedit"> Phone: </label>
                                        <input type="phone" name="phoneedit" id="phoneedit" rows="10"
                                               class="form-control">
                                    </div>
                                    <div class="row mt-3 modal-footer">
                                        <div class="col-4 ">
                                            <button type="submit" class="btn btn-warning">Save</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--    end edit modal--}}

    {{--    info modal--}}

    <div class="modal fade" id="infoChef" tabindex="-1" role="dialog" aria-labelledby="addcategory"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addcategory">category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="infoModalId" id="editModalId">
                            <div class="form-group">
                                <label for="fname"> Name: </label>
                                <input type="text" name="fname" id="fname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email: </label>
                                <input type="email" name="email" id="email" rows="10"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone"> Phone: </label>
                                <input type="phone" name="phone" id="email" rows="10"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<x-js_admin></x-js_admin>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.chef.index') }}",
            columns: [
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'phone_number', name: 'phone'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                },
            ]
        });

        var table = $('#myTable').DataTable();

        table.on('click', '.edit', function () {
            console.log('dit');
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent')
            }

            var data = table.row($tr).data();
            console.log(data);
            document.getElementById('editModalId').value = data['id'];
            document.getElementById('fnameedit').value = data['full_name'];
            document.getElementById('emailedit').value = data['email'];
            document.getElementById('phoneedit').value = data['phone_number'];
        });

        table.on('click', '.info', function () {
            // console.log('dit');

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent')
            }

            var data = table.row($tr).data();
            // console.log(data);

            document.getElementById('infoModalName').value = data['name'];
            document.getElementById('infoModalDescription').value = data['description'];
        });
        table.on('click', '.delete', function (e) {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent')
            }
            var data = table.row($tr).data();

            var id = data['id'];
            // alert('id = ' + data['id']);
            e.preventDefault()
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            })
                .then((willDeleted) => {
                    if (willDeleted) {

                        $.ajax({
                            type: "get",
                            url: "{{url('/admin/chef/delete')}}/" + id,
                            data: {id: id},
                            success: function (data) {
                                //
                            }
                        });
                        location.reload();
                    }
                });
        })
    });


</script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        swal("Congradulations", "{!! \Illuminate\Support\Facades\Session::get('success') !!}", "success", {
            button: "OK"
        })
    </script>
@endif

@if(\Illuminate\Support\Facades\Session::has('update'))
    <script>
        swal("Congradulations", "{!! \Illuminate\Support\Facades\Session::get('update') !!}", "success", {
            button: "OK"
        })
    </script>
@endif

@if(\Illuminate\Support\Facades\Session::has('delete'))
    <script>
        swal("Congradulations", "{!! \Illuminate\Support\Facades\Session::get('delete') !!}", "success", {
            button: "OK"
        })
    </script>
@endif


</body>
</html>
