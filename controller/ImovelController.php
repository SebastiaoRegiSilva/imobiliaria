<?php
    require_once 'model/Imovel.php';
    /**
    * Controller que provê endpoints relacionados a entidade imóvel.
    */ 
    class ImovelController
    {
        /**
        * Persiste um novo imóvel no repositório.
        * @param mixed $fotoAtual Foto armazenada na base de dados.
        * @param mixed $fotoTipo Depois comentar.
        */ 
        public static function salvar($fotoAtual="", $fotoTipo="")
        {
            // Criar um objeto do tipo imóvel.
            $imovel = new Imovel();

            // Trata a foto para ser armazenada no banco de dados.
            $imagem = array();
            if(is_uploaded_file($_FILES['foto']['tmp_name']))
            {
                $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
                $imagem['tipo'] = $_FILES['foto']['type'];
            }
            
            // Verifica se o array a imagem não está vazia, se tiver alguma no mesmo
            // Quer dizer que o usuário alterou a imagem ou está cadastrando um imóvel novo.
            if(!empty($imagem))
            {
                $imovel->setFoto($imagem['data']);
                $imovel->setFotoTipo($imagem['tipo']);
            }
            else
            {
                $imovel->setFoto($fotoAtual);
                $imovel->setFotoTipo($fotoTipo);
            }
            // ----> Continua
            
            $imovel->setDescricao($_POST['descricao']);
            $imovel->setFoto($_POST['foto']);
            $imovel->setValor($_POST['valor']);
            $imovel->setTipo($_POST['tipo']);

            $imovel->save();
        }

        /**
        * Lista todos os imóveis cadastrados no repositório.
        */ 
        public static function listar()
        {
            $imovel = new Imovel();
            return $imovel->listAll();
        }
        
        /**
        * Edita um imóvel cadastrado com base em seu código de identificação.
        * @param mixed  $id  Código de identificação do imóvel.
        */
        public static function editar($id)
        {
            $imovel = new Imovel;
            $imovel = $imovel->find($id);

            return $imovel;
        }

        /**
        * Exclui um imóvel cadastrado com base em seu código de identificação.
        * @param mixed $id  Código de identificação do imóvel.
        */
        public static function excluir($id)
        {
            $imovel = new Imovel;
            $imovel = $imovel->remove($id);
        }
    }
?>

