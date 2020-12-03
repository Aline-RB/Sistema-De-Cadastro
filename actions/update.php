<?php 
require_once "classes/alunos.php";
session_start();
$objFc = new Alunos;

if(isset($_POST['btn-update'])):
    if($objFc->queryUpdate($_POST) == TRUE){
        $_SESSION['mensagem'] = "Editado com sucesso"; // para usar essa session precisa do session_start(). o session mensagem foi formatado em mensagem.php
        header('Location: ../pags/alunos_edit.php'); // redirecionando a pag para voltar em index
    }else{
        $_SESSION['mensagem'] = "Erro ao Editar";
        header('Location: ../pags/alunos_edit.php');    
     }
endif;
?>