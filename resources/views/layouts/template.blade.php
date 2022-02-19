<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('page-title')</title>

  <!-- custom css -->
  <link rel="stylesheet" href="css/app.css">


  <!-- google material icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body id="app">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="/img/logo.png" width="200" height="35" alt="CendrassosBNBLogo">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="/">
          Inici
        </a>

        <a class="navbar-item" href="/aboutUs">
          Sobre nosaltres
        </a>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
    
          <div class="buttons">
            @if (!isset(Auth::user()->name))
            <a class="button is-primary" href="/register"><strong>Registra't</strong></a>
            <a class="button is-light" href="/login">
              Accedir
            </a>
            @else
              <select name="" id="userDropdownNav" class="navbar-item dropdownNav">
                <option value="-" selected="true" hidden user_id="{{ Auth::user()->id }}"> {{ ucfirst(Auth::user()->name) }}</option>
                <option value="Allotjaments">Allotjaments</option>
                <option value="Reserves">Reserves</option>
                <option value="Favorits">Favorits</option>
                <option value="Logout">Tancar sessió</option>
              </select>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            @endif

          </div>
        </div>

      </div>
    </div>
  </nav>
  @yield('body')
  
  <footer class="footer">
    <div class="ajustar-footer">
      <a href="/">
        <img class="img-footer" src="/img/logo.png" alt="CendrassosBNBLogo">
      </a>
      <a href="https://wapps.cat/">
        <img class="img-footer" src="/img/websalpunt_puntcat.png" alt="WebsAlPunt.catconcurs">
      </a>
      <a href="https://ca.dinahosting.com/">
        <img class="dinahosting-logo" src="/img/dinahosting_logo.png" alt="DinahostingLogo.Hosting">
      </a>
    </div>
  </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>