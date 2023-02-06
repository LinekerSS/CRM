<?php
require_once "root.php";
require_once "resources/require.php";
require_once "resources/check_auth.php";

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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styleButton.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link href="assets/plugins/web-fonts-with-css/old_css/fontawesome.min.css?v=1.0.19" rel="stylesheet" type="text/css">

</head>


<body class="" id="page">

    <!-- Begin page -->
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel" id="negocioPainel">

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="nav nav-tabs navtab-bg">
                                <li class="active col-sm-6">
                                    <a href="#home" class="text-center" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                                        <span class="hidden-xs">Nota</span>
                                    </a>

                                </li>
                                <li class="col-sm-6">
                                    <a href="#profile" class="text-center" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Atividade Realizada</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-control col-sm-11">
                                                <textarea class="form-control" id="comment"
                                                    style="box-shadow: 0 0 0 0; border: 0 none; outline: 0; overflow: hidden; min-height: 74px !important"
                                                    placeholder="Escreva ou grave o que aconteceu...">
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>                                    
                                </div>
                                <div class="tab-pane" id="profile">
                                    <p>
                                        ...
                                    </p>
                                </div>
                            </div>
                            <div class="form-control row m-t-30" style="display: flex; float: right">
                                <div class="col-md-4">
                                    <div class="">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-transparent" style="float: right;"><i class="ion-android-microphone" style="font-size: 18px"></i></button>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" id="salvarTarefa" class="btn btn-info" value="salvar" style="float: right;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <i class="ion-calendar"
                                        style="vertical-align: middle;font-size: 25px;padding-right: 5px; color:#00a8d0"></i>
                                </div>
                                <div class="col-sm-11">
                                    <spam class="m-t-0" style="display: inline;">
                                        O risco de esquecer do cliente sem
                                        uma atividade agendada é alto, mantenha pelo menos uma atividade por
                                        negócio.
                                    </spam>
                                </div>
                                <div class="row m-l-15">
                                    <button class="btn btn-white m-l-15"
                                        style="color: #00a8d0; font-size: 15px; padding-top:10px;" type="button"
                                        data-toggle="modal" data-target="#pageModal_1">
                                        Criar nova atividade
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info" style="font-size: 20px;">
                        <i class="ion-chatbox"
                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                        <h4 class="m-t-0" style="display: inline;">Últimas Notas</h4>
                    </div><br>
                    <ul class="nav nav-tabs" id="infosHeadingContatos">
                        <li class="active"><a data-toggle="tab" href="#notas">Notas</a></li>
                    </ul>
                    <div class="tab-content" id="infosContatos">
                        <div id="notas" class="tab-pane fade in active">
                            <i class="ti-email"
                                style="vertical-align: middle;font-size: 25px;padding-right: 5px; color:#00a8d0"></i>
                            <h3 style="display: inline;font-size: 16px;">Registre as notas trocados na linha do tempo</h3>
                            <br>
                        </div>
                        
                    </div>
                    <div class="info" style="font-size: 20px; margin-top: 20px;">
                        <i class="ion-more"
                            style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                        <h4 class="m-t-0" style="display: inline;">Linha do Tempo</h4>
                    </div><br>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#todas">Todas</a></li>
                        <li><a data-toggle="tab" href="#email">Email</a></li>
                        <li><a data-toggle="tab" href="#telegram">Telegram</a></li>
                        <li><a data-toggle="tab" href="#instagram">Instagram</a></li>
                        <li><a data-toggle="tab" href="#voIP">VoIP</a></li>
                        <li><a data-toggle="tab" href="#whats">Whatsapp</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="todas" class="tab-pane fade in active">

                        </div>
                        <div id="email" class="tab-pane fade">
                            
                        </div>
                        <div id="telegram" class="tab-pane fade" value="telegram">
                            
                        </div>
                        <div id="instagram" class="tab-pane fade" value="instagram">
                            
                        </div>
                        <div id="voIP" class="tab-pane fade" value="voIP">
                            
                        </div>                        
                        <div id="atividades" class="tab-pane fade">

                        </div>
                        <div id="whats" class="tab-pane fade">
                            
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="panel-group panel-group-joined" id="accordion-test">
                        <!-- <div class="panel panel-default" id="empresaContato">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="mdi mdi-city" style="vertical-align: middle;color:#00a8d0"></i>
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Empresa
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="panel panel-default" id="negocioContato">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="mdi mdi-briefcase" style="vertical-align: middle;color:#00a8d0"></i>
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo"
                                        class="collapsed">
                                        Negócios
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                        <br> -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="ti-clip" style="vertical-align: middle;color:#00a8d0"></i>
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseFour"
                                        class="collapsed">
                                        Arquivos
                                    </a>
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
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send
                                                Files</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- container -->

                    </div> <!-- content -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">

                    </div>
                </div>

                <div class="col-sm-3">
                </div>
            </div>
        </div>


        <!-- content -->
    </div>
    <?php
	
	require_once "resources/footer.php";
	
	?>
    </div>
    <!-- End Right content here -->

    <!-- END wrapper -->

    <!-- Modal Pop-up -->
  <!--   <div class="fixed-action-btn">
        <button class="btn-floating btn-large btn-primary" type="button" data-toggle="modal" data-target="#pageModal_1">
            <i class="ion-plus"></i>
        </button>
    </div> -->

    <!-- Modal -->

    <div class="modal right fade" id="pageModal_1" role="dialog" aria-labelledby="pageModal_1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="page-header-title" style="background-color: #A9A9A9;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 style="color: white;">Cadastro de Nova Atividade</h5>
                </div>
                <div class="modal-body">
                    <div class="panel panel-body">
                        <form id="form">
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Selecione a atividade</label>
                                    <select id="activityType" value="" class="form-control">
                                        <option id="selecioneAtividade">Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label style="display: block;">Assunto</label>
                                    <textarea id="description" class="form-control" name="description"
                                        placeholder="Insira a descrição da sua atividade" rows="3"
                                        style="border-bottom: ridge; color: #000;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px; color: #000;">
                                    <label>Data</label>
                                    <input type="date" class="form-control" id="ts">
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding-bottom: 20px;">
                            <label>Rede Social</label>
                            <select class="form-control" name="app" id="app" style="border-bottom: ridge; color: #000;">
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
                            <input id="link" type="url" class="form-control" placeholder="Link" name="link"
                                style="border-bottom: ridge; color: #000;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" style="padding-bottom: 20px;">
                            <label>Observações</label>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" style="padding-bottom: 20px;">
                            <label>Responsável</label>
                            <input id="responsible" class="form-control" name="responsible" type="text"
                                placeholder="Usuário responsável" style="border-bottom: ridge; color: #000;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="float: right;" id="enviar">Agendar</button>
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


    <script src="assets/js/app.js"></script>
    <!-- Datatables-->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>



    <script src="assets/js/app.js"></script>
    <!--Summernote js-->
    <script src="assets/plugins/summernote/summernote.min.js"></script>


    <script src="assets/js/app.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/kanban.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/list.js"></script>


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

        $(function() {
            $('#salvarTarefa').click(function () {
                alert('Tarefa Salva')
            });
        });
        $(function() {
            $('#enviar').click(function () {
                alert('ATIVIDADE SALVA!')
            });
        });
    </script>
</body>

</html>