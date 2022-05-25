<?php
    session_start();
    require_once './controller/UsuarioController.php';
    require_once './controller/ImovelController.php';

    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true)
    {
        require_once 'view/menu.php';
        if(isset($_GET['action']))
        {
            // Editar.
            if($_GET['action'] == 'editar')
            {
                // Chama uma função PHP que permite informar a classe e o Método que será acionado.
                $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
                require_once 'view/cadUsuario.php';
            }
            
            // Listar.
            if($_GET['action'] == 'listar')
                require_once 'view/listUsuario.php';

            // Excluir
            if($_GET['action'] == 'excluir')
            {
                // Chama uma função PHP que permite informar a classe e o Método que será acionado.
                $usuario = call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
                require_once 'view/listUsuario.php';
            }    
        }
        else
            require_once 'view/cadUsuario.php';
    }
    else
    {
        if(isset($_GET['logar']))
            require_once 'view/login.php';
        else
            require_once 'principal.php';
    }

    require_once 'foot.php';
?>