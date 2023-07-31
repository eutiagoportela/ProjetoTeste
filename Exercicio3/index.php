<?php 
	
	// including import controller file
	include_once 'controllers/Import-Controller.php';
	include_once 'controllers/Consulta-Controller.php';

	ini_set('upload_max_filesize', '50M');
	ini_set('post_max_size', '50M');
	ini_set('max_input_time', 300);
	ini_set('max_execution_time', 300);

	$ImportCtrl=new ImportController();
	$ConsultaCtrl=new ConsultaController();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entrar</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>

    <div class="container">

                    <form method="post" class="md-float-material" enctype="multipart/form-data">
                            <div class="row mt-5">
                            <div class="col-md-6 m-auto border shadow">
                                <label> Importar Csv </label>
                                    <div class="form-group">					
                                        <input type="file" name="file" class="form-control">
                                        <input id="file" type="hidden" name="MAX_FILE_SIZE" value="250000000" />
                                    </div>
                                    <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <button type="submit" name="importar" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Importar Selecionado</button>
                                                <button type="submit" name="importarMaior" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Importar Direto</button>
                                            </div>
                                        </div>
                                    
                                    <br/>
                                    <div> 
                                        <input name="filtro" value="0" <?php if(isset($_POST['filtro']) && $_POST['filtro']==0) echo 'checked' ?> type="radio"> Nenhum <br/><br/>
                                        <input name="filtro" value="1" <?php if(isset($_POST['filtro']) && $_POST['filtro']==1) echo 'checked' ?> type="radio"> 1 - Organizações com mais de 5000 funcionários ordenadas por nome.<br/><br/>
                                        <input name="filtro" value="2" <?php if(isset($_POST['filtro']) && $_POST['filtro']==2) echo 'checked' ?> type="radio"> 2 - Organizações fundadas antes dos anos 2000 com menos de 1000 funcionários ordenadas por data de fundação<br/><br/>
                                        <input name="filtro" value="3" <?php if(isset($_POST['filtro']) && $_POST['filtro']==3) echo 'checked' ?> type="radio"> 3 - Quantidade organizações e funcionários, agrupados por insdustria e pais, e ordenadas por industria.<br/>


                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <button type="submit" name="consultar" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Consultar</button>
                                            </div>
                                        </div>
                                    </div> 
                            </div>	
                            
                        </div>
                    </form>
        </div>             
        <div class="container-sm">
                <?php

                if (isset($_POST['importar']) || isset($_POST['importarMaior']))
                    $ImportCtrl->index(); 	
                else
                    if(isset($_POST['filtro']) && $_POST['filtro']>0)
                    $ConsultaCtrl->index(); 						
                ?>    
        </div>
  
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
