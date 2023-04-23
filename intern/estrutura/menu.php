<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./conf/format/estiloMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="menu">
        <nav>
            <ul>
                <?php 
                    //Array com os códigos de perfis permitidos para cada menu.
                    $menuCadPedido = array("GER","OPE");
                    $menuPedidos = array("GER","OPE","FIN");
                    $menuAdmin = array("GER");
                    $menuCardapio = array("GER","LOG");

                    //If para validar se o perfil do usuário logado libera o menu.
                    echo  in_array($_SESSION["sessaoPerfil"], $menuCadPedido) ? "<li><a href='cadastropedido.php'><i class='fa-solid fa-pizza-slice'></i> Cadastro de Pedidos</a></li>" : "";
                    echo  in_array($_SESSION["sessaoPerfil"], $menuPedidos) ? "<li><a href='pedidos.php'><i class='fa-solid fa-table'></i> Pedidos</a></li>" : "";
                    echo  in_array($_SESSION["sessaoPerfil"], $menuAdmin) ? "<li><a href='administracao.php'><i class='fa-solid fa-gears'></i></i> Administração</a></li>" : "";
                    echo  in_array($_SESSION["sessaoPerfil"], $menuCardapio) ? "<li><a href='cardapio.php'><i class='fa-solid fa-table-columns'></i></i> Cardápio</a></li>" : "";
                ?>
            </ul>
        </nav>
	</div>
</body>
</html>