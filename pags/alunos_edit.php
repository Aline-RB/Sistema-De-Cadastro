<?php
include_once '../includes/header.php';
include_once '../includes/mensagem.php'; 
require_once '../actions/classes/alunos.php';
$objFcn = new Alunos();
?>
<div class="row">
    <div class="col s12 m6 push-m3"> 
        <h3 class="light">Selecione o Aluno</h3>
        <table class="striped">
            <thead>
                <tr> 
                    <th>Nome:</th>
                    <th>Telefone:</th>
                </tr>
            </thead>

            <tbody> <!--  -----------------------------------MOSTRAR TODOS OS CADASTROS----------------------------------------- -->

                <?php
                foreach($objFcn->querySelect() as $dados){
                ?>


                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['telefone']; ?></td>
                    

                    <!-- ---------------------------BOTÕES DE ÍCONES----------------------------------->


                    <td><a href="../pags/edit.php?id=<?php echo $dados['id']; ?>" class="btn-floating light-blue darken-4"><i class="material-icons">
                    
                    
                    reply</i></a></td>
                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons ">
                    delete_forever</i></a></td> 


                    <!-- ----------------------------- BOTÃO DE DELETAR--------------------------------->


                    <div id="modal<?php echo $dados['id']; ?>" class="modal"> 
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse aluno?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="../actions/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> 
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
        <a href="../inicio.php" class="btn grey darken-4">Voltar</a> 
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>