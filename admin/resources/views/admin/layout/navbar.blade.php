 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

       <!-- TODO: remover isso. (é apenas para facilitar o desenvolvimento) -->
        <li class="nav-item">
            <strong class="nav-link"> Função: {{ Auth::user()->role->name}} </strong>
        </li>
    </ul>

 </nav>
 <!-- /.navbar -->
