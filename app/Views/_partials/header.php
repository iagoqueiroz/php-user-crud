<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=URL?>css/app.css" >

        <title>Simple MVC Users</title>
    </head>
    <body>
        <header class="container d-flex justify-content-end">
            <?php if(isset($_SESSION['user_logged'])): ?>
                <div class="user-logged float-right">
                    Bem vindo, <strong><?=$_SESSION['user_info']['name']?></strong> ! <a href="<?=URL?>login/logout">Deslogar</a>
                </div>
            <?php endif; ?>
        </header>