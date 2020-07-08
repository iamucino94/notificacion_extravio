@extends('main')
@section('content')
<h1>Detalle de reporte</h1>
    <h3>Status: {{ $report->status->nombre }}</h3>
    <div class="row">
        <div class="col-md-6">
            @csrf
            <h4>Datos personales</h4>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required value="{{ $report->propietario->nombre }}"/>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellido_paterno" required value="{{ $report->propietario->apellido_paterno }}"/>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellido_materno" value="{{ $report->propietario->apellido_materno }}"/>
            </div>
            <div class="form-group">
                <label for="identificacion">Identificación oficial:</label>
                <a href="data:image/jpg;base64,{{ $report->propietario->identificacion }}" target="_blank">Ver imagen</a> 
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" required value="{{ $report->propietario->telefono }}"/>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="text" class="form-control" name="email" value="{{ $report->propietario->email }}"/>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Domicilio</h4>
            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" name="calle" required value="{{ $report->propietario->domicilio->calle }}"/>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" required value="{{ $report->propietario->domicilio->numero }}"/>
            </div>
            <div class="form-group">
                <label for="num_interior">Número interior:</label>
                <input type="text" class="form-control" name="num_interior" value="{{ $report->propietario->domicilio->num_interior }}"/>
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código postal:</label>
                <input type="text" class="form-control" name="codigo_postal" required value="{{ $report->propietario->domicilio->codigo_postal }}"/>
            </div>
            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" class="form-control" name="municipio" required value="{{ $report->propietario->domicilio->municipio }}"/>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" required value="{{ $report->propietario->domicilio->estado }}"/>
            </div>
        </div>
        
        <h3 class="col-md-12">Detalles del extravío</h3>
        <div class="col-md-6">
            <h4>Descripción del objeto extraviado</h4>
            <h5>Tipo de objeto</h5>
            <span>{{ $report->objeto_extraviado->tipo->nombre }}</span>
            <div class="form-group">
                <label for="nombre_objeto">Nombre del objeto:</label>
                <input type="text" class="form-control" name="nombre_objeto" required value="{{ $report->objeto_extraviado->nombre }}"/>
            </div>
            <div class="form-group">
                <label for="descripcion_objeto">Descripción del objeto:</label>
                <textarea name="descripcion_objeto" class="form-control">{{ $report->objeto_extraviado->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de extravío:</label>
                <input type="date" class="form-control" name="fecha" required value="{{ $report->fecha }}"/>
            </div>
            <h4>Detalles del acontecimiento</h4>
             <div class="form-group">
                <label for="descripcion_hechos">Descripción de los hechos:</label>
                <textarea name="descripcion_hechos" class="form-control">{{ $report->descripcion }}</textarea>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Lugar de los acontecimientos</h4>
                <div class="form-group">
                    <label for="calle_hechos">Calle:</label>
                    <input type="text" class="form-control" name="calle_hechos" value="{{ $report->lugar->calle }}"/>
                </div>
                <div class="form-group">
                    <label for="numero_hechos">Número:</label>
                    <input type="text" class="form-control" name="numero_hechos" value="{{ $report->lugar->numero }}"/>
                </div>
                <div class="form-group">
                    <label for="num_interior_hechos">Número interior:</label>
                    <input type="text" class="form-control" name="num_interior_hechos" value="{{ $report->lugar->num_interior }}"/>
                </div>
                <div class="form-group">
                    <label for="codigo_postal_hechos">Código postal:</label>
                    <input type="text" class="form-control" name="codigo_postal_hechos" value="{{ $report->lugar->codigo_postal }}"/>
                </div>
                <div class="form-group">
                    <label for="municipio_hechos">Municipio:</label>
                    <input type="text" class="form-control" name="municipio_hechos" value="{{ $report->lugar->municipio }}"/>
                </div>
                <div class="form-group">
                    <label for="estado_hechos">Estado:</label>
                    <input type="text" class="form-control" name="estado_hechos" value="{{ $report->lugar->estado }}"/>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <a href="/report/{{ $report->id}}/accept" class="btn btn-primary">Aceptar</a>
                <a href="/report/{{ $report->id}}/send_correction" class="btn btn-secondary">Marcar para corrección</a>
            </div>
        </div>
    </div>
@stop