<?php 

echo "<br>Obrigado pela tentativa de contato, mas suas informações NÃO foram enviadas.<br><br><br>";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$msn = "Nome: " . $nome . "|";
$msn .= "Email: " . $email . "|";
$msn .= "telefone: " . $telefone . "|";
$msn .= "mensagem: " . $mensagem . "|";

echo $msn;
 ?>