<!doctype html>
<html lang="en" class="h-100">
  <head>
    @include('shared.metatags')

    <title>Page Analizer by HarumiMax</title>

  </head>
<body class="d-flex flex-column h-100">
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://harumimax-project-3.herokuapp.com/">Analizer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/domains">All Domains</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
</header>


<main class="flex-shrink-0 bg-light">
  <div class="container">
    <div><br><br><br>
    <h1 class="display-4">Page Analizer</h1>
    <p class="lead">Please enter url you wont to analize</p>
        
    <form action="https://harumimax-project-3.herokuapp.com/domains" method="post" class="d-flex justify-content-center">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="domain[name]" class="form-control mb-3" placeholder="https://www.example.com">
        <button class="btn btn-outline-secondary" type="submit">Check</button>
      </div>

    </form>
  </div>
</main>





<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
      <hr>
    <center>Created by <a class="link-secondary" href="https://github.com/Harumimax">HarumiMax</a></center>
  </div>
</footer>


  </body>
</html>
