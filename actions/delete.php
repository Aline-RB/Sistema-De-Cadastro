<?php

session_start();
//require da conexão
require_once "../actions/classes/alunos.php";

$objFcn = new Alunos;

if(isset($_POST['btn-deletar'])):
    if($objFcn->queryDelete($_POST) == TRUE){
        $_SESSION['mensagem'] = "Deletado com sucesso"; 
        header('Location: ../pags/alunos_edit.php'); 
    }else{
        $_SESSION['mensagem'] = "Erro ao Deletar";
        header('Location: ../pags/alunos_edit.php');    
}
endif;
?>