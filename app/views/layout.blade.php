<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <?php $theme = Theme::all(); ?>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="pampersdry.info">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <title><?= $title ?> | <?= Config::get('app.website_title') ?> Web Dashboard</title>

        <?php
        $active = '#000066';
        $logo = '/image/logo.png';
        $favicon = '/image/favicon.ico';
        foreach ($theme as $themes) {
            $active = $themes->active_color;
            $favicon = '/uploads/' . $themes->favicon;
            $logo = '/uploads/' . $themes->logo;
        }
        if ($logo == '/uploads/') {
            $logo = '/image/logo.png';
        }
        if ($favicon == '/uploads/') {
            $favicon = '/image/favicon.ico';
        }
        ?>

        <link rel="icon" type="image/ico" href="<?php echo asset_url(); ?><?php echo $favicon; ?>">

        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo asset_url(); ?>/admins/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo asset_url(); ?>/admins/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <!--<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo asset_url(); ?>/admins/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        <link href="<?php echo asset_url(); ?>/admins/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url(); ?>/admins/css/custom-admin.css" rel="stylesheet" type="text/css" />

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
        <script src="<?php echo asset_url(); ?>/admins/js/validator/jquery.validate.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            .error{
                color:red;
            }
        </style>
        <script src="<?php echo asset_url(); ?>/web/js/validation.js"></script>
    </head>

    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a  class="logo" href="{{ URL::Route('AdminMapview') }}" >
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="<?php echo asset_url(); ?><?php echo $logo; ?>"  width="40" height="40"> <?php
                $siteTitle = Config::get('app.website_title');
                echo $siteTitle;
                ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{trans('customize.Admin'); }}</span>
                            </a>
                            <ul class="dropdown-menu">

                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-12 text-center">
                                        <a href="{{ URL::Route('AdminAdmins') }}">{{trans('customize.admin_control'); }}</a>
                                    </div>

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="col-md-12">
                                        <a class="btn btn-default btn-flat btn-block" href="{{ URL::Route('AdminLogout') }}">{{trans('customize.log_out'); }}</a>
                                    </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">

                        <?php  foreach (get_permisos() as $modulo) {?>
                        <li id="dashboard" title="{{ $modulo->title }}">
                            <a href="{{ URL::Route($modulo->route) }}"><i class="{{ $modulo->icono }}"></i> <span>{{trans($modulo->modulo); }}</span></a>
                        </li>
                        <?php  } ?>

                        {{--
                        <li id="walks" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans('').'s'; }}</span></a>
                        </li>
                        <li id="owners" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans('').'s'; }}</span></a>
                        </li> --}}
                        {{-- <li id="reviews" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li>
                        <li id="information" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li>
                        <li id="provider-type" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li>
                        <li id="document-type" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li> --}}
                        {{-- <li id="promo_code" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li>
                        <li id="keywords" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{ trans(''); }}</span></a>
                        </li>
                        <li id="payments" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{trans('');}}</span></a>
                        </li>
                        <li id="settings" title="">
                            <a href="{{ URL::Route('') }}"><i class=""></i> <span>{{trans('');}}</span></a>
                        </li> --}}

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <section class="content-header">
                    <h1>
                        <?= $title ?>

                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo asset_url(); ?>/admins/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo asset_url(); ?>/admins/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script type="text/javascript">
$("#<?= $page ?>").addClass("active");
$('#option3').show();
$('.fade').css('opacity', '1');
$('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('color', '#ffffff');
$('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('background-color', '<?php echo $active; ?>');
        </script>

        <script>
            $(function () {

                $("#start-date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function (selectedDate) {
                        $("#end-date").datepicker("option", "minDate", selectedDate);
                    }
                });
                $("#end-date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function (selectedDate) {
                        $("#start-date").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#myModal").modal('show');
            });
        </script>
    </body>
    <!--/ END Body -->
</html>