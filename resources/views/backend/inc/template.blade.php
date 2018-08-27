<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>ADMIN: Microsite-Nexcare</title>
  
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/style.css') }}">

    <!-- You can change the theme colors from here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/colors/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/dropify.min.css') }}">
    <!-- css -->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <img src="{{ asset('images/backend/home_logo.png') }}" alt="" style="width: 100%;height: auto;">
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                           {{--  <a class="nav-link dropdown-toggle waves-effect profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a> --}}
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        {{-- <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">workmotion@gmail.com</p></div>
                                        </div> --}}
                                    </li>
                                    <li role="separator" class="divider"></li>
                           <!--          <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li> -->
                                    <li>
                                        <a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- MENU</li>
                            <li><a class="waves-effect waves-dark" href="{{route('backend.home')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Home</span></a></li>
                            <li><a class="waves-effect waves-dark" href="{{route('users.index')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Users</span></a></li>                            
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        <!-- =========
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <div class="card-title"><h3>@yield('title')</h3></div>
                            <h6 class="card-subtitle"> @yield('subtitle')</h6>
                            <h6 class="card-subtitle"> @yield('subtitle2')</h6>
                             @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Admin by workmotioncreative
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script type="text/javascript" src="{{ asset('js/backend/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/backend/popper.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/backend/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/backend/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/backend/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('js/backend/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.sparkline.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('js/backend/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('js/backend/jQuery.style.switcher.js') }}"></script>

    <script src="{{ asset('js/backend/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/backend/dropify.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/combodate.js')}}"></script>
    <!-- combodate -->
    <script>
        $(function(){
            $('#date').combodate();    
        });
    </script>
    <script>
  $( function() {
    $( "#sortable" ).sortable({
        placeholder: "list-group-item-info",
        stop: function(event, ui) {
            for (i=1; i<=$(this).children().length ; i++ ){ 
                $(".bg-primary").eq(i-1).text(i);
            }
        }
    });
    $( "#sortable" ).disableSelection();
  } );
  function SubmitRC(){
    var fromdata = [];
    var columcnt = 1 ;
    $('#sortable').find('li').each(function() {
        data =  { 
                    'position' : columcnt 
                    ,'id' : this.id
                }
        fromdata.push(data);
        columcnt++;
    }); 
    

    ajax_url = $('#base_url').val()+"-position" ;
    $.ajax({
        url: ajax_url ,
        type: "post",
        data :   {  "_token": "{{ csrf_token() }}", fromdata: fromdata } ,
        async: false,
        success: function(html) {  
        console.log(html);                                                    
            if(html.status){
                window.location.href = $('#base_url').val();
            }else{
                alert("Something went wrong.");
            }
        }, 
         error: function(request, status, errorThrown) {
             alert("Something went wrong.");
        }
    });

}
</script>
<script src="'https://nexventure2018.com/templateEditor/ckeditor/ckeditor.js"></script>
    @yield('js')
</body>

</html>