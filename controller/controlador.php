<?php

ini_set('display_errors',0); //oculta todos os erros que seriam mostrados na tela
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 

define('SMARTY_DIR','../libs/');
require(SMARTY_DIR.'Smarty.class.php');


class Calculadora{

    //*****BLOCO DE CÓDIGO AINDA EM TESTES*****//
    public function recebeAjax(){
        $number = $_POST["numero"];
        $this->salvarTxt($number);
        echo json_encode(['valor' => $this->calcular($number), 'his' => $this->buscarTxt()]) ;
        exit();
    }

    public function __construct(){
        if ( isset($_POST["acao"]) ){
            $this->acao();
        } else {
            $this->template();
        }
    }

    private function acao(){
        switch ($_POST["acao"]) {
            case 'igual':
                $this->recebeAjax();
            break;
            default:
               var_dump('Nenhuma ação foi escolhida.');
               exit();
            break;
        }
    }

    private function salvarTxt($txt){
        $arquivo = "memoria.txt";

	
        //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "a+");

        //Escreve no arquivo aberto.
        fwrite($fp, ';'.$txt.'//'.date("d/m/Y H:i:s"));
        
        //Fecha o arquivo.
        fclose($fp);
    }

    private function buscarTxt(){
        $arquivo = "memoria.txt";
        //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "r");
        //Lê o conteúdo do arquivo aberto.
        $conteudo = fread($fp, filesize($arquivo));
        //Fecha o arquivo.
        fclose($fp);

        $conteudo = explode(';',$conteudo);

        // var_dump($conteudo);die;
        $newConteudo = [];
        foreach($conteudo as $value){
            $exp = explode('//',$value);
            if($exp[0]){
                $addCalculado = $this->calcular( $exp[0] );
                $newConteudo[] = [$exp[0], $exp[1], $addCalculado];
            }

        }

        return $newConteudo;
    }

    private function template(){
         $smarty = new Smarty();

        $smarty->template_dir = '../view/templates';
        $smarty->compile_dir = '../view/templates_c';
        $smarty->config_dir = '../view/configs';
        $smarty->cache_dir = '../view/cache';


        
        
        // var_dump($newConteudo);die;
        $smarty->assign('historico', $this->buscarTxt());
        $smarty->display('index.tpl');  
    }

    private function calcular($numeros){
        try{
            if($numeros){
                $retorno="";
                // $numeros = "4+4-7+2+6";
                // $valNumero = $this->validaNumero($numeros);
                // var_dump($numeros);die;
                eval('$retorno = ' .$numeros. " ;");
                return $retorno;
                //var_dump($retorno);die;
            }
            
        }catch(Exception $e){
            echo "Erro! Não foi possível calcular os resultados! ::". $e->getMessage();
        }
    }


    private function validaNumero($num){
        $tamanhoNumero = strlen($num);
        $txt=null;
        for($i = 0; $i < $tamanhoNumero; $i++ ){
            if(is_numeric($num[$i])||$num[$i] == "+"||$num[$i] == "-"){
                $txt .= $num[$i];
            }
        }
        return $txt;
    }

}
new Calculadora();