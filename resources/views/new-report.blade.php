@extends('main')
@section('content')
<h1>Notificar extravío</h1>

<form method="post" action="{{ route('report.store') }}" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            @csrf
            <h4>Datos personales</h4>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required/>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellido_paterno" required/>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellido_materno"/>
            </div>
            <div class="form-group">
                <label for="identificacion">Identificación oficial:</label>
                <input type="file" class="form-control" name="identificacion" required/>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" required/>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="text" class="form-control" name="email"/>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Domicilio</h4>
            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" name="calle" required/>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" required/>
            </div>
            <div class="form-group">
                <label for="num_interior">Número interior:</label>
                <input type="text" class="form-control" name="num_interior"/>
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código postal:</label>
                <input type="text" class="form-control" name="codigo_postal" required/>
            </div>
            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" class="form-control" name="municipio" required/>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" required/>
            </div>
        </div>
        
        <h3 class="col-md-12">Detalles del extravío</h3>
        <div class="col-md-6">
            <h4>Descripción del objeto extraviado</h4>
            <h5>Tipo de objeto</h5>
                @foreach($objectTypes as $type)
                <div class="form-check">
                    <input class="form-check-input" id="tipo_{{ $type->id }}" type="radio" name="tipo_objeto" value="{{ $type->id }}"/>
                    <label class="form-check-label" for="tipo_{{ $type->id }}">{{ $type->nombre }}</label>
                </div>
                @endforeach
            <div class="form-group">
                <label for="nombre_objeto">Nombre del objeto:</label>
                <input type="text" class="form-control" name="nombre_objeto" required/>
            </div>
            <div class="form-group">
                <label for="descripcion_objeto">Descripción del objeto:</label>
                <textarea name="descripcion_objeto" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de extravío:</label>
                <input type="date" class="form-control" name="fecha" required/>
            </div>
            <h4>Detalles del acontecimiento</h4>
             <div class="form-group">
                <label for="descripcion_hechos">Descripción de los hechos:</label>
                <textarea name="descripcion_hechos" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Lugar de los acontecimientos</h4>
                <div class="form-group">
                    <label for="calle_hechos">Calle:</label>
                    <input type="text" class="form-control" name="calle_hechos"/>
                </div>
                <div class="form-group">
                    <label for="numero_hechos">Número:</label>
                    <input type="text" class="form-control" name="numero_hechos"/>
                </div>
                <div class="form-group">
                    <label for="num_interior_hechos">Número interior:</label>
                    <input type="text" class="form-control" name="num_interior_hechos"/>
                </div>
                <div class="form-group">
                    <label for="codigo_postal_hechos">Código postal:</label>
                    <input type="text" class="form-control" name="codigo_postal_hechos"/>
                </div>
                <div class="form-group">
                    <label for="municipio_hechos">Municipio:</label>
                    <input type="text" class="form-control" name="municipio_hechos"/>
                </div>
                <div class="form-group">
                    <label for="estado_hechos">Estado:</label>
                    <input type="text" class="form-control" name="estado_hechos"/>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <input type="submit" value="Registrar" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</form>
@stop