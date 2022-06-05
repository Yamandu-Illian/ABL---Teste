<?php

namespace APP\bd;
use \PDO;
use \PDOException;
use \PDOStatement;

class BancoDeDados{
  
  /**
   * HOST DE CONEXÃO COM O BANCO DE DADOS
   * @var string
   */
  const HOST = 'localhost';

  /**
   * NOME DO BANCO DE DADOS
   * @var string
   */
  const NAME = 'condominio';

  /**
   * USUÁRIO DO BANCO
   * @var string
   */
  const USER = 'root';

  /**
   * SENHA DO BANCO DE DADOS
   * @var string
   */
  const PASSWORD = '';

  /**
   * NOME DA TABELA QUE SERÁ MANIPULADA
   * @var string
   */
  private $table;
  
  /**
   * INSTÂNCIA DE CONEXÃO COM O BANCO DE DADOS
   * @var PDO
   */
  private $connection;

  /**
   * DEFINE A TABELA E INSTANCIA A CONEXÃO
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * CRIAR CONEXÃO COM O BANCO DE DADOS
   */
  private function setConnection(){
    try {
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      die('ERRO: '.$e->getMessage());
    }

  }

  /**
   * FUNÇÃO QUE VAI INSERIR OS DADOS NO BANCO
   * @param array $values
   * @return integer
   */
  public function insert($values){
    //CAMPOS DA TABELA
    $fields = array_keys($values);
    $field_values = array_pad([], count($fields), '?');

    //MONTANDO A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$field_values).')';

    //REALIZA O INSERT
    $this->execute($query, array_values($values));

    return $this->connection->lastInsertId();
  }

  /**
   * MÉTODO QUE IRÁ ATUALIZAR OS DADOS NO BANCO DE DADOS
   * @param string $where
   * @param array $values
   * @return boolean
   */
  public function update($where, $values){
    //DADOS
    $fields = array_keys($values);

    //MONTANDO QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    // echo $query;
    // exit;
    //EXECUTNADO
    $this->execute($query, array_values($values));

    return true;
  }

  /**
   * APAGA OS DADOS DO BANCO DE DADOS
   * @param $where
   * @return boolean
   */
  public function delete($where){
    //MONTANDO A QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTANDO A QUERY
    $this->execute($query);

    return true;
  }

  /**
   * EXECUTA A QUERY
   * @param string $query
   * @param array $params
   * @return PDOStatement
   */
  public function execute($query, $params = []){
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    } 
    catch (PDOException $e) {
      die('ERRO: '.$e->getMessage());
    }
  }

  /**
   * EXECUTA O SELECT NO BANCO DE DADOS
   * @param string $where
   * @param string $order
   * @param string $limit
   * @param string $fields
   * @return PDOStatement
   */
  public function select($where = NULL, $order = NULL, $limit = NULL, $fields = '*'){
    //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTANDO A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    //EXECUTANDO A QUERY
    return $this->execute($query);
  }

}

?>