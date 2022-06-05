<?php
  $message = '';
  switch (TITLE) {
    case 'MORADOR':
      $message = $resid->id;
      break;
    
    case 'APARTAMENTO':
      $message = $Ap->id;
      break;
  }
?>
<main>

  <h2 class="mt-4">Excluir <strong><?=TITLE?></strong></h2>
  
  <form method="post">
    <div class="form-group">
      <p>Deseja excluir o <strong><?=TITLE?></strong> <strong><?=$message?></strong></p>
    </div>

    <div class="form-group mt-2">
      <a href="index.php">
        <button type="button" class="btn btn-primary">Cancelar</button>
      </a>
      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>
  </form>

</main>