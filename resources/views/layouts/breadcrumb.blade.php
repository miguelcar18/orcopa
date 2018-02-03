<!-- Blank Header -->
<div class="block-header">
    <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
    <a href="" class="header-title-link">
        <h1>
            @if(isset($tituloModulo))
            <i class="{{ $iconoModulo }} animation-expandUp"></i>{{ $tituloModulo }}<br>
            @else
            <i class="glyphicon-home animation-expandUp"></i>Inicio<br>
            @endif
            @if(isset($tituloSubmodulo))
            <small>{{ $tituloSubmodulo }}</small>
            @endif
        </h1>
    </a>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><i class="icon-file-alt"></i></li>
    <li><a href="{{ URL::route('principal') }}">Inicio</a></li>
    @if(isset($tituloModulo))
    <li>
        @if(isset($tituloSubmodulo))
        <a href="{{ $rutaModulo }}">{{ $tituloModulo }}</a>
        @else
        {{ $tituloModulo }}
        @endif
    </li>
    @endif
    @if(isset($tituloSubmodulo))
    <li>{{ $tituloSubmodulo }}</li>
    @endif
</ul>
<!-- END Blank Header -->