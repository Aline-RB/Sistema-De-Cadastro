<?php
require_once 'conexao.php';

class Alunos{
    private $nome;
    private $telefone;
    private $con;
    private $con2;
    private $result;
    private $materia;
    private $nota1;
    private $nota2;
    private $nota3;
    private $nota4;
    private $id;

    public function __construct(){ //refazer 
        $this->con = new Conexao();
        $this->con2 = new Conexao();
        $this->con3 = new Conexao();
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }

    
    public function queryInsert($dados){ //dados recebidos pelo post

        $regex = [
            'nome' => '/[A-Z][a-z]* [A-Z][a-z]*/',
            'telefone'=> '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'
        ];

        $regexNome = preg_match( $regex['nome'], $dados['nome']);
        $regexTelefone = preg_match( $regex['telefone'], $dados['telefone']);
        

            $keys = array_keys($dados);
           
            foreach($keys as $key){
                if(empty($dados[$key])){
                    return 'errado';
                }  
                else if(empty($dados['materia'])){
                    return 'errado';
                }
                else if((!$regexNome && !empty($dados['materia'])) || (!$regexTelefone && !empty($dados['materia']))){
                    return 'errado';
                }
                else if(!$regexNome){
                    return 'nome';
                }
                else if(!$regexTelefone){
                    return 'telefone';
                }
                else if($regexNome && $regexTelefone && !empty($dados['materia'])){
                      
                    $nome = $this->nome = $dados['nome'];
                    $telefone = $this->telefone = $dados['telefone'];
                    $materia = $this->materia = $dados['materia'];
    
                    $mysqli = new mysqli("localhost", "root", "", "alunos");
                    $query = "INSERT INTO `aluno` (`nome`, `telefone`) VALUES ('$nome','$telefone');";
                    $mysqli->query($query);
    
                    $id = $mysqli->insert_id;
                    $query2 = "INSERT INTO `curso` (`codigo_aluno`, `codigo_disciplina`) VALUES ('$id','$materia');";
                    $mysqli->query($query2);
                    
                    return 'certo';
                }
               

            
            }
    }


    public function queryNota($dados){

            $id = $this->id = $dados['id'];
            $nota1 = $this->nota1 = $dados['nota1'];
            $nota2 = $this->nota2 = $dados['nota2'];
            $nota3 = $this->nota3 = $dados['nota3'];
            $nota4 = $this->nota4 = $dados['nota4'];

            $con = new mysqli("localhost", "root", "", "alunos");
            $query = "SELECT codigo_disciplina FROM curso WHERE codigo_aluno = '$id'";
            $sqlresposta = mysqli_query($con, $query);
            $dadosrecebidos = mysqli_fetch_array($sqlresposta);
            $id_materia = $dadosrecebidos[0]; 
            
            $cst = $this->con->conectar()->prepare("INSERT INTO `notas` (`codigo_aluno`,`codigo_disciplina`,`nota1`,`nota2`,`nota3`,`nota4`)
            VALUES ('$id','$id_materia','$nota1','$nota2','$nota3','$nota4')");
            

            if($cst->execute()){
                return "ok";
             }else{
                 return "erro";
             }
        }


        public function querySelect(){
            $cst = $this->con->conectar()->prepare("SELECT * FROM aluno;");
            $cst->execute();
            return $cst->fetchAll(); 
        }
        
        public function querySelectTotal(){
            $cst = $this->con->conectar()->prepare("SELECT * FROM notas;");
            $cst->execute();
            return $cst->fetchAll(); 
        }
        public function queryDelete($dados){

            $id = $dados['id'];

            $cst = $this->con->conectar()->prepare("DELETE FROM aluno WHERE id = '$id';");
            $cst2 = $this->con2->conectar()->prepare("DELETE FROM curso WHERE codigo_aluno = '$id';");
            $cst3 = $this->con3->conectar()->prepare("DELETE FROM notas WHERE codigo_aluno= '$id';");
            $cst->execute(); 
            $cst2->execute(); 
            $cst3->execute(); 
            if($cst->execute() &&  $cst2->execute() &&  $cst3->execute()){
                return "TRUE";
            }
            else{
                return 'FALSE';
            }
        }
        
        
        public function queryUpdate($dados){

            $id = $dados['id'];
            $nome = $dados['nome'];
            $telefone = $dados['telefone'];
            
            
            $cst = $this->con->conectar()->prepare("UPDATE aluno SET nome = '$nome', telefone = '$telefone' WHERE id = '$id';");
            $cst->execute();
    
            $vazio = empty($dados['materia']);

            if($vazio == false){
                $materia = $dados['materia'];
                $cst2 = $this->con2->conectar()->prepare("UPDATE  curso SET codigo_disciplina = '$materia' WHERE codigo_aluno = '$id' ;");
                $cst3 = $this->con3->conectar()->prepare("UPDATE  notas SET codigo_disciplina = '$materia' WHERE codigo_aluno = '$id' ;");
                $cst2->execute();
                $cst3->execute();
                return true;
            }
            return true;
           
        }

        // public function querySelectGeral(){  //erro 

        
        //     $con = new mysqli("localhost", "root", "", "alunos");
        //     mysqli_set_charset($con,"utf8");

        //     $query1 = ("SELECT codigo_disciplina, codigo_aluno FROM notas;");
        //     $sqlresposta = mysqli_query($con, $query1);
        //     $dadosrecebidos = mysqli_fetch_array($sqlresposta);
        //     $id_disciplina = $dadosrecebidos[0]; //id
        //     $id_aluno = $dadosrecebidos[1];
        //     // var_dump($id_disciplina,$id_aluno);
            

    
        //     $query2 = " SELECT d.nome from diciplina d INNER JOIN curso c on d.codigo = c.codigo_disciplina WHERE codigo_aluno = '$id_aluno';";
        //     $sqlresposta2 = mysqli_query($con, $query2);
        //     $dadosrecebidos2 = mysqli_fetch_array($sqlresposta2);
        //     $dadosrecebidos2[0];
        //     // var_dump($dadosrecebidos2); //nome da materia

            
        //     $query3 = "SELECT a.nome FROM aluno a INNER JOIN curso c ON a.id = c.codigo_aluno WHERE codigo_aluno = '$id_aluno';";
        //     $sqlresposta3 = mysqli_query($con, $query3);
        //     $dadosrecebidos3 = mysqli_fetch_array($sqlresposta3);
        //     // var_dump($dadosrecebidos3); //nome do aluno

        //     $query4 = "SELECT * FROM notas;";
        //     $result = mysqli_query($con,$query4);
        //     $row = mysqli_fetch_array($result, MYSQLI_NUM);
        //     $row[0]= $dadosrecebidos2[0];
        //     $row[1]= $dadosrecebidos3[0];
        //     // var_dump($row);
        //     return $row;
        // }

    }

?>