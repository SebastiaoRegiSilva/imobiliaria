<?php
    //require_once '../head.php';
?>
<div class="container">
    <form name="cadUsuario" id="cadUsuario" action="" method="post" enctype="multipart/form-data">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Cadastro de Imóveis.</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                <input type="text" class="form-control col-sm-8" name="descricao" id="descricao" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="text" class="form-control col-sm-8" name="foto" id="foto" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Valor:</label>
                <input type="text" class="form-control col-sm-8" name="valor" id="valor" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control col-sm-8">
                    <option value="0">**SELECIONE**</option>
                    <option value="C">Casa Térrea</option>
                    <option value="S">Sobrado</option>
                    <option value="T">Terreno</option>
                    <option value="H">Chacara</option>
                </select>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="" />
                <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
            </div>
        </div>
    </form>
</div>

<?php
    if(isset($_POST['btnSalvar']))
    {
        echo 'Salvo!';
        require_once '../controller/ImovelController.php';
        call_user_func(array('ImovelController','salvar'));
    }

    //require_once '../foot.php';
?>