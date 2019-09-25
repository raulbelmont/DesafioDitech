<div class="row my-3 justify-content-center">

  <h2 class="col-12 text-center font-weight-bold">Bem-vindo</h2>
  <h5 class="col-12 text-center font-weight-bold">Faça login para continuar</h5>

  <form id="formLogin" name="formLogin" action="<?php echo DIRPAGE.'home/getLogin' ?>" method="post" accept-charset="utf-8">

    <div class="form-row">
      <!-- Nome -->
      <div class="form-group col-12">
        <label for="name">Nome</label>
        <input id="name" class="input-group" type="text" name="name" placeholder="Informe seu nome" required/>
      </div>

      <!-- Senha -->
      <div class="form-group col-12">
        <label for="password">Senha</label>
        <input id="password" class="input-group" type="password" name="password" placeholder="Digite uma senha" required/>
      </div>

       <button type="submit" class="btn btn-primary">Entrar</button>

    </div>

  </form>

  <p class="d-block col-12 text-center mt-3"><a href="<?php echo DIRPAGE.'cadastro' ?>">Ainda não é cadastrado?</a></span>
</div>