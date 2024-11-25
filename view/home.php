<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <title>Carrinho de compra</title>
</head>
<body>
   
<nav class="navbar navbar-expand-sm navLoja">
  <div class="container-fluid">
    <span class="navbar-text"><img src='./img/logo_vale_fish.png' class="logoLoja"></span>
    <span class="navbar-text"><h2>Bem-vindo(a)</h2></span>
    <button type="button" class="menu-button" id="toggleMenu" style="background-color: transparent; border: none; resize: none; outline: none;"><i class="bi bi-cart iconCarrinho"></i>
    </button>
    <div class="menu" id="sideMenu">
        <?php
            include("../controller/funca-listar-produtos.php");
            include("../model/connect.php");
            $cookie_name = "carrinho";

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["produto_id"])) {
                $carrinho = isset($_COOKIE[$cookie_name]) ? json_decode($_COOKIE[$cookie_name], true) : [];
                $carrinho[] = $_POST["produto_id"];
                setcookie($cookie_name, json_encode($carrinho), time() + 86400, "/");
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["remove_id"])) {
                $carrinho = isset($_COOKIE[$cookie_name]) ? json_decode($_COOKIE[$cookie_name], true) : [];
                if (($key = array_search($_POST["remove_id"], $carrinho)) !== false) {
                    unset($carrinho[$key]); 
                }
                setcookie($cookie_name, json_encode(array_values($carrinho)), time() + 86400, "/");
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }   

            if (isset($_COOKIE[$cookie_name])) {
                $carrinho = json_decode($_COOKIE[$cookie_name], true);
                echo "Itens no Carrinho:";
                foreach ($carrinho as $item) {
                    echo "
                    <div style='width: 100%; height: 8vh; border: 1px solid #000; display: flex; flex-direction: row; justify-content: center;'>
                            <div>$item</div>    
                            <div>
                                <form method='POST' action='" . $_SERVER['PHP_SELF'] . "' style='display:inline;'>
                                    <input type='hidden' name='remove_id' value='$item'>
                                    <button type='submit' class='remove-button'><img src='./img/simbolo.png' width='10' height='10'></button>
                                </form>
                            </div>
                    </div>";
                }
            } else {
                echo "Carrinho vazio.";
            }
        ?>
    </div>
  </div>
</nav>
<img src='./img/img_decorativa.png' class="imgDecorativa">
    <?php
        session_start();

     
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php");
            exit(); 
        }
    ?>

<div class="divItens"> 
    <div class="divNovidades">Novidades</div>
    <div class="cardOrganizacoes">
        <?php funcaoProdutos() ?>
    </div>
</div>
    <script>
        const menuButton = document.getElementById('toggleMenu');
        const sideMenu = document.getElementById('sideMenu');

        menuButton.addEventListener('click', function() {
            sideMenu.classList.toggle('open');
        });
    </script>
</body>
</html>
