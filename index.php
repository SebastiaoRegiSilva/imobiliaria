<?php
    require_once 'controller/UsuarioController.php';   
    require_once 'controller/ImovelController.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title>Imobiliária alvorecer.</title>
    <!-- <link rel="icon" href="assets/img/icon.png"> -->

    <style>
        /* Style The Dropdown Button */
        .dropbtn {
        background-color: blue;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 40px;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
        position: relative;
        display: inline-block;
        
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
        display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
        background-color: black;
        }
    </style>

</head>
<body>
    <div style="margin-top: 50px; margin-right: 240px;">
        <ul class="nav justify-content-end nav-pills">
            <span class="navbar-brand mb-0 h1" style="margin-right:63%;">Imobiliária alvorecer</span>
            <li class="nav-item">
                <a class="nav-link  " href="index.php" style="color: black;">Início</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="dropbtn">Usuário</button>
                    <div class="dropdown-content">
                        <a href="?action=usuarioNovo">Novo</a>
                        <a href="?action=usuarioListar">Listar</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="dropbtn">Imóvel</button>
                    <div class="dropdown-content">
                        <a href="?action=imovelNovo">Novo</a>
                        <a href="?action=imovelListar">Listar</a>
                    </div>
                </div>
            </li>
        </ul>  
    </div>

<?php

    if(isset($_GET['action'])){

        // Usuário
        if($_GET['action'] == 'usuarioEditar'){
            $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
            require_once 'view/cadUsuario.php';
        }
        if($_GET['action'] == 'usuarioListar'){
            require_once 'view/listUsuario.php';
        }
        if($_GET['action'] == 'usuarioExcluir'){
            $usuario = call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
            require_once 'view/listUsuario.php';
        }

        if($_GET['action'] == 'usuarioNovo'){
            require_once 'view/cadUsuario.php';
        }

        //IMOVEL
        if($_GET['action'] == 'imovelExcluir'){
            $imovel = call_user_func(array('ImovelController', 'excluir'), $_GET['id']);
            require_once 'view/listImovel.php';
        }
        if($_GET['action'] == 'imovelListar'){
            require_once 'view/listImovel.php';
        }

        if($_GET['action'] == 'imovelEditar'){
            $imovel = call_user_func(array('ImovelController', 'editar'), $_GET['id']);
            require_once 'view/cadImovel.php';
        }

        if($_GET['action'] == 'imovelNovo'){
            require_once 'view/cadImovel.php';
        }

    }
    else
    {
        ?>  
            <br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <img class="d-block w-100" src="assets/img/1.png" alt="Second slide">
                </div>
            </div>
        <?php
    }
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>