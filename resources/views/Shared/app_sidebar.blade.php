<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">Menu Navegación</div>
    <i class="icon-menu" title="Main"></i>
</li>
<li class="nav-item" data-popup="tooltip" title="INICIO">
    <a href="{{route('Inicio.Listar')}}" class="nav-link">
        <i class="icon-home"></i>
        <span>INICIO</span>
    </a>
</li>
<li class="nav-item" data-popup="tooltip" title="BUSCAR">
    <a href="{{route('Documento.Filtro')}}" class="nav-link">
        <i class="icon-search4"></i>
        <span>BUSCAR</span>
    </a>
</li>
<li class="nav-item" data-popup="tooltip" title="REPORTE">
    <a href="{{route('Reporte.Documento')}}" class="nav-link">
        <i class="icon-file-stats"></i>
        <span>REPORTE</span>
    </a>
</li>
<li class="nav-item" data-popup="tooltip" title="MONITOREO">
    <a href="{{route('Monitoreo.Listar')}}" class="nav-link">
        <i class="icon-statistics"></i>
        <span>MONITOREO</span>
    </a>
</li>