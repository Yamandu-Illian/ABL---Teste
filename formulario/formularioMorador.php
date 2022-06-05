<?php
  $results = '';
  foreach($apartamentos as $apartamento){
    if($apartamento->fk_morador == NULL || $apartamento->fk_morador == $resid->id){
      $results .= '<option value='.$apartamento->id.'>'.$apartamento->numero.'</option>';
    }
  }
  
?>

<main>
  <section>
    <a href="index.php">
      <button class="btn btn-primary">Voltar</button>
    </a>
  </section>

  <h2 class="mt-4"><?=TITLE?></h2>
  
  <form method="post">
    <div class="form-group">
      <label>CPF</label>
      <input type="text" class="form-control" name="cpf" value="<?=$resid->cpf?>" minlength="11" maxlength="11">
    </div>

    <div class="form-group mt-3">
      <label>Nome do morador</label>
      <input type="text" class="form-control" name="nome" value="<?=$resid->nome?>">
    </div>

    <div class="form-group mt-3">
      <label>Telefone</label>
      <input type="text" placeholder="xxxxxxxx" class="form-control" name="telefone" value="<?=$resid->telefone?>" minlength="8" maxlength="8">
    </div>

    <div class="form-group mt-3">
      <label>RG</label>
      <input type="text" class="form-control" name="rg" value="<?=$resid->rg?>" minlength="7" maxlength="7">
    </div>

    <div class="form-group mt-3">
      <label>Data de nascimento</label>
      <input type="date" class="form-control" name="data_nascimento" value="<?=$resid->data_nascimento?>">
    </div>

    <div class="form-group mt-3">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?=$resid->email?>">
    </div>
    
    <div class='form-group mt-3'>
      <label>Selecione o apartamento em que será residente (select)</label>
      <select class='form-control' name='num_apartamento'>
        <option value="">Escolher apartamento</option>
        <?=$results?>
      </select>
    </div>

    <div class="form-group mt-4">
      <button type="submit" class="btn btn-danger">Enviar</button>
    </div>

  </form>

</main>