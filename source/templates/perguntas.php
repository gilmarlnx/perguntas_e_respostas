<?php

session_start();

require_once __DIR__ . '/../bd/BD.php';
require_once __DIR__ . '/../config/config.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "<pre>";
*/

if (empty($_SESSION['dados-equipe']['nome']) || empty($_SESSION['dados-equipe']['participantes'])) {
    header('Location: ../../index.php');
}

$con = new BD(HOST_BD, USER_BD, PASS_BD, NAME_BD);
$perguntas_respostas = $con->getPerguntas();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Perguntas - Jogo História</title>
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

    <form method="post" action="../config/processa.php">

        <?php for ($i=0; $i < 5; $i++) :?>

        <div class="form-group">
            <br>
            <label for="<?php echo 'resposta-' . $perguntas_respostas[$i]['id']; ?>">
                <strong><?php echo $perguntas_respostas[$i]['id']; ?>º)</strong>
                <?php echo $perguntas_respostas[$i]['pergunta']; ?>
            </label>
            <br><br>
            <label>A) <input type="radio" name="<?php echo 'resposta-' . $perguntas_respostas[$i]['id']; ?>" value="A">
            <?php echo $perguntas_respostas[$i]['resposta-1']; ?></label>
            <br>
            <label>B) <input type="radio" name="<?php echo 'resposta-' . $perguntas_respostas[$i]['id']; ?>" value="B">
            <?php echo $perguntas_respostas[$i]['resposta-2']; ?></label>
            <br>
            <label>C) <input type="radio" name="<?php echo 'resposta-' . $perguntas_respostas[$i]['id']; ?>" value="C">
            <?php echo $perguntas_respostas[$i]['resposta-3']; ?></label>
            <br>
            <label>D) <input type="radio" name="<?php echo 'resposta-' . $perguntas_respostas[$i]['id']; ?>" value="D" required>
            <?php echo $perguntas_respostas[$i]['resposta-4']; ?></label>
        </div>

        <?php endfor; ?>

        <br><br><br>
        <input type="submit" value="Enviar" name="botao" class="btn btn-success btn-lg btn-block">
        <button type="reset" class="btn btn-danger btn-lg btn-block">Resetar</button>
        <br><br>
    </form>

</body>
</html>