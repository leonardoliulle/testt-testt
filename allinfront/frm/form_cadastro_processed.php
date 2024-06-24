<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Compilado | treinamentos e consultorias empresarias by HtmlCoder</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images/favicon.ico">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

<?php 
if ($_POST['cpf'] == '' || $_POST['cpf'] == null) {
	$msg = 'Cadastro Realizado com sucesso';
	echo $msg;
}


?>

<!-- STYLESHEET START -->

	<style>
	#snackbar {
	    visibility: hidden;
	    min-width: 250px;
	    margin-left: -125px;
	    background-color: #333;
	    color: #fff;
	    text-align: center;
	    border-radius: 2px;
	    padding: 16px;
	    position: fixed;
	    z-index: 1;
	    left: 50%;
	    bottom: 30px;
	    font-size: 17px;
	}

	#snackbar.show {
	    visibility: visible;
	    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
	    animation: fadein 0.5s, fadeout 0.5s 2.5s;
	}

	@-webkit-keyframes fadein {
	    from {bottom: 0; opacity: 0;} 
	    to {bottom: 30px; opacity: 1;}
	}

	@keyframes fadein {
	    from {bottom: 0; opacity: 0;}
	    to {bottom: 30px; opacity: 1;}
	}

	@-webkit-keyframes fadeout {
	    from {bottom: 30px; opacity: 1;} 
	    to {bottom: 0; opacity: 0;}
	}

	@keyframes fadeout {
	    from {bottom: 30px; opacity: 1;}
	    to {bottom: 0; opacity: 0;}
	}
	</style>
<!-- STYLESHEET END -->

<div class="container">
<h3>Solicitação de Cadastro Realizado com Sucesso</h3>
<a href='form_cadastro.php' class='btn btn-primary' align='center'>Solicitar outro cadastro</a>
</div>
	<body class="no-trans">


			<?php

				/*			nome: 12341234
				cpf: 12341234
				oab: 12341231
				email: leonardoliulle@gmail.com
				telefone: 1234*/

				if (isset($_POST['nome'])) {


				// funcao para o email;					
				$nome =  $_POST['nome'];
				$cpf = $_POST['cpf'];
				$oab = $_POST['oab'];
				$email = $_POST['email'];
				$telefone = $_POST['telefone'];

				$message = "Nome: " . $nome . "<br />";
				$message .= "cpf: " . $cpf . "<br />";
				$message .= "oab: " . $oab . "<br />";
				$message .= "email: " . $email . "<br />";
				$message .= "telefone: " . $telefone . "<br />";

				//mail('leonardoliulle@gmail.com', 'Solicitacao de Cadastro', $message);



				// funcao PARA GRAVAÇÃO NO ARQUIVO

				$message = $nome . ";";
				$message .= $cpf . ";";
				$message .= $oab . ";";
				$message .= $email . ";";
				$message .= $telefone . ";";
				$message .= PHP_EOL;

					$name = 'cadastroadv.txt';
					$text = $message;
					$file = fopen($name, 'a');
					fwrite($file, $text);
					fclose($file);

				}





			?>


		</footer>
		<!-- footer end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>

	</body>
</html>
