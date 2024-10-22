<?php
class Conexao {
    private static $conexao;
    private function __construct(){
    }
    
    public static function getInstance(){
      if(!isset(self::$conexao)){
        try{  
            self::$conexao =  new PDO('mysql:host=localhost;dbname=sendstyle',
                    'root','');
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            echo "Erro ao conectar ao banco de dados ".$ex->getMessage();
            exit();
        }  
      }  
      return self::$conexao;
        
    }
   
}
