<?php

session_start();

echo "teste";

// Verifica se tem algum valor no array que está vazio
function is_empty ($array) {
    foreach ($array as $key => $value) {
        if ($value == null) {return true; }
    }
    return false;
}

// Guarda na sessão se tiver apertado o botão... [PERGUNTAS.PHP]
if (!empty($_POST['botao']) && $_POST['botao'] == 'Enviar') {
    for ($i=1; $i <= 5; $i++) { 
        $_SESSION['dados-equipe']['respostas']["{$i}"] = $_POST["resposta-{$i}"];
    }
}

// Guarda na sessão o nome e os participantes... [CADASTRO.PHP] 
if (isset($_POST['nome-equipe']) && isset($_POST['participantes'])) {
    $_SESSION['dados-equipe']['nome'] = $_POST['nome-equipe'];
    $_SESSION['dados-equipe']['participantes'] = $_POST['participantes'];

    //include __DIR__ . '../templates/perguntas.php';
    header('Location: ../templates/perguntas.php');
} elseif (!is_empty($_SESSION['dados-equipe']['respostas'])) {
    header('Location: ../templates/resultados.php');
}

echo "<script>alert({$_SESSION['dados-equipe']});</script>";

