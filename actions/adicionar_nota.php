<?php
session_start();
require_once 'classes/alunos.php';
$objFcn = new Alunos();


//--------------------------ADICIONAR CLIENTE------------------------------------
    if(isset($_POST['btn-nota'])){
        if($objFcn->queryNota($_POST) == "ok"){
            $_SESSION['mensagem'] = "Nota Adicionada com sucesso"; // para usar essa session precisa do session_start(). o session mensagem foi formatado em mensagem.php
            header('Location: ../pags/aluno_notas.php');
        }
        else{
            $_SESSION['mensagem'] = "Erro ao inserir nota"; // para usar essa session precisa do session_start(). o session mensagem foi formatado em mensagem.php
            header('Location: ../pags/aluno_notas.php');
        }
        //print_r($_POST);
    }
?>