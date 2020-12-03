<?php
//formatação da seession ['mensagem']para poder usar depois 
session_start();
if(isset($_SESSION['mensagem'])): ?>
<script> //js para a mensagem
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    };
</script>
<?php
endif;
session_unset();


?>