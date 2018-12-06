<?php
/* Classe para tratamento de Upload de arquivos */ 
class Upload {
    // propriedades da classe 
    public $Campo;
    public $Arquivo;
    public $PastaDestino;
    public $Sobrescrever;
    public $ehUpload;
    public $Erro = 0;
    // Extensões aceitas por default para upload
    public $ExtValidas = array('jpeg','jpg','jpe','gif','png');
    /*    Construtor da Classe
        * @param string $campo :  nome do campo file que está enviando o arquivo
        * @param string $PastaDestino : pasta onde será guardado o arquivo
        * @param bool $sobrescrever : sobrescrever o arquivo, caso ele já exista
        * @param array $validos : array com extensões aceitas para upload
    */

    public function Upload($campo, $pastaDestino, $sobrescrever, $validos=""){
        // Recebe os parâmetros
        $this->Campo = $campo;
        $this->PastaDestino = $pastaDestino;
        $this->Sobrescrever = $sobrescrever;
        $this->ehUpload = false;
        if(is_array($validos) && count($validos > 0)){
            $this->ExtValidas = $validos;
        }
        // trata o upload, verificando se o arquivo foi enviado
        if (isset($_FILES[$campo])) {
            if($_FILES[$campo]['errors'] == UPLOAD_ERR_OK){
                // não ouve erros de envio, verifica arquivo
                $this->Arquivo = $_FILES[$campo]['name'];
                if($this->ehArquivoPermitido($this->Arquivo)){
                    // a extensão do arquivo é válida
                    $arqDestino = $pastaDestino .'/'. $this->Arquivo; // exemplo: imagens/nodoarquivo.png
                }

                if(!$sobrescrever){
                    if(is_file($arqDestino)){
                        // renomeia arquivo de destino
                        $this->Arquivo = uniqid() .'_'. $this->Arquivo;
                        $arqDestino = $pastaDestino .'/'. $this->Arquivo;
                    }
                }
                move_uploaded_file($_FILES[$campo]['tmp_name'],$arqDestino);
            } else {
                // o PHP nos informa que algum erro ocorreu
                $this->erro = $_FILES[$campo]['error'];
            }
        }
    }

    // verifica se o arquivo tem extensão válida
    function ehArquivoPermitido($arquivo){
        //separa as partes do nome do arquivo pelo ponto
        $partes = explode('.', $arquivo);
        // retorna o valor do último elemento do array gerado (acima, com o explode)
        $extensao = end($partes);

        if( array_search($extensao, $this->ExtValidas)){
            // arquivo OK
            return true;
        }
        // arquivo não permitido
        return false;
    }

    
}
    



?>