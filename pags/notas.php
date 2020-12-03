<?php
include_once '../includes/header.php';


//criando uma conexão sem ser a da classe 

$sernvername = "localhost";
$username = "root";
$password = "";
$db_name = "alunos";

$connect = mysqli_connect($sernvername, $username, $password, $db_name);


if(isset($_GET['id'])): //vai pegar o id do link q foi posto do usuario selecionado
    //------------------pegar id ----------------
    $id = mysqli_escape_string($connect, $_GET['id']); //esta pegando do banco de dados o id do editar  selecionado

    //-------------------pra conseguir seleciona-lo no input-------------------------
    $sql = "SELECT * FROM aluno WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);//armazenando em um array matriz os dados de $resultado
    //var_dump($sql);

endif;



?>
<div class="row col s6 m4 push-m4"> <br></div>
<div class="row col s6 m4 push-m4"> <br></div>
<div class="row">
    <div class="col s6 m4 push-m4">
        <h3 class="light">Notas</h3>
        <form action="../actions/adicionar_nota.php" method="POST"> <!-- as ações dessa pag estão no arquivo adicionar_nota -->
        <input  type="hidden" name="id" value="<?php echo $dados['id']; ?>"> <!-- colocar o id em um input porém invisivel para usa-lo -->
            <div class="input-field col s12">
                <input type="text" name="nota1" id="nota1" maxlength="3">
                <label for="nome">Nota 1</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="nota2" id="nota2" maxlength="3">
                <label for="sobrenome">Nota 2</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="nota3" id="nota3" maxlength="3">
                <label for="email">Nota 3</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="nota4" id="nota4" maxlength="3">
                <label for="idade">Nota 4</label>
            </div>

            <div class="row col s8">
            <button type="submit" class="btn  blue darken-4 col s6" name="btn-nota"> Adicionar Nota </button>
            <a href="../pags/aluno_notas.php" class="btn green col s4 push-m1"> Voltar </a>
            </div>

        </form>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>