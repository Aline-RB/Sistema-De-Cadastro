<?php 
require_once "classes/alunos.php";
session_start();
$objFc = new Alunos;

if(isset($_POST['btn-update'])):
    if($objFc->queryUpdate($_POST) == TRUE){
        $_SESSION['mensagem'] = "Editado com sucesso"; 
        header('Location: ../pags/alunos_edit.php'); 
    }else{
        $_SESSION['mensagem'] = "Erro ao Editar";
        header('Location: ../pags/alunos_edit.php');    
     }
endif;
?>