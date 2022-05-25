<?php
    require_once 'model/Usuario.php';
    /**
    * Controller que provê endpoints relacionados a entidade usuário.
    */ 
    class UsuarioController
    {
        /**
        * Persiste um novo usuário no repositório.
        */ 
        public static function salvar()
        {
            $usuario = new Usuario();
            $usuario ->setId($_POST["id"]);
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha1']);
            $usuario->setPermissao($_POST['permissao']);

            $usuario->save();
        }

        /**
        * Lista todos os usuários cadastrados no repositório.
        */ 
        public static function listar()
        {
            $usuario = new Usuario();
            return $usuario->listAll();
        }

        /**
        * Edita um usuário cadastrado com base em seu código de identificação.
        * @id  Código de identificação do usuário.
        */
        public static function editar($id)
        {
            
            $usuario = new Usuario;
            $usuario = $usuario->find($id);

            return $usuario;
        }

        /**
        * Exclui um usuário cadastrado com base em seu código de identificação.
        * @id  Código de identificação do usuário.
        */
        public static function excluir($id)
        {
            $usuario = new Usuario();
            $usuario = $usuario->remove($id);
        }

        /**
        * Logar com um usuário no sistema.
        */
        public static function logar()
        {
            $usuario = new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);

            return $usuario->logar();
        }
    }
?>

