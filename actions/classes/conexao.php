<?php

class Conexao{
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;
    
    public function __construct(){ // no construtor para ele inicializar assim q o programa abrir
        $this->servidor = "localhost";
        $this->banco = "alunos";
        $this->usuario = "root";
        $this->senha = "";
    }
    
    public function conectar(){ //conectando com o banco 
        try{
            if(is_null(self::$pdo)){ //se a variavel pdo estiver vazia 
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
                //instancia a variavel com a conexão do servidor 
            }
            return self::$pdo;
        } catch (PDOException $ex) { //se der erro, vai mostrar o erro
			echo $ex->getMessage(); //getmessage() é uma função do PDOException 
        }
    }
    
}

?>