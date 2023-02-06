<?php
require_once "root.php";
require_once "resources/require.php";
require_once "resources/check_auth.php";

if (permission_exists('omnichannel_livechat_view'))
{
    //access granted
}
else
{
    echo "access denied";
    //exit;
}

/**
    add multi-lingual support
*/

require_once "app_languages.php";
foreach($text as $key => $value)
{
    $text[$key] = $value[$_SESSION['domain']['language']['code']];
}

/**
    additional includes
*/

require_once "resources/header.php";


$document['title'] = $text['title-livechat'];

require 'resources/guzzle/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;


/**
    include the footer
*/

require_once "resources/footer.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Negócios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styleButton.css" rel="stylesheet" type="text/css">
    <!-- <link href="assets/css/popup.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    
    
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="">
                        <div class="pull-left">
                            <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="ion-navicon"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                            <form class="navbar-form pull-left" id="search" role="search" id="search" action="/search" autocomplete="off">
                                <div class="form-group">
                                    <div class="icon-bar">
                                        <input type="search" class="form-control search-bar" placeholder="Search..." aria-label="Search">
                                    </div>                                                                       
                                </div>
                            </form>
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification <span
                                            class="badge badge-xs badge-success">3</span></li>
                                    <li class="list-group">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-heading">Your order is placed</div>
                                                <p class="m-0">
                                                    <small>Dummy text of the printing and typesetting industry.</small>
                                                </p>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New Message received</div>
                                                    <p class="m-0">
                                                        <small>You have 87 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">Your item is shipped.</div>
                                                    <p class="m-0">
                                                        <small>It is a long established fact that a reader will</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- last list item -->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <small class="text-primary">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                        class="fa fa-crosshairs"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="true"><img
                                        src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"> Profile</a></li>
                                    <li><a href="javascript:void(0)"><span
                                                class="badge badge-success pull-right">5</span> Settings </a></li>
                                    <li><a href="javascript:void(0)"> Lock screen</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)"> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    <div class="text-center">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle">
                    </div>
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Lineker Santaterra
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"> Profile</a></li>
                                <li><a href="javascript:void(0)"> Settings</a></li>
                                <li><a href="javascript:void(0)"> Lock screen</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)"> Logout</a></li>
                            </ul>
                        </div>

                        <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                    </div>
                </div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.html" class="waves-effect"><i class="ti-home"></i><span> Dashboard
                                </span></a>
                        </li>

                        <li>
                            <a href="typography.html" class="waves-effect"><i class="ti-ruler-pencil"></i><span>
                                    Typography <span class="badge badge-primary pull-right">6</span></span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> UI
                                    Elements </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-panels.html">Panels</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-components.html">Components</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-alerts.html">Alerts</a></li>
                                <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-wand"></i> <span> Icons
                                </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="icons-material.html">Material Design</a></li>
                                <li><a href="icons-ion.html">Ion Icons</a></li>
                                <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i><span> Forms
                                </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-wysiwyg.html">WYSIWYG Editor</a></li>
                                <li><a href="form-uploads.html">Multiple File Upload</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Tables
                                </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-pie-chart"></i><span> Charts
                                </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="charts-morris.html">Morris Chart</a></li>
                                <li><a href="charts-chartjs.html">Chartjs</a></li>
                                <li><a href="charts-flot.html">Flot Chart</a></li>
                                <li><a href="charts-other.html">Other Chart</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-map-alt"></i><span> Maps
                                </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="maps-google.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html" class="waves-effect"><i class="ti-calendar"></i><span> Calendar
                                    <span class="badge badge-primary pull-right">NEW</span></span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Pages
                                </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-directory.html">Directory</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <!--<li class="has_sub">-->
                        <!--<a href="javascript:void(0);" class="waves-effect"><i class="ti-share"></i><span>Multi Menu </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                        <!--<ul>-->
                        <!--<li class="has_sub">-->
                        <!--<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                        <!--<ul style="">-->
                        <!--<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>-->
                        <!--<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>-->
                        <!--</ul>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>-->
                        <!--</li>-->
                        <!--</ul>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->        

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content" style="margin-bottom: 0px;">
                <div class="container text-nowrap">
                    <div class="btn-group list-group btn-group-justified" role="group" aria-label="">
                        <button type="button" class="btn btn-primary" style="width: 150px;">
                            <i class="bi bi-filter m-r-5"></i>
                            Funil de Vendas
                        </button>
                        <button type="button" class="btn btn-primary" style="width: 140px;">Novo</button>
                        <button type="button" class="btn btn-primary" style="width: 140px;">Qualificação</button>
                        <button type="button" class="btn btn-primary" style="width: 140px;">
                            <i class="bi bi-geo-alt-fill m-r-10"></i>
                            Proposta
                        </button>
                        <button type="button" class="btn btn-primary" style="width: 140px;">Fechamento</button>
                        <button type="button" class="btn btn-primary" style="width: 140px;">Follow Up 1</button>
                        <button type="button" class="btn btn-primary" style="width: 100px; margin: 0 0 0 1.5%;">
                            <i class="bi bi-hand-thumbs-up-fill m-r-10"></i>
                            Ganhou
                        </button>
                        <button type="button" class="btn btn-primary" style="width: 100px;">
                            <i class="bi bi-hand-thumbs-down-fill m-r-10"></i>
                            Perdeu
                        </button>
                    </div>
                    
                </div>
                                        
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info pull-right" style="font-size: 20px;">
                                        <a href="#">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>                                        
                                    </div>
                                    <div class="panel-body user-card">
                                        <div class="media-main text-center">
                                            <div class="info" style="font-size: 20px;">
                                                <i class="bi bi-briefcase-fill" style="font-size: 20px; color:#00a8d0"></i>
                                                <h4 class="m-b-0">Titulo a ser inserido</h4>
                                                <h5 class="m-t-0">Criado em 30 Mar</h5>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <ul class="list-inline m-t-30 widget-chart text-center">
                                            <li>
                                                <i class="bi bi-currency-dollar"
                                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                <h5 class="text-muted" style="display: inline;">Valor</h5>
                                                <h5 class="m-b-0">Não cadastrado</h5>
                                                <br>
                                            </li>
                                            <li>
                                                <i class="bi bi-calendar"
                                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px;color:#00a8d0"></i>
                                                <h5 class="text-muted" style="display: inline;">Previsão de fechamento</h5>
                                                <h5 class="m-b-0">Não cadastrado</h5>
                                                <br>
                                            </li>
                                            <li>
                                                <i class="ion-android-social-user"
                                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px;color:#00a8d0"></i>
                                                <h5 class="text-muted" style="display: inline;">Responsável</h5>
                                                <h5 class="m-b-0">Lineker</h5>
                                                <br>
                                            </li>
                                        </ul>
                                    </div> <!-- panel-body -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header bg-white m-b-30 rounded" style="height: 60px;">
                                    <div class="row">
                                        <div class="col-sm-3 text-center m-t-10">
                                            <span class="text-center text-info" style="display: block;"><b>104</b></span>
                                            <span class="text-center">Dias Aberto</span>
                                        </div>
                                        <div class="col-sm-3 text-center m-t-10">
                                            <span class="text-center text-info" style="display: block;"><b>104</b></span>
                                            <span class="text-center">Dias na fase</span>
                                        </div>
                                        <div class="col-sm-2 text-center m-t-10">
                                            <span class="text-center text-info" style="display: block;"><b>104</b></span>
                                            <span class="text-center">Interações</span>
                                        </div>
                                        <div class="col-sm-4 text-center m-t-10">
                                            <span class="text-center text-info" style="display: block;"><b>104</b></span>
                                            <span class="text-center">Dias sem Interação</span>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="row">
                                        <ul class="nav nav-tabs navtab-bg">
                                            <li class="active col-sm-6">
                                                <a class="text-center" href="#home" data-toggle="tab"
                                                    aria-expanded="false">
                                                    <span class="hidden-x">Nota</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-center" href="#profile" data-toggle="tab"
                                                    aria-expanded="true">
                                                    <span class="hidden-x">Atividade Realizada</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content m-t-15">
                                        <div class="tab-pane active" id="home">
                                            <div class="row">
                                                <div class="card card-body">
                                                    <div class="m-b-5 m-l-15 m-r-15" style="display: flex;">
                                                        <div class="col-md-2 text">
                                                            <a href="#">
                                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                                class="user-detail">
                                                            </a>
                                                        </div>
                                                        <div class="form-group col-lg-10">
                                                            <form class="w-lg">
                                                                <textarea class="form-control" rows="5" id="comment"
                                                                    style="box-shadow: 0 0 0 0; border: 0 none; outline: 0;"
                                                                    placeholder="Escreva ou grave o que aconteceu...">
                                                                </textarea>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent dropdown-toggle" type="button"
                                                        data-toggle="dropdown">
                                                        <i class="ti-align-right"></i> Tipo de Atividade <span
                                                            class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">HTML</a></li>
                                                        <li><a href="#">CSS</a></li>
                                                        <li><a href="#">JavaScript</a></li>
                                                    </ul>
                                                    <input type="submit" class="btn btn-info" value="salvar"
                                                        style="float: right;">
                                                    <button class="btn btn-transparent" style="float: right;"><i
                                                            class="ion-android-microphone"
                                                            style="font-size: 18px"></i></button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="profile">
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                                                enim justo, rhoncus ut,
                                                imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                                                pretium. Integer tincidunt.
                                                Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                                                tellus. Aenean leo ligula,
                                                porttitor eu, consequat vitae, eleifend ac, enim. Nullam dictum felis eu
                                                pede mollis pretium.
                                                Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean
                                                vulputate eleifend tellus.
                                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                                                eleifend ac, enim. Nullam
                                                dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus.
                                                Vivamus elementum semper nisi.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="panel-group panel-group-joined" id="accordion-test">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="bi bi-person-circle" style="vertical-align: middle;color:#00a8d0"></i>
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseZero"
                                                class="collapsed">
                                                Contato
                                            </a>                                            
                                        </h4>
                                    </div>
                                    <div id="collapseZero" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-1 text-center">
                                                    <i class="bi bi-person" style="vertical-align: middle; height: 30px; width: 30px;"></i>
                                                    <div></div>
                                                </div>
                                                <div class="col-md-11" style="display: block;">
                                                    <b>Teste</b>
                                                    <h6>Testeda@gmail.com</h6>
                                                    <h6>(21) 98514-8812</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="mdi mdi-city" style="vertical-align: middle;color:#00a8d0"></i>
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                                class="collapsed">
                                                Empresa
                                            </a>
                                            <br>
                                            <spam style="vertical-align: inherit;font-size: 10px;">Nenhuma empresa
                                                vinculada</spam>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body" style="display: block;">
                                            Busque uma empresa existente ou cadastre uma nova.
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="bi bi-aspect-ratio"
                                                style="vertical-align: middle;color:#00a8d0"></i>
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo"
                                                class="collapsed">
                                                Projetos
                                            </a>
                                            <br>
                                            <spam style="vertical-align: inherit;font-size: 10px;">Nenhum negócio
                                                encontrado</spam>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="bi bi-box"
                                                style="vertical-align: middle;color:#00a8d0"></i>
                                            <a data-toggle="collapse" data-parent="#accordion-test"
                                                href="#collapseThree" class="collapsed">
                                                Produtos
                                            </a>
                                            <br>
                                            <spam style="vertical-align: inherit;font-size: 10px;">Nenhum projeto
                                                encontrado</spam>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="ti-clip" style="vertical-align: middle;color:#00a8d0"></i>
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseFour"
                                                class="collapsed">
                                                Arquivos
                                            </a>
                                            <br>
                                            <spam style="vertical-align: inherit;font-size: 10px;">Nenhum arquivo
                                                encontrado</spam>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="#" class="dropzone">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple="multiple">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="text-center m-t-15">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light">Send
                                                        Files</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->


                                </div> <!-- container -->

                            </div> <!-- content -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square"
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-t-0" style="display: inline;">Campos Personalizados</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                    </div>
                                        <div class="panel-body user-card">
                                            <div class="media-main">
                                            
                                            </div>
                                            <div class="clearfix"></div>
                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <i class="mdi mdi-format-align-center"
                                                        style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                    <h5 class="text-muted" style="display: inline;">Order_day</h5>
                                                    <i class="bi bi-question-circle-fill text-muted pull-right" style="font-size: 15px;"></i>
                                                    <h5 class="m-b-0">21 a 30</h5>
                                                    <br>
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-format-align-center"
                                                        style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                    <h5 class="text-muted" style="display: inline;">computer</h5>
                                                    <i class="bi bi-question-circle-fill text-muted pull-right" style="font-size: 15px;"></i>
                                                    <h5 class="m-b-0">Sim</h5>
                                                    <br>
                                                </li>
                                        </ul>
                                        <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                                    </div> <!-- panel-body -->                                    
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Customer Register Form</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <i class="mdi mdi-format-align-center"
                                                        style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                    <h5 class="text-muted" style="display: inline;">utm_campanha</h5>
                                                    <i class="bi bi-question-circle-fill text-muted pull-right" style="font-size: 15px;"></i>
                                                    <h5 class="m-b-0">teste</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Venda</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Follow_up</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Dados do ROOT</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Links úteis</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">Self Service</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="info" style="font-size: 20px;">
                                        <i class="bi bi-chat-square" 
                                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                        <h5 class="m-b-0" style="display: inline;">String</h5>
                                        <i class="bi bi-pen pull-right" style="font-size: 16px; display: inline;"></i>
                                        <div class="panel-body user-card">
                                            <div class="media-main"></div>                                        
                                            <div class="clearfix"></div>

                                            <ul class="list-inline m-t-30 widget-chart text-center" style="display: block;">
                                                <li>
                                                    <h5 class="text-muted" style="display: inline;">Nenhum campo preenchido</h5>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" style="margin-top: 5px;">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <i class="ion-calendar"style="vertical-align: middle;font-size: 25px;padding-right: 5px; color:#00a8d0"></i>
                                        </div>
                                        <div class="col-sm-11">
                                            <spam class="m-t-0" style="display: inline;">
                                                O risco de esquecer do cliente sem
                                                uma atividade agendada é alto, mantenha pelo menos uma atividade por
                                                negócio.
                                            </spam>
                                        </div>                                        
                                        <div class="row m-l-15">
                                            <button class="btn btn-transparent m-l-15" style="color: #00a8d0;font-size: 15px;">
                                                <b>Criar nova atividade</b>
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="info" style="font-size: 20px;">
                                <i class="ion-chatbox"
                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                <h4 class="m-t-0" style="display: inline;">Últimas Comunicações</h4>
                            </div><br>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#emails">E-mails</a></li>
                                <li><a data-toggle="tab" href="#whatsapp">Whatsapp</a></li>
                                <li><a data-toggle="tab" href="#ligacoes">Ligações</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="emails" class="tab-pane fade in active">
                                    <i class="ti-email"
                                        style="vertical-align: middle;font-size: 25px;padding-right: 5px; color:#00a8d0"></i>
                                    <h3 style="display: inline;font-size: 16px;">Registre emails trocados na linha do
                                        tempo</h3><br>
                                    <spam class="m-t-0" style="display: inline;">Envie através do Moskit ou registre
                                        através da sua caixa</spam>
                                </div>
                                <div id="whatsapp" class="tab-pane fade">
                                    <h3>Menu 1</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat.</p>
                                </div>
                                <div id="ligacoes" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                            <div class="info" style="font-size: 20px;">
                                <i class="ion-more"
                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                <h4 class="m-t-0" style="display: inline;">Linha do Tempo</h4>
                            </div><br>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#todas">Todas</a></li>
                                <li><a data-toggle="tab" href="#email">Email</a></li>
                                <li><a data-toggle="tab" href="#notas">Notas</a></li>
                                <li><a data-toggle="tab" href="#atividades">Atividades</a></li>
                                <li><a data-toggle="tab" href="#whats">Whatsapp</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="todas" class="tab-pane fade in active">
                                    <i class="mdi mdi-account-circle"
                                        style="vertical-align: middle;font-size: 25px;padding-right: 5px; color:#00a8d0"></i>
                                    <h3 style="display: inline;font-size: 16px;">Contato Adicionado</h3><br>
                                    <spam class="m-t-0" style="display: inline;">contato@anota.ai via API</spam>
                                </div>
                                <div id="email" class="tab-pane fade">
                                    <h3>Menu 1</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat.</p>
                                </div>
                                <div id="notas" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="atividades" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="whats" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam.</p>
                                </div>
                            </div>


                            <div class="panel" style="background-color: #f5f5f5; border: 1px solid #B0C4DE; border-radius: 10px;">
                                <div id="todos" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="bi bi-briefcase"
                                                style="vertical-align: middle; font-size: 30px; color: #00a8d0;"></i>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="m-b-30" style="display: inline;"><b>Status Alterado</b></h5>
                                            <h6 class="text-muted m-t-0">Status alterado de <b>Aberto</b> para <b>Perdeu</b>
                                                por Norberto GoTo via Moskit
                                            </h6>
                                        </div>
                                        <div class="col-md-3" style="display: flex;">
                                            <span class="text-muted m-l-10">30 Mar, 13:30</span>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-detail m-t-0">
                                                <div class="img-responsive">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel" style="background-color: #f5f5f5; border: 1px solid #B0C4DE; border-radius: 10px;">
                                <div id="todos" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="bi bi-briefcase"
                                                style="vertical-align: middle; font-size: 30px; color: #00a8d0;"></i>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="m-b-30" style="display: inline;"><b>Status Alterado</b></h5>
                                            <h6 class="text-muted m-t-0">Status alterado de <b>Perdeu</b> para <b>Aberto</b>
                                                por Norberto GoTo via Moskit
                                            </h6>
                                        </div>
                                        <div class="col-md-3" style="display: flex;">
                                            <span class="text-muted m-l-10">30 Mar, 13:29</span>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-detail m-t-0">
                                                <div class="img-responsive">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel" style="background-color: #f5f5f5; border: 1px solid #B0C4DE; border-radius: 10px;">
                                <div id="todos" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="bi bi-briefcase"
                                                style="vertical-align: middle; font-size: 30px; color: #00a8d0;"></i>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="m-b-30" style="display: inline;"><b>Status Alterado</b></h5>
                                            <h6 class="text-muted m-t-0">Status alterado de <b>Aberto</b> para <b>Perdeu</b>
                                                por Norberto GoTo via API V2
                                            </h6>
                                        </div>
                                        <div class="col-md-3" style="display: flex;">
                                            <span class="text-muted m-l-10">30 Mar, 13:28</span>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-detail m-t-0">
                                                <div class="img-responsive">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel" style="background-color: #f5f5f5; border: 1px solid #B0C4DE; border-radius: 10px;">
                                <div id="todos" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="bi bi-arrow-counterclockwise"
                                                style="vertical-align: middle; font-size: 30px; color: #00a8d0;"></i>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="m-b-30" style="display: inline;"><b>Tentativa na atividade</b></h5>
                                            <h6 class="text-muted m-t-0">Ligar (Ligação)</h6>
                                            <h6>Ligar</h6>
                                            <p>Observações: 1 Tentativa sem sucesso - Retorno em 5 minutos</p>
                                        </div>
                                        <div class="col-md-3" style="display: flex;">
                                            <span class="text-muted m-l-10">30 Mar, 13:23</span>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-detail m-t-0">
                                                <div class="img-responsive">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel" style="background-color: #f5f5f5; border: 1px solid #B0C4DE; border-radius: 10px;">
                                <div id="todos" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="bi bi-briefcase"
                                                style="vertical-align: middle; font-size: 30px; color: #00a8d0;"></i>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="m-b-30" style="display: inline;"><b>Negócio Alterado</b></h5>
                                            <h6 class="text-muted m-t-0">Status alterado de <b>Perdeu</b> para <b>Aberto</b>
                                                por Norberto GoTo via Moskit
                                            </h6>
                                        </div>
                                        <div class="col-md-3" style="display: flex;">
                                            <span class="text-muted m-l-10">30 Mar, 13:30</span>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-detail m-t-0">
                                                <div class="img-responsive">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="list-group list-group-flush">
                                    <div class="panel-body" id="todos">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <i class="bi bi-calendar2-check"
                                                style="vertical-align: middle; font-size: 30px; color: #008000"></i>
                                            </div>
                                            <div class="col-md-7">
                                                <h5 class="m-b-30" style="display: inline;"><b>Atividade Concluída</b></h5>
                                                <h6 class="text-muted m-t-0">Ligar (Ligação)</h6>
                                            </div>
                                            <div class="col-md-3" style="display: flex;">
                                                <span class="text-muted m-l-10">30 Mar, 13:30</span>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="user-detail m-t-0">
                                                    <div class="img-responsive">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 35px; width: 35px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-l-15 m-0">
                                                <h5 class="m-l-15 m-b-0">Ligar</h5>
                                                <h5 class="m-l-15 m-t-0 m-b-0">Observações finais: Atendeu a Ligação - Perdido</h5>
                                                <h5 class="m-l-15 m-t-0 m-b-0">Tentativas: 1</h5>
                                                <h5 class="m-l-15 m-t-0 text-dark">Marcado como concluído em: 30/03/2022 às 13:28</h5>
                                            </div>   
                                            <div class="m-t-20">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="m-t-30 text-center" style="display: block;">
                                                            <div class="user-detail">
                                                                <div class="img-responsive img-circle">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" style="height: 20px; width: 20px;">
                                                                </div>
                                                                <div class="m-t-10 d-block">
                                                                    <i class="bi bi-briefcase-fill"
                                                                        style="vertical-align: middle; font-size: 20px; color: #00a8d0;"></i>
                                                                </div>
                                                                <div class="m-t-30 d-block">
                                                                    <i class="bi bi-person-circle"
                                                                       style="vertical-align: middle; font-size: 20px; color:#B0C4DE" ></i>
                                                                </div>
                                                            </div>                                             
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div class="m-t-30">
                                                            <span class="text-muted">Lineker Santaterra</span>
                                                        </div>
                                                        <div class="m-t-15">
                                                            <span class="text-muted">Teste Lineker Santaterra</span>
                                                        </div>
                                                        <hr>
                                                        <div class="m-t-40 m-l-10">
                                                            <span class="text-muted">Teste!</span>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>                                
                                </div>                                                      
                            </div>

                        

                        

                        <div class="col-sm-3">
                        </div>

                    </div>


                </div>


            </div> <!-- container -->
            
            

            
            

        </div> <!-- content -->

        
            

        <footer class="footer">
            2016 - 2020 © Xadmino.
        </footer>

    </div>

    

    
    <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <!-- Modal Pop-up -->
    <div class="fixed-action-btn">
        <button class="btn-floating btn-large btn-primary" type="button" data-toggle="modal" data-target="#pageModal_1">
            <i class="ion-plus"></i>
        </button>     
    </div>

    <!-- Modal -->

    <div class="modal right fade" id="pageModal_1" role="dialog" aria-labelledby="pageModal_1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="page-header-title" style="background-color: #A9A9A9;">                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 style="color: white;">Editar Contato</h5>
                </div>
                <div class="modal-body">
                    <div class="panel panel-body">
                        <form id="formularioAjax" method="post" action="">
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label><?=$text['label-name']?></label>
                                    <input id="name" class="form-control" name="nome" type="text" placeholder="Seu nome" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Tipo do Telefone</label>
                                    <select class="form-control" id="phone" style="border-bottom: ridge; color: #000;" name="tipoDoTelefone">
                                        <option>Telefone</option>
                                        <option>Telefone 1</option>
                                        <option>Telefone 2</option>
                                        <option>Telefone 3</option>
                                    </select>
                            </div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                                    <label><?=$text['label-phone']?></label>
                                    <input name="numero" id="number" type="tel" class="form-control" placeholder="Número" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Tipo do email</label>
                                <select class="form-control" id="emailType" style="border-bottom: ridge; color: #000;" name="tipoDeEmail">
                                    <option>Email</option>
                                    <option>Email 1</option>
                                    <option>Email 2</option>
                                    <option>Email 3</option>
                                    
                        </select>
                                </div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                                    <label><?=$text['label-email']?></label>
                                <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Rede Social</label>
                                <select class="form-control" name="social" id="social" style="border-bottom: ridge; color: #000;">
                                    <option>Rede Social</option>
                                    <option>Rede Social 1</option>
                                    <option>Rede Social 2</option>
                                    <option>Rede Social 3</option>
                        </select>
                                </div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                                    <label>Link</label>
                                <input id="link" type="url" class="form-control" placeholder="Link" name="rede" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label>Observações</label>
                                    <textarea id="obs" class="form-control" name="observacoes" placeholder="Observações" rows="3" style="border-bottom: ridge; color: #000;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label><?=$text['label-comments']?></label>
                                    <input id="comments" class="form-control" name="comentario" type="text" placeholder="Usuário responsável" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" style="float: right;" id="enviar">Enviar</button>                            
                            <!--<input type="hidden" name="addMsgCont" id="method" value="formAjax" />--> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body>
</html>


    <script src="assets/js/app.js"></script>
    <!-- Datatables-->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

    <script src="assets/pages/dashborad.js"></script>
    

    <script src="assets/js/app.js"></script>
    <!--Summernote js-->
    <script src="assets/plugins/summernote/summernote.min.js"></script>


    <script src="assets/js/app.js"></script>
    <script src="assets/js/scriptJs.js"></script>
    
    <script>

        jQuery(document).ready(function () {
            $('.wysihtml5').wysihtml5;

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });

        });
    </script>
    
</body>

</html>