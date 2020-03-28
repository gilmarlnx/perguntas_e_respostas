<?php

if ((isset($_POST['email']) && isset($_POST['senha'])) && (!empty($_POST['email']) && !empty($_POST['senha']))) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
} else {
    header('Location: index.php');
}

$dados = $con->getDadosEquipe();
is_array($dados) ? $contador = count($dados) : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel - Resultados</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and Style User -->
	<link rel="stylesheet" type="text/css" href="../source/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../source/bootstrap/css/style.css">
</head>
<body id="table">
    <p class="h1" id="title">RESULTADOS P/ EQUIPE</p>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Resposta 1</th>
            <th scope="col">Resposta 2</th>
            <th scope="col">Resposta 3</th>
            <th scope="col">Resposta 4</th>
            <th scope="col">Resposta 5</th>
            <th scope="col">Acertos</th>
        </tr>
        </thead>
        <tbody>

        <?php for ($i=0; $i < $contador; $i++) :?>
        
        <tr>
            <th scope="row"><?php echo $dados[$i]['nome'] ?></th>
            <td><?php echo $dados[$i]['participantes'] ?></td>
            <td><?php echo $dados[$i]['resposta-1'] ?></td>
            <td><?php echo $dados[$i]['resposta-2'] ?></td>
            <td><?php echo $dados[$i]['resposta-3'] ?></td>
            <td><?php echo $dados[$i]['resposta-4'] ?></td>
            <td><?php echo $dados[$i]['resposta-5'] ?></td>
            <td><?php echo $dados[$i]['acertos'] ?></td>
        </tr>

        <?php endfor; ?>

        </tbody>
    </table>
</body>
</html>