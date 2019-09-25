<div class="row my-3 justify-content-center">

  <h2 class="col-12 text-center font-weight-bold">Cadastro</h2>

  <form id="formCadastro" name="formCadastro" action="<?php echo DIRPAGE.'cadastro/register' ?>" method="post" accept-charset="utf-8">

    <div class="form-row">
      <!-- Nome -->
      <div class="form-group col-12">
        <label for="nome">Nome</label>
        <input id="nome" class="input-group" type="text" name="nome" placeholder="Informe seu nome" required/>
      </div>

      <!-- Senha -->
      <div class="form-group col-12">
        <label for="senha">Senha</label>
        <input id="senha" class="input-group" type="password" name="senha" placeholder="Digite uma senha" required/>
      </div>

       <button type="submit" class="btn btn-primary">Cadastrar</button>

    </div>

  </form>

  <p class="d-block col-12 text-center mt-3"><a href="<?php echo DIRPAGE.'home' ?>">Já sou cadastrado.</a></span>
</div>