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

</head>


<body class="">

    <!-- Begin page -->
    <div id="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-5"><a href="#"><i class="bi bi-briefcase-fill"></i></a></div>
								<div class="col-md-2"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></div>
							</div>
							<div id="negocio">
								<h5 style="display: block; text-align: center;">Negócios</h5>
								<h6 style="display: block; text-align: center;">Data de Criação</h6>
							</div>  
						</div>
						<hr>
						<div class="panel-body" style="display: block; text-align: left;">
							<div class="row">
								<div class="col-md-1">
									<i class="bi bi-currency-dollar"></i>
								</div>
								<div class="col-md-10" id="valor">
									<label class="m-b-0">Valor</label>
									<h5 class="m-t-0">R$5555,55</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<i class="bi bi-calendar-check"></i>
								</div>
								<div class="col-md-10" id="fechamento">
									<label class="m-b-0">Previsão de Fechamento</label>
									<h5 class="m-t-0">29/08/2022</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<i class="bi bi-person"></i>
								</div>
								<div class="col-md-10" id="responsavel">
									<label class="m-b-0">Responsavel</label>
									<h5 class="m-t-0">Lineker</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="m-b-10">
                       
                    </div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group panel-group-joined" id="accordion-test">
						<div class="panel panel-default" id="empresaContato">
							<div class="panel-heading">
								<h4 class="panel-title" >
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
								<div class="panel-body">
									Anim pariatur cliche
								</div>
							</div>
						</div>
						<br>
						<div class="panel panel-default" id="negocioContato">
							<div class="panel-heading">
								<h4 class="panel-title">
									<i class="mdi mdi-briefcase"
										style="vertical-align: middle;color:#00a8d0"></i>
									<a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo"
										class="collapsed">
										Negócios
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
						<div class="panel panel-default" id="projetoContato">
							<div class="panel-heading">
								<h4 class="panel-title">
									<i class="ion-connection-bars"
										style="vertical-align: middle;color:#00a8d0"></i>
									<a data-toggle="collapse" data-parent="#accordion-test"
										href="#collapseThree" class="collapsed">
										Projetos
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
                        </div> <!-- container -->

                    </div> <!-- content -->
                </div>
            </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="panel-body user-card">
                                        <div class="media-main">
                                            <div class="info" style="font-size: 20px;">
                                                <i class="ion-ios7-chatboxes"
                                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                <h4 class="m-t-0" style="display: inline;">Campos Personalizados</h4>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <ul class="list-inline m-t-30 widget-chart text-center">
                                            <li>
                                                <i class="mdi mdi-format-align-center"
                                                    style="vertical-align: middle;font-size: 15px;padding-right: 5px; color:#00a8d0"></i>
                                                <h4 style="display: inline;"><b>Test</b></h4>
                                                <h5 class="text-muted m-b-0">ad</h5>
                                                <br>
                                            </li>
                                        </ul>
                                        <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                                    </div> <!-- panel-body -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" style="margin-top: -150px;">
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
                            <ul class="nav nav-tabs" id="infosHeadingContatos">
                                <li class="active"><a data-toggle="tab" href="#emails">E-mails</a></li>
                                <li><a data-toggle="tab" href="#whatsapp">Whatsapp</a></li>
                                <li><a data-toggle="tab" href="#ligacoes">Ligações</a></li>
                            </ul>

                            <div class="tab-content" id="infosContatos">
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
                    <h5 style="color: white;">Cadastro de Novo Contato</h5>
                </div>
                <div class="modal-body">
                    <div class="panel panel-body">
                        <form id="formularioAjax" method="post" action="">
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-bottom: 20px;">
                                    <label><?=$text2['label-name']?></label>
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
                                    <label><?=$text2['label-phone']?></label>
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
                                    <label><?=$text2['label-email']?></label>
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
                                    <label><?=$text2['label-comments']?></label>
                                    <input id="comments" class="form-control" name="comentario" type="text" placeholder="Usuário responsável" style="border-bottom: ridge; color: #000;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" style="float: right;" id="enviar">Enviar</button>                            
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
    <script src="assets/js/script.js"></script>
    <script src="assets/js/alteraFront.js"></script>
    
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