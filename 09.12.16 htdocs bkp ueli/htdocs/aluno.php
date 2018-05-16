<?php include'bd.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Estudantes - Requerimentos SENAI</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8"/>
               
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="bootstrap-3.3.7-dist/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="aluno.php" class="">Requerimentos SENAI</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                        <div class="profile">
                            <div class="profile-data">
                                <div class="profile-data-name"><?php
                                $cn = mysqli_connect('127.0.0.1','root','','rs_requerimentos');                                                
                                $sql = mysql_query("SELECT * FROM aluno where id like 'name'") or die(mysql_error());
                                while($res = mysql_fetch_array($sql)){
                                    $nome = $res['nome'];
                                    echo $nome;
                                }
                                ?></div>
                                <!--<div class="profile-data-title">Estudantes</div>
                                <div class="profile-data-title">jonhdoe@escolasenai.br</div>-->
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    <li class="xn-title">Navegação</li>
                    <li class="active">
                        <a href="#"><span class="fa fa-desktop">fdsfdsfdsf</span> <span class="xn-text">Requerimentos</span></a>                        
                    </li>                    
  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Busca..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Estudantes</a></li>                    
                    <li class="active">Requerimentos</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Requerimentos</h3>
                                        
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="?exibir=1" class="adicionarLanche" title="Escolher Lanche"><span class="fa fa-plus"></span></a></li>

                                        <li><a href="./aluno.php" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                                                               
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Data</th>
                                                    <th width="20%">Tipo</th>
                                                    <th width="50%">Descrição</th>
                                                    
                                                    <th width="10%">Status</th>
<!--                                                     <th width="10%" class="cengtralizado">Ação</th> -->
                                                </tr>
                                            </thead>
                                            <!-- SELECT PARA PREENCHER A TABELA COM OS LANCHES CADASTRADOS -->
                                            <?php
                                                $sql = mysql_query("SELECT * FROM requerimentos ORDER BY id DESC") or die(mysql_error());
                                                while($res = mysql_fetch_array($sql)){
                                                    $id = $res['id'];
                                                    $tipo = $res['tipo'];
                                                    $data = $res['data'];
                                                    $status = $res['status'];
                                                    $descricao = $res['descricao'];

                                                    switch ($status) {
                                                        case 0:
                                                            $s = "AGUARDANDO ANALISE";
                                                            break;
                                                        case 1:
                                                            $s = "ENCAMINHADO AO DIRETOR ESCOLAR";
                                                            break;
                                                        case 2:
                                                            $s = "DEFERIDO";
                                                            break;
                                                        case 3:
                                                            $s = "INDEFERIDO";
                                                            break;
                                                        case 4:
                                                            $s = "NECESSARIO VISITA PRESENCIAL";
                                                            break;
                                                        case 5:
                                                            $s = "DOCUMENTAÇÃO INCOMPLETA";
                                                            break;
                                                        case 6:
                                                            $s = "REQUERIMENTO DUPLICADO";
                                                            break;
                                                        
                                                        default:
                                                            $s = "";
                                                            break;
                                                    }


                                            ?>
                                            <tbody>
                                                <tr>    
                                                    <td><?php echo $data;?></td>                                               
                                                    <td><?php echo $tipo;?></td>
                                                    <td><?php echo $descricao;?></td> 
                                                    <td><?php echo $s;?></td>
                                                    
                                            <!--         <td class="centralizado">
                                                        <ul class="panel-controls" style="margin-top: 2px;">
                                                            <li><a href="enviar.php?id=<?php echo $id;?>" class="excluir" title="Excluir Lanche do Dia" name="del"><span span class="fa fa-eraser"></span></a></li>
                                                        </ul>    
                                                    </td> -->
                                                </tr> 
                                                <?php
                                                    }
                                                ?>                                                                                         
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>            

                   

                    <?php

                    
                        if(!isset($_GET['exibir'])){
                            echo "";
                        }else{

                    ?>
<div class="row ">
                        <div class="col-md-8">
                            
                            <form enctype="multipart/form-data" class="form-horizontal" action="enviar.php" method="POST">
                            <div class="panel panel-default formularioLanche">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Registro de Requerimento</strong></h3>
                                    <ul class="panel-controls">
                                        
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <p>Faça seu requerimento!</p>
                                </div>


                                
                                <div class="panel-body">                                                                        
                                    
                               <!--      <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Data:</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="date" class="form-control datepicker" name="data">                                            
                                            </div>
                                            <span class="help-block">Data para do Requerimento</span>
                                        </div>
                                    </div> -->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tipo:</label>
                                        <div class="col-md-6 col-xs-12" id="tipo">                                                                                            
                                            <select class="form-control select" name="tipo">
                                                <option value="">Selecione</option>
                                                <option value="Abrir Processo">Abrir Processo</option>
                                                <option value="ass. Contato/ConvÊnio/Relatorio de Estágio">ass. Contato/Convênio/Relatorio de Estágio</option>
                                                <option value="Atendimento Domiciliar (anexo de atestado)"> Atendimento Domiciliar (anexo de atestado)</option>
                                                <option value="Entrega de Atestado (anexo de atestado)"> Entrega de Atestado (anexo de atestado)
                                                </option>
                                                <option value="Entrega de Atestado (anexo de atestado)"> 2° ViaCartão de Acesso
                                                </option>
                                                <option value="2° Via Certificados"> 2° Via Certificado
                                                </option>
                                                <option value="2° Via histórico escolar"> 2° Via histórico escolar
                                                </option>
                                                <option value="2° Via de identificação Estudantil"> 2° Via de identificação Estudantil
                                                </option>
                                                <option value="Transferência Expedida"> Transferência Expedida
                                                </option>
                                                <option value="Transferência Recebida"> Transferência Recebida
                                                </option>
                                                <option value="Transferência SENAI para SENAI/ES"> Transferência SENAI para SENAI/ES
                                                </option>
                                                <option value="Aproveitamento de Estudos"> Aproveitamento de Estudos
                                                </option>
                                                <option value="Histórico Parcial"> Histórico Parcial
                                                </option>
                                                <option value="itinerário Formativa"> itinerário Formativa
                                                </option>
                                                <option value="Programa de Unidade Curricula"> Programa de Unidade Curricular
                                                </option>
                                                <option value="PEAD(Prova de Extraordinário Aproveitamento Discente"> PEAD(Prova de Extraordinário Aproveitamento Discente)
                                                </option>
                                                <option value="Revisão de Prova final (Justificar)"> Revisão de Prova final (Justificar)
                                                </option>
                                                <option value="Troca de turma/turno"> Troca de turma/turno
                                                </option>
                                                <option value="Aproveitamento de experiência Profissional"> Aproveitamento de experiência Profissional
                                                </option>
                                            </select>
                                            <span class="help-block">Selecione o tipo de Requerimento</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Descrição:</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea class="form-control" rows="3" name="descricao"></textarea>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Anexar:</label>
                                        <div class="col-md-6 col-xs-12">
                                            <!-- <input type="file" id="exampleInputFile" name="anexo"> -->
                                            <p align="center"><br />Imagem principal</p>
                                            <div align="center"><input type="file" name="thumb" />
                                            </div>

                                            
                                            
                                            <p align="center"><br />Outras imagens (limite: 10 imagens)</p>
                                            <div align="center">
                                            <input type="file" name="imagem[]" class="multi" maxlength="20" accept="jpeg|jpg|png" />
                                            </div>      

                                        </div>
                                    </div>


                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Limpar</button>                                    
                                    <input class="btn btn-primary pull-right" type="submit" value="Registrar" name="up"></input>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>  

                        <?php
                      
                    }

                    ?>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><strong>Sair</strong> ?</div>
                    <div class="mb-content">
                        <p>Deseja realmente sair do sistema?</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="index.html" class="btn btn-success btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>

        <script type="text/javascript" src="js/lanchesenai.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>