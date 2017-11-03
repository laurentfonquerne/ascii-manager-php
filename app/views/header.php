<!DOCTYPE html>

<html>
    <head>
        <title>ASCII</title>
        <base href="http://localhost/php_formation/web/">
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.css"/>
        <style>
    table {
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
    }
</style>
    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./admin/fonts?action=manage">ASCII</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./admin/fonts?action=manage">FONTS</a></li>
                <li><a href="./admin/characters?action=manage">CHARACTERS</a></li>
                <li><a href="./admin/symbols?action=manage">SYMBOLS</a></li>
                 <?php if (isset($user) && $user) : ?>
                    <li><a href="./auth?action=destroy&token=<?= $token ?>"
                    class="glyphicon glyphicon-remove-circle btn btn-danger"></a></li>
                <?php else: ?>
                    <li><a href="./auth?action=auth"
                    class="glyphicon glyphicon-remove-circle btn btn-success"></a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <main>