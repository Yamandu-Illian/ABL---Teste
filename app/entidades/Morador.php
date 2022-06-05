<?php
namespace APP\entidades;
use \APP\bd\BancoDeDados;
use \PDO;

class Morador{
  /**
   * IDENTIFICADOR DO MORADOR
   * @var integer
   */
  public $id;

  /**
   * CPF DO MORADOR
   * @var string
   */
  public $cpf;

  /**
   * NOME DO MORADOR
   * @var string
   */
  public $nome;

  /**
   * TELEFONE DO MORADOR
   * @var string
   */
  public $telefone;

  /**
   * RG DO MORADOR
   * @var string
   */
  public $rg;

  /**
   * DATA DE NASCIMENTO DO MORADOR
   */
  public $data_nascimento;

  /**
   * EMAIL DO MORADOR PARA CONTATO
   * @var string
   */
  public $email;

  /**
   * FUNÇÃO QUE IRÁ INSTANCIAR O MORADOR NO BANCO DE DADOS
   * @return boolean
   */
  public function cadastrar(){
    
    //INSERE UM NOVO APARTAMENTO NO BANCO DE DADOS
    $BD = new BancoDeDados('morador');
    $this->id = $BD->insert([
                    'cpf'             =>$this->cpf,
                    'nome'            =>$this->nome,
                    'telefone'        =>$this->telefone,
                    'rg'              =>$this->rg,
                    'data_nascimento' =>$this->data_nascimento,
                    'email'           =>$this->email
                ]);
    
    return true;
  }

  /**
   * ATUALIZA OS DADOS DO MORADOR NO BANCO DE DADOS
   * @return boolean
   */
  public function alterar(){
    return (new BancoDeDados('morador'))->update('id = '.$this->id,[
                                                                      'cpf'             =>$this->cpf,
                                                                      'nome'            =>$this->nome,
                                                                      'telefone'        =>$this->telefone,
                                                                      'rg'              =>$this->rg,
                                                                      'data_nascimento' =>$this->data_nascimento,
                                                                      'email'           =>$this->email
                                                                      ]);
  }

  /**
   * DELETA UM MORADOR
   * @return boolean
   */
  public function excluir(){
    return (new BancoDeDados('morador'))->delete('id = '.$this->id);
  }

  /**
   * OBTEM AS MORADORES DO BANCO DE DADOS
   * @param string $where
   * @param string $order
   * @param string $limit
   * @return array
   */
  public static function getMorador($where = NULL, $order = NULL, $limit = NULL){
    return (new BancoDeDados('morador'))->select($where, $order, $limit)->fetchALL(PDO::FETCH_CLASS, self::class);
  }

  /**
   * SELECIONA UM MORADOR COM O RESPECTIVO ID
   * @param integer $id
   * @return Morador
   */
  public static function getMorad($id){
    return (new BancoDeDados('morador'))->select('id = '.$id)->fetchObject(self::class);
  }
}


?>