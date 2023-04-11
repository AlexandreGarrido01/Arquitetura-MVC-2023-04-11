<?php

session_start();

$cpfInvalido = false;

if (isset($_SESSION['cpfInvalido'])) {
    $cpfInvalido = true;
    unset($_SESSION['cpfInvalido']);
    session_destroy();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>Document</title>
</head>

<body>
    <div class="alinhamento-forms">
        <form method="POST" action="./resultado.php" class="formulario">
            <h1 class="titulo">CALCULAR IMPOSTO</h1>
            <input type="text" class="input nome" name="nome" placeholder="Digite seu Nome" required />
            <?php 
                if($cpfInvalido){
                    echo("
                        <p style='color:#DC143C; font-weight:bold; text-align:left; text-shadow: 1px 1px black;'>
                           CPF INVALIDO     
                        </p>
                    ");
                }
            ?>
            <input type="text" class="input cpf" name="cpf" placeholder="Digite seu CPF" title="Somente numeros" minlength="11" required />
            <input type="text" class="input rendimento" name="rendimento" placeholder="Digite seu Rendimento Anual" pattern="[0-9]+" title=" Somente numeros" required />
            <input type="submit" class="button-forms" value="Calcular" />
        </form>
    </div>

</body>

</html>