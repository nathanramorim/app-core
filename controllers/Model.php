<?php
namespace App;
Use PDO;

/** ================================================================
*    CLASSE MODEL   
*    Responsável pela conexão com o banco de dados da aplicação,
*    estão presente alguns métodos do CRUD.
*   --------------------------------------------------------------------
*    @method private connection(): efetuar a conexão
*       @param string $servername, 
*       @param string $dbname, 
*       @param string $username, 
*       @param string $password
*    @return object conexão com o banco
*   --------------------------------------------------------------------
*    @method connect(): retorna a conexão
*    @return object conexão com o banco
*   --------------------------------------------------------------------
*    @method disconect(): retorna NULL para conexão, deconectando.
*    @return object NULL
*   --------------------------------------------------------------------
*    @method select(): query select retorna os valores dos atributos selecionados
*       @param array $query = array(
*                    'selection' => 'atributos que quer trazer no select' , 
*                    'table' => 'nome da tabela que deseja efetuar a consulta' , 
*                    'join' => 'cláusula join se necessário' , 
*                    'where' => 'cláusula where se necessário'
*               );
*       @param object $connection
*    @return object  valores dos atributos selecionados
*   --------------------------------------------------------------------
*    @method update(): query update altera um valor no banco
*       @param array $query = array(
*                    'table' => 'nome da tabela que deseja efetuar a consulta' , 
*                    'set_attr' => 'atributo a ser alterado',
*                    'attr_value' => 'valor a ser inserido',
*                    'where' => 'cláusula where' 
*               );
*       @param object $connection
*    @return boolean
*   --------------------------------------------------------------------
*    @method delete(): query deleta valor no banco
*       @param array $query = array(
*                    'table' => 'nome da tabela que deseja efetuar a consulta' , 
*                    'where' => 'cláusula where' 
*               );
*       @param object $connection
*    @return boolean
*   --------------------------------------------------------------------
*=====================================================================*/

class Model{
 
    private $conn;

    public function __construct(){
        $this->connect();
    }
    
    private function connection($servername,$dbname,$username,$password){
        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;             
        }
        catch(PDOException $e){
             echo "Connection failed: " . $e->getMessage();
        }

    }

    protected function connect(){
        return $this->connection(constant('servername'),constant('db_name'),constant('username'),constant('pass'));
    }

    protected function disconect(){
        return NULL;
    }

   
    public function select($query,$connection){
        $join_name = constant('db_name').'.'.constant('prefix');
        $join = (isset($query['join'])) ? $query['join'] : '';
        $where = (isset($query['where'])) ? $query['where'] : '' ;
        $stmt = $connection->prepare("SELECT {$query['selection']} FROM {$join_name}{$query['table']} {$join} {$where};");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $connection = $this->disconect();
        return $result;
    }


    public function update($query,$connection,$encrypt){
        $join_name = constant('db_name').'.'.constant('prefix');
        $attr_value = ($encrypt) ? md5($query['attr_value']) : $query['attr_value'] ;
        $sql = "UPDATE {$join_name}{$query['table']} SET {$query['set_attr']} = '{$attr_value}' {$query['where']};";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":{$query['set_attr']}", $query['set_attr'], PDO::PARAM_STR);
        $result = $stmt->execute();
        $connection = $this->disconect();
        return $result;
    }

    public function delete($query,$connection){
        $join_name = constant('db_name').'.'.constant('prefix');
        $sql = "DELETE FROM {$join_name}{$query['table']} {$query['where']};";
        $stmt = $connection->prepare($sql);
        $result = $stmt->execute();
        $connection = $this->disconect();
        return $result;

    }

}