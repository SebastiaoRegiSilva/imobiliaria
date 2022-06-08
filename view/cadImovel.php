<h2 style="margin-left: 43%; margin-top: 35px; margin-bottom: 35px;">Cadastro de Imóvel</h2>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-md-5">
            <form name="cadUsuario" action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" id="id" value="<?php echo isset($imovel) ? $imovel->getId() : '' ?>" hidden="" />
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" value="<?php echo isset($imovel) ? $imovel->getDescricao() : '' ?>">
                </div>

                <?php
                if (isset($imovel)) {
                ?>
                    <div class="mb-3">
                        <label class="form-label">Foto atual</label>
                        <div align="center">
                            <img src="model/img/<?php echo $imovel->getFoto(); ?>" width="100px">
                        </div>
                    </div>
                <?php
                }
                if (!isset($imovel)) {
                ?>
                    <div class="mb-3">
                        <label class="form-label">Foto nova</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                <?php
                }
                ?>



                <div class="mb-3">
                    <label class="form-label">Valor</label>
                    <input type="text" class="form-control" name="valor" value="<?php echo isset($imovel) ? $imovel->getValor() : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="tipo">
                        <option value="C" <?php echo isset($imovel) && $imovel->getTipo() == 'C' ? 'selected' : '' ?>>Casa</option>
                        <option value="A" <?php echo isset($imovel) && $imovel->getTipo() == 'A' ? 'selected' : '' ?>>Apartamento</option>
                        <option value="T" <?php echo isset($imovel) && $imovel->getTipo() == 'T' ? 'selected' : '' ?>>Terreno</option>
                    </select>
                </div>


                <div align="center">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <?php
            if (isset($_POST['btnSalvar'])) {
            ?>
                <div class="alert alert-success" role="alert">
                    Imóvel cadastrado com sucesso!!!
                </div>
            <?php
                require_once 'controller/ImovelController.php';
                call_user_func(array('ImovelController', 'salvar'));
            }
            ?>
        </div>
    </div>
</div>