<?php
include_once '../includes/header.php';
include_once '../includes/mensagem.php'; 
require_once '../actions/classes/alunos.php';
$objFcn = new Alunos();
?>
<div class="row">
    <div class="col s12 m6 push-m3"> <!-- formatação do titulo das colunas -->
        <h3 class="light">Selecione o Aluno</h3>
        <table class="striped">
            <thead>
                <tr> <!-- titulo das colunas da tabela -->
                    <th>Nome:</th>
                    <th>Telefone:</th>
                </tr>
            </thead>

            <tbody> <!--  -----------------------------------MOSTRAR TODOS OS CADASTROS----------------------------------------- -->

                <?php
                foreach($objFcn->querySelect() as $dados){
                ?>


                <tr>
                    <td><?php echo $dados['nome']; ?></td><!-- resultado do while, ele vai dar um echo em todos os dados das colunas em <td> -->
                    <td><?php echo $dados['telefone']; ?></td>
                    

                    <!-- ---------------------------BOTÕES DE ÍCONES----------------------------------->


                    <td><a href="../pags/edit.php?id=<?php echo $dados['id']; //botão de editar?>" class="btn-floating light-blue darken-4"><i class="material-icons"><!-- como esta em um loop a parte do php diz: va para a parte editar onde o id= id do banco de dados, pois esta fazendo uma consulta ao banco de dados tb -->
                    <!-- cada registro vai ter um link apontado para seu id por estar dentro do foreach-->
                    reply</i></a></td>
                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons "><!-- o modal é para aparecer uma janelinha de opção -->
                    delete_forever</i></a></td> <!-- modal de cada id -> por causa do foreach tb -->


                    <!-- ----------------------------- BOTÃO DE DELETAR--------------------------------->


                    <div id="modal<?php echo $dados['id']; ?>" class="modal"> <!-- formatação da janela modal para cada id -->
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse aluno?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="../actions/delete.php" method="POST"> <!-- referencia ao arquivo de delete q contem os comandos para deletar recebendo o metodo post para pegar os dados, as ações dos botões desse formulario estão no arquivo deletar -->
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> <!-- hidden para esconder o id -->
                            <button type="submit" name="btn-deletar" class="btn red">Sim</button>
                            <a href="#!" class="modal-action modal-close waves-effect
                            waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                    </div>


                </tr>
                
                <?php } ?>
            
          
            
            </tbody>
        </table>
        <br>
        <a href="../inicio.php" class="btn grey darken-4">Voltar</a> <!-- vai ir pra outro arquivo para pegar a formatação do botão da outra pag-->
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>