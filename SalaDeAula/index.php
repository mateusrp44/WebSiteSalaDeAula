<!DOCTYPE html>
<html>
    <head>
        <title>AppSalaAula - Área Reservada</title>
        <meta charset="UTF-8">
        <!-- Carregando o CSS do Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Carregando a fonte Material Design para visualização dos ícones do Google Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Fonte Coming Soon-->
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet"> 
        <!-- CSS do Projeto -->
        <link href="css/estilo.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/alphabet.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: tan">
            <a class="navbar-brand" href="index.php">AppSalaAula</a>
            <a class="navbar-brand" href="adiciona-usuario.php"><i class="material-icons vertical-align-middle">account_box</i> Junte-se a nós</a>
        </nav>
        <!-- Formulário de Acesso -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="text-center" name="formLogin" method="post" action="login.php" >      
                        <canvas id="myCanvas"></canvas>
                        <!--script type="text/javascript" src="js/bubbles.js"></script>
                        <script type="text/javascript" src="js/index.js"></script-->
                        <h1 class="h3 mb-3 font-weight-normal" style="font-family: 'Coming Soon', cursive">\o/ Para começar, inicie a sua sessão! =)</h1>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de email" required autofocus >
                        <br>
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                        <br>
                        <button class="btn btn-lg btn-success btn-block" type="submit" id="login" name="login"><i class="material-icons vertical-align-middle" href="menu.php">lock_open</i> Acessar</button>
                        <br>
                        <p class="text-muted">&copy; Todos os direitos reservados <?php echo date('Y'); ?> </p>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'rodape.php'; ?>