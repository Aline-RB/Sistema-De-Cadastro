<?php

include_once '../includes/header.php';
include_once '../includes/mensagem.php'; 
require_once '../actions/classes/alunos.php';
$objFcn = new Alunos();  

?>


<div class="row">
    <div class="col s12 m6 push-m3"> 
        <h3 class="light">Notas dos Alunos</h3>
        <table class="striped">
            <thead>
                <tr> <!-- titulo das colunas da tabela -->
                    <th>Codigo_Aluno:</th>
                    <th>Codigo_Disciplina:</th>
                    <th>Nota1:</th>
                    <th>Nota2:</th>
                    <th>Nota3:</th>
                    <th>Nota4:</th>
     
                </tr>
            </thead>

            <tbody> <!--  -----------------------------------MOSTRAR TODOS OS CADASTROS----------------------------------------- -->

                <?php
                foreach($objFcn->querySelectTotal() as $dados){ 
                ?>


                <tr>

                    <td><?php echo $dados['codigo_aluno']; ?></td>
                    <td><?php echo $dados['codigo_disciplina']; ?></td>
                    <td><?php echo $dados['nota1']; ?></td>
                    <td><?php echo $dados['nota2']; ?></td>
                    <td><?php echo $dados['nota3']; ?></td>
                    <td><?php echo $dados['nota4']; ?></td>

                </tr>
                
                <?php } ?>
          
          
            
            </tbody>
        </table>
        <br>
        <a href="../inicio.php" class="btn blue darken-4">Voltar</a> 
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>