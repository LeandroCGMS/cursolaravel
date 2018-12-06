<?php
    class BD {
        public $Servidor;
        public $Usuario;
        public $Link;
        public $Banco;
        public $Charset;

        // para iniciar, automaticamente, meu objeto com a conexão aberta

        public function __constructor($servidor, $usuario, $senha, $banco, $charset){
            $this->Abrir($servidor, $usuario, $senha, $banco, $charset);
        }

        // para encerrar a conexão ao banco

        public function __destruct(){
            $this->Fechar;
        }

        public function Abrir($servidor, $usuario, $senha, $banco, $charset){
            // conecta ao servidor
            $this->Link = @mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysqli_connect_error());
            mysqli_set_charset($this->Link, $charset) or die(mysqli_error($this->Link));

            $this->Servidor = $servidor;
            $this->Usuario = $usuario;
            $this->Banco = $banco;
            $this->Charset = $charset;
        }

        public function Fechar(){
            if($this->Link != null){
                @mysqli_close($this->Link) or die(mysqli_error($this->Link));
                $this->Link = null;
            }
        }

    }

    class Consulta {
        public $resultado;
        public $BD;

        public function __construct($sql, $bd) {
            
            if(!$bd->Link){
                $bd->Abrir();
                die("entrou");
            }

            if(!is_array($sql)){
                $sql = mysqli_real_escape_string($bd->Link, $sql);
            } else {
                $arr = $sql;
                foreach($arr as $key => $value){
                    $key   = mysqli_real_escape_string($bd->Link, $key);
                    $value = mysqli_real_escape_string($bd->Link, $value);
                    $sql[$key] = $value;
                }
            }
            $this->resultado = @mysqli_query($bd->Link, $sql) or die(mysqli_error);
            $bd->Fechar();
            $this->BD = $bd;
        }
    }


?>