<?php
include_once '../includes/header.php';
include_once '../includes/mensagem.php'; 
require_once '../actions/classes/alunos.php';
$objFcn = new Alunos();
?>
<div class="row">
    <div class="col s6 m4 push-m4"> <!-- formatação do titulo das colunas -->
        <h3 class="light">Selecione o Aluno</h3>
        <table class="striped">
            <thead>
                <tr> <!-- titulo das colunas da tabela -->
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

                    <td><a href="notas.php?id=<?php echo $dados['id']; //botão de editar?>" class="btn-floating orange "><i class="material-icons"><!-- como esta em um loop a parte do php diz: va para a parte editar onde o id= id do banco de dados, pois esta fazendo uma consulta ao banco de dados tb -->
                    <!-- cada registro vai ter um link apontado para seu id por estar dentro do while -->
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
        <a href="../inicio.php" class="btn blue darken-4">Voltar</a> <!-- vai ir pra outro arquivo para pegar a formatação do botão da outra pag-->
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>