<?php

session_start();

require_once __DIR__ . '/../bd/BD.php';
require_once __DIR__ . '/../config/config.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "<pre>";
*/

if (empty($_SESSION['dados-equipe']['nome']) || empty($_SESSION['dados-equipe']['participantes']) || empty($_SESSION['dados-equipe']['respostas'])) {
    header('Location: ../../index.php');
}

$nome = $_SESSION['dados-equipe']['nome'];
$participantes = $_SESSION['dados-equipe']['participantes'];
$resp1 = $_SESSION['dados-equipe']['respostas']["1"];
$resp2 = $_SESSION['dados-equipe']['respostas']["2"];
$resp3 = $_SESSION['dados-equipe']['respostas']["3"];
$resp4 = $_SESSION['dados-equipe']['respostas']["4"];
$resp5 = $_SESSION['dados-equipe']['respostas']["5"];

if (!empty($_SESSION['dados-equipe'])) {
    $con = new BD(HOST_BD, USER_BD, PASS_BD, NAME_BD);
    $con->setDadosEquipe($nome, $participantes, $resp1, $resp2, $resp3, $resp4, $resp5);
} else {
    header('Location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Resultado - Jogo História</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS and Style User -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
</head>
<body>
    <p><strong>Nome: </strong><?php echo $_SESSION['dados-equipe']['nome']?></p>
    <p><strong>Equipe: </strong><?php echo $_SESSION['dados-equipe']['participantes']?></p>

    <p><strong>Suas Respostas: </strong>
    <?php 
    echo "<pre>";
    print_r([
        "1º" => "{$_SESSION['dados-equipe']['respostas']['1']}",
        "2º" => "{$_SESSION['dados-equipe']['respostas']['2']}",
        "3º" => "{$_SESSION['dados-equipe']['respostas']['3']}",
        "4º" => "{$_SESSION['dados-equipe']['respostas']['4']}",
        "5º" => "{$_SESSION['dados-equipe']['respostas']['5']}"
    ]);
    echo "</pre>";
    ?>
    </p>

</body>
</html>

<?php

session_destroy();

?>