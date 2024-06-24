<style type="text/css">
	.container {
		margin-top: 50px;  
		margin-left: 50px;
		margin-right: 50px;
		font-size: 16px;
	}
	.alert {
		background: #9E0005;
		color: #E0DCDC;
	}
	.alert-success {
	    background-color: #d1ecf1; /* Light blue background */
	    color: #0c5460; /* Dark blue text */
	    padding: 15px 20px; /* Padding for the alert box */
	    border-radius: 8px; /* Smooth corners */
	    border: 1px solid #bee5eb; /* Border with a slightly darker blue */
	    margin: 20px 0; /* Margin to space out from other elements */
	    font-family: Arial, sans-serif; /* Font family for text */
	    font-size: 16px; /* Font size for text */
	    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
	    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Smooth transition */
	}

	/* CSS for .mybutton */
	.mybutton {
	    background-color: #007BFF; /* Blue background color */
	    color: white; /* White text color */
	    padding: 10px 20px; /* Padding for the button */
	    border: none; /* Remove default border */
	    border-radius: 8px; /* Smooth corners */
	    font-family: Arial, sans-serif; /* Font family for the button text */
	    font-size: 16px; /* Font size for the button text */
	    cursor: pointer; /* Pointer cursor on hover */
	    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
	    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
	    text-decoration: none; /* Remove underline for links styled as buttons */
	    display: inline-block; /* Make sure the button behaves as an inline-block */
	}

	.mybutton:hover {
	    background-color: #0056b3; /* Darker blue on hover */
	    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Deeper shadow on hover */
	}

	.mybutton:active {
	    background-color: #004494; /* Even darker blue on click */
	    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Reduced shadow on click */
	}

	p {
		margin-top: 20px;
		margin-bottom: 20px;
		margin-left: 10px;
		margin-right: 10px;
		font-size: 18px;
	}
</style>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $to = 'leonardoliulle@gmail.com'; // Replace with the recipient's email address
    $subject = 'Message from TechDataInsights';
    
    $message = "Name: $nome\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $telefone\n";
    $message .= "Message:\n$mensagem\n";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<div class='container'>
	
			<div class='alert-success'>
				<p><br>Obrigado pelo envio {$nome}, em breve entraremos em contato!</p>
				<a class='mybutton' href='https://techdatainsights.cloud' title=''>Voltar</a>

			</div>";
    } else {
	    echo "<div class='container'>
		
			<div class='alert'>
				<p><br>Obrigado pela tentativa de contato, mas suas informações NÃO foram enviadas.</p>
				<p>Por favor, passar e-mail para leonardoliulle@gmail.com copiando e colando as informações abaixo já digitadas por você</p>
				<p>Este processo será automatizado em breve<br></p>
			</div>";
    }
} else {
    echo "<div class='container'>
	
		<div class='alert'>
			<p><br>Obrigado pela tentativa de contato, mas suas informações NÃO foram enviadas.</p>
			<p>Por favor, passar e-mail para leonardoliulle@gmail.com copiando e colando as informações abaixo já digitadas por você</p>
			<p>Este processo será automatizado em breve<br></p>
		</div>";
}
?>



<?php 

// echo "sua mensagem está abaixo para copiar e colar no e-mail: <br><br>";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$msn = "Nome: " . $nome . "<br>";
$msn .= "Email: " . $email . "<br>";
$msn .= "telefone: " . $telefone . "<br>";
$msn .= "mensagem: " . $mensagem . "<br>";

// echo $msn;


 ?>
</div>