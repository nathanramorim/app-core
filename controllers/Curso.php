<?php
namespace App;
Use App\Model;

/** ================================================================
*    CLASSE CURSO 
*    Responsável por tratar informações do curso, 
*    (exibir, editar e deletar).
*   --------------------------------------------------------------------
*    @method get_info()
*    @return object retorna todas as informações do curso,
*    de acordo com a query utilizada.
*   --------------------------------------------------------------------
*    @method get_info_by_id()
*       @param integer $id 
*    @return object retorna todas as informações do curso, baseado no $id
*    de acordo com a query utilizada.
*   --------------------------------------------------------------------
*=====================================================================*/

class Curso extends Model{
    private $conn;

    function __consctruct(){}

    public function get_info(){
        $query = array(
            'selection' => 'selection atributtes', 
            'table' => 'table name',
            'join' => 'set your join clause',
            'where' => "where clause"
        );
        $connection = $this->connect();
        $result = $this->select($query,$connection);
        $connection = $this->disconect();
        return $result;
    }

    public function get_info_by_id($id){
        $query = array(
            'selection' => 'selection atributtes' , 
            'table' => 'table name',
            'where' => "where clause"
        );
        $connection = $this->connect();
        $result = $this->select($query,$connection);
        $connection = $this->disconect();
        return $result;

    }
     
}
