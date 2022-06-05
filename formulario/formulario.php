<?php
  $results = '';
  foreach($residents as $resid){
      $results .= '<option value='.$resid->id.'>'.$resid->nome.'___ID ('.$resid->id.')</option>';
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
      <label>Torre</label>
      <input type="text" class="form-control" name="torre" value="<?=$Ap->torre?>">
    </div>

    <div class="form-group mt-3">
      <label>Numero do apartamento</label>
      <input type="number" value="<?=$Ap->numero?>" class="form-control" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="numero">
    </div>

    <div class="form-group mt-3">
      <label>Aluguel - R$</label>
      <input type="number" value="<?=$Ap->aluguel?>" class="form-control" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="aluguel">
    </div>

    <div class='form-group mt-3'>
      <label>Selecione o morador que será residente (select)</label>
      <select class='form-control' name='morador_id'>
        <option value="">Escolher morador</option>
        <?=$results?>
      </select>
    </div>

    <div class="form-group mt-4">
      <button type="submit" class="btn btn-danger">Enviar</button>
    </div>
  </form>

</main>