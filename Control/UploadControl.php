<?php
/**
* Classe para tratamento de Upload de arquivos
*
*/
class Upload
{
    // propridades da classe
    public $Campo;
    public $Arquivo;
    public $PastaDestino;
    public $Sobrescrever;
    public $ehUpload;
    public $Erro = 0;
    // extensões aceitas por default para upload
    public $ExtValidas = array('jpeg', 'jpg', 'jpe', 'gif', 'png', 'pdf');
    /**
    * Construtor da classe
    * @param string $campo : nome do campo file que está enviando o arquivo
    * @param string $pastaDestino : pasta onde será guardado o arquivo 
    * @param bool $sobrescrever : sobrescrever o arquivo caso ele já exista
    * @param array $validos : array com exensões aceitas para upload
    */
    public function Upload($campo, $pastaDestino, $sobrescrever, $validos="") 
    {
        // recebe os parâmetros
        $this->Campo = $campo;
        $this->PastaDestino = $pastaDestino;
        $this->Sobrescrever = $sobrescrever;
        $this->ehUpload = false;
        if(is_array($validos) && count($validos)>0) 
        {
            $this->ExtValidas = $validos;
        }
        // trata o upload, verificando se o arquivo foi enviado
        if(isset($_FILES[$campo]))
        {
            if($_FILES[$campo]['error']==UPLOAD_ERR_OK)
            {
                // não houve erro de envio, verifica arquivo
                $this->Arquivo = $_FILES[$campo]['name'];
                if($this->ehArquivoPermitido($this->Arquivo)) 
                {
                    // a extensão do arquivo é valida
                    $arqDestino = $pastaDestino .'/'. $this->Arquivo;
                    if(!$sobrescrever)
                    {
                        if(is_file($arqDestino))
                        {
                            // renomeia arquivo de destino
                            $this->Arquivo = uniqid().'_'.$this->Arquivo;
                            $arqDestino = $pastaDestino.'/'.$this->Arquivo;
                        }
                    }
                    move_uploaded_file($_FILES[$campo]['tmp_name'],$arqDestino);
                } 
            } else {
                // o PHP nos informa que algum erro ocorreu
                $this->Erro = $_FILES[$campo]['error'];
            }
        }
    }
    
    // verifica se o arquivo tem extensã válida
    function ehArquivoPermitido($arquivo)
    {
        // separa as partes do nome do arquivo pelo ponto
        $partes = explode(".", $arquivo); 
        // retorna o valor do último elemento do array gerado
        $extensao = end($partes);
        if( array_search($extensao, $this->ExtValidas))
        {
            // arquivo ok
            return true;
        }
        // arquivo não permitido
        return false;
    }
}
