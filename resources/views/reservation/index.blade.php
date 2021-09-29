<!DOCTYPE html>
<html lang="en">
<head>
    <x-header_admin></x-header_admin>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset("/dist/img/AdminLTELogo.png")}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <x-navbar_admin></x-navbar_admin>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-sidebar_admin></x-sidebar_admin>


    <div class=" content-wrapper">
        <table class="table">
            <tr>
                <th>full_name</th>
                <th>email</th>
                <th>Nombre de place</th>
                <th>Date</th>
                <th>heure début</th>
                <th>heure fin</th>
                <th>state</th>
            </tr>
            @foreach($reservation as $res)
                <tr>
                    <td>{{ $res->full_name }}</td>
                    <td>{{ $res->email }}</td>
                    <td>{{ $res->nbr_place }}</td>
                    <td>{{ $res->jour }}</td>
                    <td>{{ $res->date_debut }}</td>
                    <td>{{ $res->date_fin }}</td>

                    <td>
                        @if($res->state == 'non')

                            <a href="{{ route('reservation.accept', $res->id) }}" class="btn btn-sm btn-success">valid</a>

                        @else

                            <button href="" class="btn btn-sm btn-success">accepted</button>

                        @endif
                    </td>

                </tr>

            @endforeach
        </table>
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
