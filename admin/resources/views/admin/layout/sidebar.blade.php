<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" width="180px" height="auto">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
            <div class="info">
                <a href="#" class="d-block">
                    @if(Auth::user())
                    Olá, {{ Auth::user()->name }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Início
                        </p>
                    </a>
                </li>

                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Minha conta
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('users.edit', Auth::user()->id ) }}" class="nav-link">
                                <p>
                                    Atualizar dados pessoais
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                        <a href="{{ route('edit-password') }}" class="nav-link">
                                <p>
                                    Alterar senha
                                </p>
                            </a>
                        </li>
                    </ul>

                </li>

                <hr>

                @can('isAdmin')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Médicos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('doctors.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctors.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Pacientes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('patients.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patients.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-clock"></i>
                        <p>
                            Recepcionistas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('receptionists.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('receptionists.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-capsules"></i>
                        <p>
                            Medicamentos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('medicaments.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('medicaments.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flask"></i>
                        <p>
                            Responsáveis (Lab)
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('responsibles.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('responsibles.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flask"></i>
                        <p>
                            Laboratórios
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('laboratories.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laboratories.create') }}" class="nav-link">
                                <p>Adicionar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>
                @endcan

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Agendamentos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('attendances.index') }}" class="nav-link">
                                <p>Ver todos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('attendances.create') }}" class="nav-link">
                                <p>Agendar consulta</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-syringe"></i>
                        <p>
                            Exames e prescrições
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('results.index') }}" class="nav-link">
                                <p>
                                    Resultado de exame
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('index-prescriptions-exams') }} " class="nav-link">
                                <p>
                                    Prescrição de exame
                                </p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('index-prescriptions-medicaments') }} " class="nav-link">
                                <p>
                                    Prescrição de medicamento
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>


                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Sair</p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
