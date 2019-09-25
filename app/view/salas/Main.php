<div class="row my-3 justify-content-center">

	<h2 class="col-12 text-center font-weight-bold">Salas</h2>

  <form id="formCadastrarSala" name="formCadastrarSala" action="<?php echo DIRPAGE.'salas/registerRoom' ?>" method="post" accept-charset="utf-8">

	<div id="input-group-room" class="form-row my-4 bg-dark text-white p-3">
      <!-- Número da sala -->
      <div class="form-group col-12 bg-dark text-white p-3">
      	<p class="text-center font-weight-bold text-uppercase">Nova sala</p>
        <label for="roomNumber" class="">Número da sala:</label>
        <input class="input-group" type="text" name="roomNumber" required>
	  </div>

	  <button type="submit" class="btn btn-primary">Salvar</button>
	</div>

  </form>
</div>