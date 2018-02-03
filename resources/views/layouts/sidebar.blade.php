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
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Sidebar Content -->
</div>
<!-- END Left Sidebar -->