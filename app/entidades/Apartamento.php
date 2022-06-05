<?php

namespace APP\entidades;
use \APP\bd\BancoDeDados;
use \PDO;
class Apartamento{
  /**
   * IDENTIFICADOR DO APARTAMENTO
   * @var integer
   */
  public $id;

  /**
   * NÚMERO DO APARTAMENTO
   * @var integer
   */
  public $numero;

  /**
   * VALOR DO ALUGUEL DO APARTAMENTO
   * @var double
   */
  public $aluguel;

  /**
   * TORRE EM QUE O APARTAMENTO ESTÁ LICALIZADO
   * @var string
   */
  public $torre;

  /**
   * VALOR DO ALUGUEL DO APARTAMENTO
   * @var integer
   */
  public $dono;

  /**
   * FUNÇÃO QUE IRÁ INSTANCIAR O APARTAMENTO NO BANCO DE DADOS
   * @return boolean
   */
  public function cadastrar(){
    
    //INSERE UM NOVO APARTAMENTO NO BANCO DE DADOS
    $BD = new BancoDeDados('apartamento');
    $this->id = $BD->insert([
                    'numero' =>$this->numero,
                    'aluguel'=>$this->aluguel,
                    'torre'  =>$this->torre
                ]);
    
    return true;
  }

  /**
   * ATUALIZA OS DADOS DO APARTAMENTO NO BANCO DE DADOS
   * @return boolean
   */
  public function alterar(){
    return (new BancoDeDados('apartamento'))->update('id = '.$this->id,[
                                                                      'numero'     =>$this->numero,
                                                                      'aluguel'    =>$this->aluguel,
                                                                      'torre'      =>$this->torre,
                                                                      'fk_morador' =>$this->dono
                                                                      ]);
  }

  /**
   * DELETA UM APARTAMENTO
   * @return boolean
   */
  public function excluir(){
    return (new BancoDeDados('apartamento'))->delete('id = '.$this->id);
  }

  /**
   * OBTEM OS APARTAMENTOS DO BANCO DE DADOS
   * @param string $where
   * @param string $order
   * @param string $limit
   * @return array
   */
  public static function getApartamento($where = NULL, $order = NULL, $limit = NULL){
    return (new BancoDeDados('apartamento'))->select($where, $order, $limit)->fetchALL(PDO::FETCH_CLASS, self::class);
  }

  /**
   * SELECIONA UM APARTAMENTO COM O RESPECTIVO ID
   * @param integer $id
   * @return Apartamento
   */
  public static function getAp($id){
    return (new BancoDeDados('apartamento'))->select('id = '.$id)->fetchObject(self::class);
  }
}

?>