<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/assets/gui/css/css-reset.css') !!}" type="text/css"  />
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/assets/gui/css/jquery.dop.Select.css') !!}" type="text/css"  />
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/assets/gui/css/jquery.dop.BackendBookingCalendarPRO.css') !!}" type="text/css"  />
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/templates/default/css/jquery.dop.FrontendBookingCalendarPRO.css') !!}" type="text/css"  />

<!-- Bootstrap Core CSS -->
    <link href="{!! url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')!!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! url('public/admin/bower_components/metisMenu/dist/metisMenu.min.css')!!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! url('public/admin/dist/css/sb-admin-2.css')!!}" rel="stylesheet">
    <link href="{!! url('public/admin/dist/css/jquery-ui.css')!!}" rel="stylesheet">
    <link href="{!! url('public/admin/dist/css/jquery-ui-timepicker-addon.css')!!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css')!!}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{!! url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{!! url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')!!}" rel="stylesheet">
    <!-- CKeditor  -->
    <script src="{!! url('public/admin/js/ckeditor/ckeditor.js')!!}"></script>

    <script src="{!! url('public/admin/js/ckfinder/ckfinder.js')!!}"></script>
    <!-- Booking Calendar  CSS -->


    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
    <script src="{!! url('public/admin/js/func_ckfinder.js')!!}"></script>
    <!--End CKeditor  -->
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin Area </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{!! route('auth.getlogout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bars fa-fw"></i> Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.cate.getlist') !!}">List Category</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.cate.getadd') !!}">Add Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Destination<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.destination.getlist') !!}">List Destination</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.destination.getadd') !!}">Add Destination</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Tour<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.tour.getlist') !!}">List Tour</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.tour.getadd') !!}">Add Tour</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-university  fa-fw"></i> Hotel <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.hotel.getlist') !!}">List Hotel</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.hotel.getadd') !!}">Add Hotel</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bed  fa-fw"></i> Room <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.room.getlist') !!}">List Room</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.room.getadd') !!}">Add Room</a>
                            </li>
                        </ul>
                    </li>
                    <li>

                        <a href="#"><i class="fa fa-car  fa-fw"></i> Car <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.car.getlist') !!}">List Car</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.car.getadd') !!}">Add Car</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-building  fa-fw"></i> Facilities <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.fac.getlist') !!}">List Facilities</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.fac.getadd') !!}">Add Facilities</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{!! route('admin.user.getlist') !!}"><i class="fa fa-user fa-fw" ></i> User Manager</a>
                        <!-- /.nav-second-level -->
                    </li>

                        <!-- /.nav-second-level -->
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('controller-action')</h1>
                </div>
                <div class="col-lg-12">
                    @if(Session::has('flash_msg'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_msg') !!}
                        </div>
                    @endif
                </div>
                <!--  Content -->
                @yield('content')
                <!--  Content -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title" id="myModalLabel"><strong>Setup Booking Calendar</strong></h1>
            </div>
            <div class="modal-body">
                <div class="calendar12"></div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- /#modal-->
<!-- /#wrapper -->
<!-- Angularjs -->

<!-- jQuery -->
<script type="text/javascript" src="{!! url('public/admin/js/jquery-1.12.0.min.js') !!}"></script>
<script language="javascript">
    $(document).ready(function () {
        $("i.calendar").on('click',function()
        {

            window.token  = $(this).attr('data-token');
            window.booktype  = $(this).attr('data-type');

        });
    });
</script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/jquery.dop.Select.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/dop-prototypes.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/jquery.dop.FrontendBookingCalendarPRO.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/jquery.dop.BackendBookingCalendarPRO.js') !!}"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{!! url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')!!}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{!! url('public/admin/bower_components/metisMenu/dist/metisMenu.min.js')!!}"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! url('public/admin/dist/js/sb-admin-2.js')!!}"></script>
<script src="{!! url('public/admin/js/jquery-ui.js')!!}"></script>
<script src="{!! url('public/admin/js/jquery-ui-timepicker-addon.js')!!}"></script>


<!-- DataTables JavaScript -->
<script src="{!! url('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')!!}"></script>

<script src="{!! url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')!!}"></script>



<!-- BOOKING CALENDAR -->


<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ url('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#formadduser') !!}
<script src="{!! url('public/admin/js/myscript.js')!!}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
