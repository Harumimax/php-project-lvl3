<!doctype html>
<html lang="en" class="h-100">
  <head>
    @include('shared.metatags')
    
    <title>Page Analizer by HarumiMax</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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

    <main class="flex-grow-1 bg-white">
    
    @if (Session::has('flash_message'))
    <div class="alert alert-success">
        <ul>    
            <li>{{ Session::get('flash_message') }}</li>
        </ul>
      </div>                 
    @endif

    @yield('content')
    
    </main>

    <footer class="navbar-fixed-bottom">

      <hr>
      <center>Created by <a class="link-secondary" href="https://github.com/Harumimax">HarumiMax</a></center>

    </footer>

  </body>
</html>
