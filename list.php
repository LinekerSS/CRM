<?php
require_once "root.php";
require_once "resources/require.php";
require_once "resources/check_auth.php";

/* if (permission_exists('omnichannel_livechat_view'))
{
    //access granted
}
else
{
    echo "access denied";
    //exit;
} */

/**
    add multi-lingual support
*/

require_once "app_languages.php";
foreach($text as $key => $value)
{
    $text[$key] = $value[$_SESSION['domain']['language']['code']];
    $text2[$key] = $value[$_SESSION['domain']['language']['code']];
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
    <title>Page Table</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid container-fixed-lg">
                <div class="card card-transparent">
                    <div class="card-header">                        
                        <div class="clearfix"></div>
                        <div class="col-xs-12">
                            <input type="text" id="search-table" class="search-table form-control" placeholder="Search">
                        </div>
                    </div>
                    <span class="counter pull-right"></span>
                    <div class="card-block" id="resultDiv">
                        <div id="tableWithExportOptions_wrapper" class="dataTables_wrapper no-footer">
                            <div class="table-responsive">
                                <table class="table table-hover table-responsive-block data-Table no-footer" role="grid" id="result" aria-discribedby="tableWithExportOptions_info">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="control control--checkbox">
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="tableWithExportOptions" rowspan="1" colspan="1"
                                                aria-label="Nome: activate to sort column ascending" style="width: 123px;" aria-sort="descending">
                                                <?=$text2['label-name']?>
                                            </th>
                                            <th>
                                                <?=$text2['label-email']?>
                                            </th>
                                            <th>
                                                <?=$text2['label-phone']?>
                                            </th>
                                            <th>
                                                <?=$text2['label-comments']?>
                                            </th>
                                            <th class="table-options"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- End Right content here -->
    <footer>
        <?php

            require_once "resources/footer.php";

        ?>
    </footer>
    </div>
    <!-- END wrapper -->

    <!-- Modal Pop-up -->
    <div class="fixed-action-btn">
        <button class="btn-floating btn-large btn-primary" type="button" data-toggle="modal" data-target="#pageModal_1"
            id="newTutBtn">
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
                        <form id="form" name="formuser">
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;" id="name-group">
                                    <label>
                                        <?=$text2['label-name'] ?>
                                    </label>
                                    <input id="name" class="form-control" name="nome" type="text" placeholder="Seu nome"
                                        style="border-bottom: ridge; color: #000;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Tipo do Telefone</label>
                                    <select class="form-control" id="tphone" style="border-bottom: ridge; color: #000;"
                                        name="tipoDoTelefone">
                                        <option>Telefone</option>
                                        <option>Telefone 1</option>
                                        <option>Telefone 2</option>
                                        <option>Telefone 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;" id="phone-group">
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback"></div>
                                    <label>
                                        <?=$text2['label-phone']?>
                                    </label>
                                    <input name="numero" id="phone" type="tel" class="form-control" placeholder="Número"
                                        style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Tipo do email</label>
                                    <select class="form-control" id="emailType"
                                        style="border-bottom: ridge; color: #000;" name="tipoDeEmail">
                                        <option>Email</option>
                                        <option>Email 1</option>
                                        <option>Email 2</option>
                                        <option>Email 3</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding-bottom: 20px;" id="email-group">
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback"></div>
                                    <label>
                                        <?=$text2['label-email']?>
                                    </label>
                                    <input id="email" type="email" class="form-control" placeholder="E-mail"
                                        name="email" style="border-bottom: ridge; color: #000;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding-bottom: 20px;">
                                    <label>Rede Social</label>
                                    <select class="form-control" name="social" id="social"
                                        style="border-bottom: ridge; color: #000;">
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
                                    <input id="link" type="url" class="form-control" placeholder="Link" name="rede"
                                        style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label>Observações</label>
                                    <textarea id="obs" class="form-control" name="observacoes" placeholder="Observações"
                                        rows="3" style="border-bottom: ridge; color: #000;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label>
                                        <?=$text2['label-comments']?>
                                    </label>
                                    <input id="comments" class="form-control" name="responsavel" type="text"
                                        placeholder="Usuário responsável" style="border-bottom: ridge; color: #000;"
                                        required>
                                </div>
                            </div>
                            <div class="row" style="display: inline;">
                                <button class="btn btn-info float-right" type="submit" name="submit" id="submit"
                                    onclick="submitForm();">Salvar</button>
                            </div>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/themes/enhanced/assets/js/datatables.js?v=1.0.19" type="text/javascript"></script>



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
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/list.js"></script>
<!-- <script src="./js_carregaDados.js"></script>
     -->
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