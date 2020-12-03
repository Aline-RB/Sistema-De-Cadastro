<?php
session_start();
require_once 'classes/alunos.php';
$objFcn = new Alunos();


//--------------------------ADICIONAR CLIENTE------------------------------------
    if(isset($_POST['btn-cadastrar'])){
        if($objFcn->queryInsert($_POST) ==  'certo'){
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
            header('Location: ../adicionar.php');
        }
        else if($objFcn->queryInsert($_POST) ==  'errado'){
            // var_dump($_POST);
            $_SESSION['mensagem'] = "Erro ao cadastrar, preencha todos os campos corretamente";
            header('Location: ../adicionar.php');
        }
        else if($objFcn->queryInsert($_POST) ==  'nome'){
            $_SESSION['mensagem'] = "Nome com caraceter invalido";
            header('Location: ../adicionar.php');
        }
        else if($objFcn->queryInsert($_POST) ==  'telefone'){
            $_SESSION['mensagem'] = "Telefone com caraceter invalido";
            header('Location: ../adicionar.php');
        }
    }