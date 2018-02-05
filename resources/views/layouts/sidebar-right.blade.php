<!-- Right Sidebar -->
<div id="sidebar-right">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- User Info -->
        <div class="user-info">
            <div class="user-details">
                <a href="javascript:void(0)">{!! Auth::user()->name !!}</a><br>
                @if(Auth::user()->name == 1)
                <em>Administrador</em>
                @elseif(Auth::user()->name == 0)
                <em>Usuario</em>
                @endif
            </div>
            @if(Auth::user()->path == '')
            <img src="{{ asset('uploads/usuarios/unfile.jpg') }}" alt="Avatar" name="fotoNavbar" id="fotoNavbar" width="40px" height="40px">
            @else
            <img src="{{ asset('uploads/usuarios/'.Auth::user()->path) }}" alt="Avatar" name="fotoNavbar" id="fotoNavbar" width="40px" height="40px">
            @endif
        </div>
        <!-- END User Info -->

        <!-- Wrapper for scrolling functionality -->
        <div class="sidebar-right-scroll">
            <!-- User Menu -->
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ URL::route('usuarios.show', Auth::user()->id) }}"><i class="icon-edit-sign"></i> Perfil</a>
                </li>
                <li>
                    <a href="{{ URL::route('change_password') }}"><i class="icon-cog"></i> Cambiar contraseña</a>
                </li>
                <li>
                    <a href="{{ URL::route('logout') }}"><i class="icon-off"></i> Cerrar sesión</a>
                </li>
            </ul>
            <!-- END User Menu -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Sidebar Content -->
</div>
<!-- END Right Sidebar -->