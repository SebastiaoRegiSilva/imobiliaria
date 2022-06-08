<h2 style="margin-left: 43%; margin-top: 35px; margin-bottom: 35px;">Cadastro de usuário</h2>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-md-5">
            <form name="cadUsuario" action="" method="POST">
                <input type="text" name="id" id="id" value="<?php echo isset($usuario) ? $usuario->getId() : '' ?>" hidden="" />
                <div class="mb-3">
                    <label class="form-label">Login</label>
                    <input type="text" class="form-control" name="login" value="<?php echo isset($usuario) ? $usuario->getLogin() : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha1" value="<?php echo isset($usuario) ? $usuario->getSenha() : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" name="senha2">
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissão</label>
                    <select class="form-select" name="permissao">
                        <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'A' ? 'seleted' : '' ?>>Administrador</option>
                        <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'C' ? 'seleted' : '' ?>>Comum</option>
                    </select>
                </div>
                <divalign="center">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <?php
            if (isset($_POST['btnSalvar'])) {
                $salvar = call_user_func(array('UsuarioController', 'salvar'));
                if ($salvar) {
            ?>
                    <div class="alert alert-success" role="alert">
                        A senhas não são iguais!
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Usuário cadastrado com sucesso!
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
