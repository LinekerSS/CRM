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
        <title>Page Sale</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/main.css" rel="stylesheet" type="text/css">
        <link href="assets/css/styleButton.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/index.css">
        
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">    

            <!-- Start right Content here -->

            <div class="content-wrapper">
                <!-- Start content -->
                    <div class="container">
                        <div class="row" id="kanban-board">
                            <div class="col-sm-3 sortable-wrapper">
                                <div class="panel panel-warning kanban-col">
                                    <div class="panel-heading">
                                        <i class="bi bi-briefcase-fill m-r-15"></i>
                                        Novo
                                    </div>
                                    <div class="panel-body" style="background-color: #f5f5f5;">
                                        <div id="planned" class="kanban-centered sortable">
                                            <span>No items to display</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 sortable-wrapper">
                                <div class="panel panel-warning kanban-col">
                                    <div class="panel-heading">
                                    <i class="bi bi-briefcase-fill m-r-15"></i>
                                        Qualificação
                                    </div>
                                    <div class="panel-body" style="background-color: #f5f5f5;">
                                        <div id="started" class="kanban-centered sortable">
                                            <span>No items to display</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 sortable-wrapper">
                                <div class="panel panel-warning kanban-col">
                                    <div class="panel-heading">
                                    <i class="bi bi-briefcase-fill m-r-15"></i>
                                        Proposta
                                    </div>
                                    <div class="panel-body" style="background-color: #f5f5f5;">
                                        <div id="task3" class="kanban-centered sortable">
                                            <span>No items to display</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 sortable-wrapper">
                                <div class="panel panel-warning kanban-col">
                                    <div class="panel-heading">
                                    <i class="bi bi-briefcase-fill m-r-15"></i>
                                        Fechamento
                                    </div>
                                    <div class="panel-body" style="background-color: #f5f5f5;">
                                        <div id="task4" class="kanban-centered sortable">
                                            <span>No items to display</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div> <!-- end col -->

            <footer>
                <?php
                    require_once "resources/footer.php";
                ?>
            </footer>
        </div>
        <!-- end row -->

         <!-- Modal Pop-up -->
    <div class="fixed-action-btn">
        <button class="btn-floating btn-large btn-primary" type="button" data-toggle="modal" data-target="#taskmodal">
            <i class="ion-plus"></i>
        </button>     
    </div>

    <!-- Modal -->

    <div class="modal right fade" id="taskmodal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="page-header-title" style="background-color: #A9A9A9;">                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 style="color: white;">Cadastro de Novo Negócio</h5>
                </div>
                <div class="modal-body">
                    <form id="add-task" action="." method="post">
                        <input type="hidden" name="idData" id="idData">
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px;" id="name-group">
                                <label><?=$text2['label-name']?></label>
                                <input id="name" class="form-control" name="nome" type="text" placeholder="Seu nome" style="border-bottom: ridge; color: #000;" required>
                                <i class="bi bi-check-circle-fill img-success" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>
                                <i class="bi bi-x-circle-fill img-error" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                <label>Negócio</label>
                        <input id="title" class="form-control" name="title" type="text" style="border-bottom: ridge; color: #000;" placeholder="Nome do Negócio" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px; color: #000;">
                                <label>Data Prevista</label>
                                <input type="date" class="form-control" id="newDate" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px; color: #000;">
                                <label><?=$text2['label-phone']?></label>
                                <input name="phone" id="phone" type="tel" class="form-control" placeholder="Número" style="border-bottom: ridge; color: #000;" required>
                                <i class="bi bi-check-circle-fill img-success" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>
                                <i class="bi bi-x-circle-fill img-error" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group col-md-12" style="padding-bottom: 20px; color: #000;">
                                <label><?=$text2['label-email']?></label>
                                <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" style="border-bottom: ridge; color: #000;" required>
                                <i class="bi bi-check-circle-fill img-success" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>
                                <i class="bi bi-x-circle-fill img-error" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                <label><?=$text2['label-comments']?></label>
                                <input type="text" class="form-control" id="comments" name="responsavel" style="border-bottom: ridge; color: #000;" required>
                                <i class="bi bi-check-circle-fill img-success" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>
                                <i class="bi bi-x-circle-fill img-error" style="position: relative; visibility: hidden; top: 45px; right: 10px;"></i>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                <label><?=$text2['label-status']?></label>
                                <select class="form-control" id="newStatus" required>
                                    <option value="">Selecione os status</option>
                                    <option value="planned">Novo</option>
                                    <option value="started">Qualificação</option>
                                    <option value="task3">Proposta</option>
                                    <option value="task4">Fechamento</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="padding-bottom: 20px">
                                <label><?=$text2['label-card']?></label>
                                <select class="form-control" value="" id="cards">

                                </select>
                            </div>
                        </div>
                            <button type="submit" id="submitbtn" class="btn btn-primary mt-3" style="float: right;" data-dismiss="modal" onclick="validateInputs(); createTask();">Salvar</button>                        
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>


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
    <script src="assets/js/kanban.js"></script>
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
            var boardWidth = $('#kanban-board').width();
            var $columns = $('.sortable-wrapper');
            var columnCount = $columns.length;
            var columnMargin = 10;
            $columns.width(Math.floor((boardWidth - (columnMargin*(columnCount + 1))) / columnCount));
            $( ".sortable" ).sortable({
                revert: true,
                placeholder: 'drag-place-holder',
                forcePlaceholderSize: true, 
                connectWith: ".sortable",
                helper:function(event, element){return $(element).clone().addClass('dragging');},
                start: function (e, ui) {ui.item.show().addClass('ghost'); console.log('start');},
                stop: function (e, ui) {editColumn(e, ui)},
                cursor:'move'
            })
            .disableSelection()
        });
        


        function editColumn(e, ui) {
            console.log('entrei');
            ui.item.show().removeClass('ghost');
            console.log(e);
            console.log(ui);
            const id = ui.item[0].id;
            const columnId = ui.item[0].parentElement.id;

                var myHeaders = new Headers();
            myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
            "_id": id,
            "column": columnId
            });

            var requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
            };

            fetch("https://chat2.myuc2b.com:1340/api/v1/card/column/", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
        }
    </script>
    
</body>
</html>