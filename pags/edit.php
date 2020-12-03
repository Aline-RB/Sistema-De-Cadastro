<?php
include_once '../includes/header.php';



if(isset($_GET['id'])): //vai pegar o id do link q foi posto do usuario selecionado
            $connect = new mysqli("localhost", "root", "", "alunos");
            $id = mysqli_escape_string($connect, $_GET['id']); //esta pegando do banco de dados o id do editar  selecionado
            $sql = "SELECT * FROM aluno WHERE id = '$id'";
            $resultado = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($resultado);//armazenando em um array matriz os dados de $resultado
            $sql2 = "SELECT codigo_disciplina FROM curso WHERE codigo_aluno = '$id'";
            $resultado2 = mysqli_query($connect, $sql2);
            $dados2 = mysqli_fetch_array($resultado2);
            $sql3 = "SELECT nome FROM disciplina WHERE codigo = '$dados2[0]'";
            $resultado3 = mysqli_query($connect, $sql3);
            $dados3 = mysqli_fetch_array($resultado3);
            $materia = $dados3[0]; // esta pegando o nome da materia que o usuario do id q foi pego pelo GET tem.
            
 endif;

?>
<div class="row col s6 m4 push-m4"> <br></div>
<div class="row col s6 m4 push-m4"> <br></div>
<div class="row col s6 m4 push-m4"> <br></div>

<div class="row">
    <div class="col s6 m5 push-m4">
        <h3 class="light">Edição</h3>
        <form action="../actions/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"><!-- pegando os valores do banco de dados da variavel $dados no GET -->
            <div class="input-field col s8">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'] ?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s8">
            <input type="text" name="telefone" id="telefone" value="<?php echo $dados['telefone'] ?>">
            <label for="sobrenome">Telefone</label>
            </div>

        
            <select class="browser-default col s8 " name="materia" id="materia">
            <option value="" disabled selected><?php echo $materia; ?></option>
            <option value="1">Matematica</option>
            <option value="2">História</option>
            <option value="3">Português</option>
            <option value="4">Geografia</option>
            <option value="5">Biologia</option>
            </select>
        
            <div class="row col s12"><br></div> 
        <button type="submit" class="btn blue darken-4 col s8 " name="btn-update"> Editar </button>

        </form>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>