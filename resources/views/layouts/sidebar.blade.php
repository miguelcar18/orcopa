<!-- Left Sidebar -->
<div id="sidebar-left" class="enable-hover">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        {{--
        <!-- Search Form -->
        <form action="page_ready_search_results.html" method="post" class="sidebar-search">
            <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
        </form>
        <!-- END Search Form -->
        --}}
        <!-- Wrapper for scrolling functionality -->
        <div class="sidebar-left-scroll">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <h2 class="sidebar-header">Bienvenido</h2>
                </li>
                <li>
                    <a href="{{ URL::route('principal') }}" @if(Route::getCurrentRoute()->getName() == 'principal')) class="active" @endif ><i class="glyphicon-home"></i>Panel de control</a>
                </li>
                <li @if(Route::getCurrentRoute()->getName() == 'tutores.index' or  Route::getCurrentRoute()->getName() == 'tutores.show' or Route::getCurrentRoute()->getName() == 'tutores.edit' or Route::getCurrentRoute()->getName() == 'tutores.create')) class="active" @endif >
                    <a href="#" class="menu-link"><i class="glyphicon-briefcase"></i>Tutores</a>
                    <ul>
                        <li>
                            <a href="{{ URL::route('tutores.index') }}" @if(Route::getCurrentRoute()->getName() == 'tutores.index' or  Route::getCurrentRoute()->getName() == 'tutores.show' or Route::getCurrentRoute()->getName() == 'tutores.edit')) class="active" @endif >Mostrar listado</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('tutores.create') }}" @if(Route::getCurrentRoute()->getName() == 'tutores.create')) class="active" @endif >Registrar</a>
                        </li>
                    </ul>
                </li>
                <li @if(Route::getCurrentRoute()->getName() == 'empresas.index' or  Route::getCurrentRoute()->getName() == 'empresas.show' or Route::getCurrentRoute()->getName() == 'empresas.edit' or Route::getCurrentRoute()->getName() == 'empresas.create')) class="active" @endif >
                    <a href="#" class="menu-link"><i class="glyphicon-bank"></i>Empresas</a>
                    <ul>
                        <li>
                            <a href="{{ URL::route('empresas.index') }}" @if(Route::getCurrentRoute()->getName() == 'empresas.index' or  Route::getCurrentRoute()->getName() == 'empresas.show' or Route::getCurrentRoute()->getName() == 'empresas.edit')) class="active" @endif >Mostrar listado</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('empresas.create') }}" @if(Route::getCurrentRoute()->getName() == 'empresas.create')) class="active" @endif >Registrar</a>
                        </li>
                    </ul>
                </li>
                <li @if(Route::getCurrentRoute()->getName() == 'pasantes.index' or  Route::getCurrentRoute()->getName() == 'pasantes.show' or Route::getCurrentRoute()->getName() == 'pasantes.edit' or Route::getCurrentRoute()->getName() == 'pasantes.create')) class="active" @endif >
                    <a href="#" class="menu-link"><i class="glyphicon-address_book"></i>Pasantes</a>
                    <ul>
                        <li>
                            <a href="{{ URL::route('pasantes.index') }}" @if(Route::getCurrentRoute()->getName() == 'pasantes.index' or  Route::getCurrentRoute()->getName() == 'pasantes.show' or Route::getCurrentRoute()->getName() == 'pasantes.edit')) class="active" @endif >Mostrar listado</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('pasantes.create') }}" @if(Route::getCurrentRoute()->getName() == 'pasantes.create')) class="active" @endif >Registrar</a>
                        </li>
                    </ul>
                </li>
                <li @if(Route::getCurrentRoute()->getName() == 'usuarios.index' or  Route::getCurrentRoute()->getName() == 'usuarios.show' or Route::getCurrentRoute()->getName() == 'usuarios.edit' or Route::getCurrentRoute()->getName() == 'usuarios.create')) class="active" @endif >
                    <a href="#" class="menu-link"><i class="glyphicon-group"></i>Usuarios</a>
                    <ul>
                        <li>
                            <a href="{{ URL::route('usuarios.index') }}" @if(Route::getCurrentRoute()->getName() == 'usuarios.index' or  Route::getCurrentRoute()->getName() == 'usuarios.show' or Route::getCurrentRoute()->getName() == 'usuarios.edit')) class="active" @endif >Mostrar listado</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('usuarios.create') }}" @if(Route::getCurrentRoute()->getName() == 'usuarios.create')) class="active" @endif >Registrar</a>
                        </li>
                    </ul>
                </li>
                <li @if(Route::getCurrentRoute()->getName() == 'respaldar' or  Route::getCurrentRoute()->getName() == 'importar')) class="active" @endif >
                    <a href="#" class="menu-link"><i class="glyphicon-show_big_thumbnails"></i>Base de datos</a>
                    <ul>
                        <li>
                            <a href="{{ URL::route('respaldar') }}" @if(Route::getCurrentRoute()->getName() == 'respaldar')) class="active" @endif >Respaldar</a>
                        </li>
                        {{--
                        <li>
                            <a href="{{ URL::route('importar') }}" @if(Route::getCurrentRoute()->getName() == 'importar')) class="active" @endif >Importar</a>
                        </li>
                        --}}
                    </ul>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Sidebar Content -->
</div>
<!-- END Left Sidebar -->