<?php

session_start();
//require da conexão
require_once "../actions/classes/alunos.php";

$objFcn = new Alunos;

if(isset($_POST['btn-deletar'])):
    if($objFcn->queryDelete($_POST) == TRUE){
        $_SESSION['mensagem'] = "Deletado com sucesso"; // para usar essa session precisa do session_start(). o session mensagem foi formatado em mensagem.php
        header('Location: ../pags/alunos_edit.php'); // redirecionando a pag para voltar em index
    }else{
        $_SESSION['mensagem'] = "Erro ao Deletar";
        header('Location: ../pags/alunos_edit.php');    
}
endif;
?>