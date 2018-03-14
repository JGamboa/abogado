<li>
    @if(Session::has('empresa_razon_social'))
        <a href="{{route('empresas.seleccionar')}}"><span style="font-size:10px;">{{ session('empresa_razon_social') }}</span></a>
    @else
        <a href="{{route('empresas.seleccionar')}}"><span style="font-size:10px;">Seleccionar Empresa</span></a>
    @endif
</li>
<li class="{{ Request::is('generator_builder') ? 'active' : '' }}">
    <a href="generator_builder"><i class="fa fa-user"></i><span>Generator</span></a>
</li>
<li class="{{ Request::is('admin') ? 'active' : '' }}">
    <a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}"><i class="fa fa-user-plus"></i><span>Administración de Usuarios</span></a>
</li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

<li class="{{ Request::is('pais*') ? 'active' : '' }}">
    <a href="{!! route('pais.index') !!}"><i class="fa fa-edit"></i><span>Pais</span></a>
</li>

<li class="{{ Request::is('regiones*') ? 'active' : '' }}">
    <a href="{!! route('regiones.index') !!}"><i class="fa fa-edit"></i><span>Regiones</span></a>
</li>

<li class="{{ Request::is('provincias*') ? 'active' : '' }}">
    <a href="{!! route('provincias.index') !!}"><i class="fa fa-edit"></i><span>Provincias</span></a>
</li>

<li class="{{ Request::is('comunas*') ? 'active' : '' }}">
    <a href="{!! route('comunas.index') !!}"><i class="fa fa-edit"></i><span>Comunas</span></a>
</li>

<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
</li>
<li class="{{ Request::is('sucursales*') ? 'active' : '' }}">
    <a href="{!! route('sucursales.index') !!}"><i class="fa fa-edit"></i><span>Sucursales</span></a>
</li>

<li class="{{ Request::is('empleados*') ? 'active' : '' }}">
    <a href="{!! route('empleados.index') !!}"><i class="fa fa-edit"></i><span>Empleados</span></a>
</li>

<li class="{{ Request::is('isapres*') ? 'active' : '' }}">
    <a href="{!! route('isapres.index') !!}"><i class="fa fa-edit"></i><span>Isapres</span></a>
</li>

<li class="{{ Request::is('materias*') ? 'active' : '' }}">
    <a href="{!! route('materias.index') !!}"><i class="fa fa-edit"></i><span>Materias</span></a>
</li>

<li class="{{ Request::is('cortes*') ? 'active' : '' }}">
    <a href="{!! route('cortes.index') !!}"><i class="fa fa-edit"></i><span>Cortes</span></a>
</li>

<li class="{{ Request::is('intervinientes*') ? 'active' : '' }}">
    <a href="{!! route('intervinientes.index') !!}"><i class="fa fa-edit"></i><span>Intervinientes</span></a>
</li>

