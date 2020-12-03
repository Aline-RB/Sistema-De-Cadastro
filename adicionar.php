<?php
include_once 'includes/header.php';
include_once 'includes/mensagem.php';
?>


<div class="row col s6 m4 push-m4"> <br></div>
<div class="row col s6 m4 push-m4"> <br></div>
<div class="row col s6 m4 push-m4"> <br></div>


<div class="row">
    <div class="col s6 m5 push-m4">
        <h3 class="light">Novo Aluno</h3>
        <form action="actions/criar.php" method="POST"> 
            
        
            <div class="input-field col s8">
                <input type="text" name="nome" id="nome" maxlength="40">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s8">
                <input type="text" name="telefone" id="telefone" maxlength="11">
                <label for="sobrenome">Telefone</label>
            </div>

            <div class="row col s8"> 
                <select class="browser-default col s6" name="materia" id="materia">
                <option value="" disabled selected>Matéria</option>
                <option value="1">Matematica</option>
                <option value="2">História</option>
                <option value="3">Português</option>
                <option value="4">Geografia</option>
                <option value="5">Biologia</option>
                </select>
            </div>
         
        <div class="row col s8"> 
        <button type="submit" class="btn blue darken-4 col s6" name="btn-cadastrar"> Cadastrar </button> 
        <a href="inicio.php" class="btn  grey darken-4 col s4 push-m1">Voltar</a>
        </div>

        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php'; 
?>