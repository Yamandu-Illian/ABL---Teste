<?php

  $message = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $message = '<div class = "alert alert-success">Tarefa realizada com sucesso :)</div>';
        break;
      
      case 'erro':
        $message = '<div class = "alert alert-danger">Falha durante a execução :(</div>';
        break;
      case 'erroMorador':
        $message = '<div class = "alert alert-danger">Você não pode apagar um apartamento que possui um morador alocado nele</div>';
        break;
    }
  }

  //LISTA TODOS OS APARTAMENTOS CADASTRADOS NO BANCO DE DADOS
  $results = '';
  foreach($apartamentos as $apartamento){
    $results .= '<tr>
                    <td>'.$apartamento->id.'</td>
                    <td>'.$apartamento->numero.'</td>
                    <td>'.$apartamento->aluguel.'</td>
                    <td>'.$apartamento->torre.'</td>
                    <td>'.($apartamento->fk_morador == NULL ? 'Sem morador': $apartamento->fk_morador).'</td>
                    <td>
                      <a href="editarAP.php?id='.$apartamento->id.'">
                        <button type="button" class="btn btn-warning">Editar</button>
                      </a>
                    </td>
                    <td>
                      <a href="deletarAP.php?id='.$apartamento->id.'">
                        <button type="button" class="btn btn-danger">Apagar</button>
                      </a>
                    </td>
                </tr>';
  }
  
  //LISTA TODOS OS MORADORES CADASTRADOS NO BANCO DE DADOS
  $residents = '';
  foreach($moradores as $morador){
    $residents .= '<tr>
                    <td>'.$morador->id.'</td>
                    <td>'.$morador->cpf.'</td>
                    <td>'.$morador->nome.'</td>
                    <td>'.$morador->telefone.'</td>
                    <td>'.$morador->rg.'</td>
                    <td>'.date('d/m/Y', strtotime($morador->data_nascimento)).'</td>
                    <td>'.$morador->email.'</td>
                    <td>
                      <a href="editarMorador.php?id='.$morador->id.'">
                        <button type="button" class="btn btn-warning">Editar</button>
                      </a>
                    </td>
                    <td>
                      <a href="deletarMorador.php?id='.$morador->id.'">
                        <button type="button" class="btn btn-danger">Apagar</button>
                      </a>
                    </td>
                </tr>';
  }

  $results = strlen($results) ? $results : "<tr><td colspan='7' class='text-center'><strong>Nenhum apartamento cadastrado</strong></td></tr>";
  $residents = strlen($residents) ? $residents : "<tr><td colspan='9' class='text-center'><strong>Nenhum morador cadastrado</strong></td></tr>";
?>

<?=$message?>
<main>
  <section>
    <a href="cadastrarAp.php">
      <button class="btn btn-primary">Novo Apartamento</button>
    </a>
    <a href='cadastrarMorador.php'>
      <button class='btn btn-primary'>Novo Morador</button>
    </a>
  </section>
  
  <section>
    <table class='table bg-light mt-3 text-center'>
      
      <thead>
        <tr><td colspan='7' class='text-center'><strong>APARTAMENTOS</strong></td></tr>
        <tr>
          <td>ID</td>
          <td>Numero</td>
          <td>Aluguel</td>
          <td>Torre</td>
          <td>Morador</td>
          <td>Editar</td>
          <td>Apagar</td>
        </tr>
      </thead>
      <tbody>
        <?=$results?>
      </tbody>

    </table>
  </section>

  <section class="mt-5">
    <table class='table bg-light text-center'>
      
      <thead>
        <tr><td colspan='9' class='text-center'><strong>MORADORES</strong></td></tr>
        <tr>
          <td>ID</td>
          <td>CPF</td>
          <td>Nome</td>
          <td>Telefone</td>
          <td>RG</td>
          <td>Data de nascimento</td>
          <td>E-mail</td>
          <td>Editar</td>
          <td>Apagar</td>
        </tr>
      </thead>
      <tbody>
        <?=$residents?>
      </tbody>

    </table>
  </section>

</main>