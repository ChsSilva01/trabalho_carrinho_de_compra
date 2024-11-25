<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="logoLogin"><img src='./img/logo_vale_fish.png' style="width: 4vw; height: 9vh">ValeFish</div>
        <div class="areaLogin">
            <div class="container containerLogin">
                <p class="tituloLogin">Login</p>
                <form action="../controller/funcao-login.php" method="POST">
                   
                    <input type="text" class="form-control mt-5 input" name="campo_email" placeholder="Email">
                    
                    <input type="text" class="form-control mt-5 input" name="campo_senha" placeholder="Senha">

                    <div class="container mt-5 d-flex justify-content-center ">
                        <input type="submit" value="Entrar" href="" class="btn botao">
                    </div>
                </form>
            </div>
        </div>
        <div class="areaEnfeite">

        </div>
    </div>
</body>
</html>