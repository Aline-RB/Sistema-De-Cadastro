<?php
session_start();
require_once 'classes/alunos.php';
$objFcn = new Alunos();


//--------------------------ADICIONAR CLIENTE------------------------------------
    if(isset($_POST['btn-nota'])){
        if($objFcn->queryNota($_POST) == "ok"){
            $_SESSION['mensagem'] = "Nota Adicionada com sucesso"; 
            header('Location: ../pags/aluno_notas.php');
        }
        else{
            $_SESSION['mensagem'] = "Erro ao inserir nota"; 
            header('Location: ../pags/aluno_notas.php');
        }
        
    }
?>