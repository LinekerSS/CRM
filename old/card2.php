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
                                    <div class="panel-cards" style="background-color: #DCDCDC;">
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
                                    <div class="panel-cards" style="background-color: #DCDCDC;">
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
                                    <div class="panel-cards" style="background-color: #DCDCDC;">
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
                                    <div class="panel-cards" style="background-color: #DCDCDC; ">
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
                    <h5 style="color: white;">Novas Tarefas</h5>
                </div>
                <div class="modal-body">
                    <div class="panel panel-body">
    <!-- Start Card Body -->
    <div class="card-body">
      <!-- Start Form -->
      <form id="bookingForm" action="#" method="" class="needs-validation" novalidate autocomplete="off">
        <!-- Start Input Name -->
        <div class="form-group">
          <label for="inputName">Nome</label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Seu Nome" required />
        </div>
        <!-- End Input Name -->

        <!-- Start Input Email -->
        <div class="form-group">
          <label for="inputEmail">Seu E-mail</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
        </div>
        <!-- End Input Email -->

        <!-- Start Input Telephone -->
        <div class="form-group">
          <label for="inputPhone">Seu Telefone</label>
          <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="(xx) xxxx-xxxx" pattern="\d{3}\d{3}\d{4}" required />
        </div>
        <!-- End Input Telephone -->
  <!-- Start Input Negocio -->
  <div class="form-group">
          <label for="inputNegocio">Seu Negócio</label>
          <input type="text" class="form-control" id="inputName" name="negocio" placeholder="Padaria" required />
        </div>
        <!-- End Input Negocio -->
        <!-- Start Input Date , Start Time and End Time -->
        <div class="form-row">
          <!-- Start Input Date -->
          <div class="form-group col-md-4">
            <label for="inputDate">Data Prevista</label>
            <input type="date" class="form-control" id="inputDate" name="date" required />
          </div>
          <!-- End Input Date -->

          <!-- Start Input Start Time -->
          <div class="form-group col-md-4">
            <label>Horário de Funcionamento</label>
            <div class="d-flex flex-row justify-content-between align-items-center">
              <select class="form-control mr-1" id="inputStartTimeHour" name="startHour" required>
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
              </select>
              <div class="pl-1 pr-2">:</div>
              <select class="form-control" id="inputStartTimeMinute" name="startMinute" required>
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
                
              </select>
            </div>
          </div>
          <!-- Start Check Snack Type -->
          <div class="form-group col-md-4">
           <label>Status do Negócio</label>
              <select class="form-control mr-1" id="inputStartTimeHour" name="startHour" required>
               <option value="" disabled selected>Status</option>
                <option value="novo">Novo</option>
                <option value="qualificacao">Qualificação</option>
                <option value="proposta">Proposta</option>
                <option value="orcamento">Orçamento</option>
              </select>
            </div>
          </div>
        </div>
        <!-- End Check Snack Type -->
          <!-- End Input Start Time -->
        </div>
        <!-- End Input Date , Start Time and End Time -->

        <!-- Start Input Remark -->
        <div class="form-group">
          <label for="textAreaRemark">Anotações</label>
          <textarea class="form-control" name="remark" id="textAreaRemark" rows="2" placeholder="Escreva uma breve anotação..."></textarea>
        </div>
        <!-- End Input Remark -->

        <!-- Start Submit Button -->
        <button class="btn btn-primary btn-block col-lg-2" type="submit" id='teste2'>Enviar</button>
        <!-- End Submit Button -->
      </form>
      <!-- End Form -->
    </div>
    <!-- End Card Body -->
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
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 

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

       /* $(function () {
            $("#submit").click(function() {
                $(".redirect").text("Redirect...")
                let delay = 500;
                let url = "contacts2.php";
                setTimeout(function() {
                    location = url;
                }, 500)
            })
        }) */


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