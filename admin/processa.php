<?php

require_once __DIR__ . '/../source/bd/BD.php';
include __DIR__ . '/../source/config/config.php';

$con = new BD(HOST_BD, USER_BD, PASS_BD, NAME_BD);

if ((isset($_POST['email']) && isset($_POST['senha'])) && (!empty($_POST['email']) && !empty($_POST['senha']))) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
} else {
    header('Location: index.php');
}

$dadosAdmin = $con->getDadosAdmin();

if ($dadosAdmin[0]['email'] == $email && $dadosAdmin[0]['senha'] == md5($senha)) {
    include 'painel.php';
} else {
    header('Location: index.php');
}

/*
echo "<pre>";
print_r($con->getDadosAdmin());
echo "</pre>";
*/
