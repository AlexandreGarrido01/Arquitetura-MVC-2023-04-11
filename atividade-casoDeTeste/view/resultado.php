<?php

require_once dirname(__FILE__) . '\..\model\User.php';
require_once dirname(__FILE__) . '\..\controller\validacao.php';

session_start();

$cpf = $_POST['cpf'];
if (!Validacao::validarCPF($cpf)) {
    $_SESSION['cpfInvalido'] = uniqid();
    header("Location:./index.php");
}


$nome = $_POST['nome'];
$rendimento = $_POST['rendimento'];

$user = new User();
$user->setNome($nome);
$user->setCpf($cpf);
$user->setRendimento($rendimento);
$user->calcularAliquota();
$user->calcularImposto();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/resultado.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="resultado">
            <h1 style="color: white;">Resultado</h1>
            <div class="aliquota">
                <p>Aliquota: <?php echo $user->aliquota; ?>% </p>
            </div>
            <div class="imposto">
                <p>Imposto a pagar: R$ <?php echo number_format($user->imposto, 2, ',', '.'); ?></p>
            </div>
        </div>
    </div>


</body>

</html>