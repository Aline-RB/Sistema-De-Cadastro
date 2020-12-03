<?php
include_once '../includes/header.php';
include_once '../includes/mensagem.php'; 
require_once '../actions/classes/alunos.php';
$objFcn = new Alunos();
?>
<div class="row">
    <div class="col s6 m4 push-m4"> 
        <h3 class="light">Selecione o Aluno</h3>
        <table class="striped">
            <thead>
                <tr> 
                    <th>Nome:</th>
     
                </tr>
            </thead>

            <tbody> <!--  -----------------------------------MOSTRAR TODOS OS CADASTROS----------------------------------------- -->

                <?php
                foreach($objFcn->querySelect() as $dados){
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>

                    <!-- ---------------------------BOTÕES----------------------------------->

                    <td><a href="notas.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange "><i class="material-icons">
                    edit</i></a></td>
                </tr>
                <?php } ?>

                <tr>
                    <td>-</td>
                    <td>-</td>

                </tr>
            </tbody>
        </table>
        <br>
        <a href="../inicio.php" class="btn blue darken-4">Voltar</a> 
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>