<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <title>Подключение Bootstrap</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="#">Analizer</a>
        
            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">All Domains</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="jumbotron">
            <h1 class="display-4">Page Analizer</h1>
            <p class="lead">Please enter url you wont to analize</p>
            <hr class="my-4">
            <form action="http://page-analizer.herokuapp.com/domains" method="post">
                <input type="text" id="domain" name="domain" class="form-control mb-3" placeholder="Url">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Analize</button>
            </form>
    
            
    
        </div>
    </div>
    </main>

    <footer class="border-top py-3 mt-5">
        <div class="container-lg">
            <div class="text-center">
                created by
                <a href="https://hexlet.io/pages/about" target="_blank">Hexlet</a>
            </div>
        </div>
    </footer>


</body>
</html>