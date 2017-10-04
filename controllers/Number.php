<?php
namespace App;

/** ================================================================
*    CLASSE NUMBER    
*    responsável por tratar números (validação e formatação)
*    @method get_just_number()
*       @param string $str
*    @return integer retorna somente os número de uma string   
*    -----------------------------------------------------------------
*    @method formata_preco()
*       @param float $val numero a ser modelado
*       @param string $separator fator de separação entre casa decimal
*    @return integer retorna o valor em moeda ",00" duas casas decimais
*    -----------------------------------------------------------------
*    @method geraSenha();
*       @param integer $tamanho Tamanho da senha a ser gerada
*       @param boolean $maiusculas Se terá letras maiúsculas
*       @param boolean $numeros Se terá números
*       @param boolean $simbolos Se terá símbolos
*    @return string A senha gerada
*=====================================================================*/

class Number{

    private function get_just_number($str){
        preg_match_all('/\d+/', $str, $matches);
        $arr = '';
        foreach ($matches as $key) {
            foreach ($key as $value){
                $arr .= $value;
            }
        }
        return $arr;
    }

    public function formata_preco ($val,$separador) {
        $preco = explode('x',$val);
        if (sizeof($preco)>1) {
            
            $preco = $this->get_just_number($preco[1]);
        }else{
            $preco = $this->get_just_number($preco[0]);
        }
    
        switch ($separador) {
            case ',':
                $preco = number_format($preco/100, 2,',','');
                break;
            default:
                $preco = number_format($preco/100, 2,'.','');
                break;
        }
        
        return $preco;
    }

    /**
    * Função para gerar senhas aleatórias
    *
    * @author    Thiago Belem <contato@thiagobelem.net>
    *
    * @param integer $tamanho Tamanho da senha a ser gerada
    * @param boolean $maiusculas Se terá letras maiúsculas
    * @param boolean $numeros Se terá números
    * @param boolean $simbolos Se terá símbolos
    *
    * @return string A senha gerada
    */
    public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
    
}
