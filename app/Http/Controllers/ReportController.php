<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = \App\Reporte::all();
        return \View::make('reports')->with("reports", $reports);
    }
    
    public function create()
    {
        $objectTypes = \App\TipoObjeto::all();
        return \View::make('new-report')->with("objectTypes", $objectTypes);
    }

    public function store(Request $request)
    {
        $path = $request->file('identificacion')->getRealPath();
        $img = file_get_contents($path);
        $base64 = base64_encode($img);

        $personAddress = new \App\Direccion;
        $personAddress->calle = $request->input('calle');
        $personAddress->numero = $request->input('numero');
        $personAddress->num_interior = $request->input('num_interior');
        $personAddress->codigo_postal = $request->input('codigo_postal');
        $personAddress->municipio = $request->input('municipio');
        $personAddress->estado = $request->input('estado');
        $personAddress->save();

        $personalInfo = new \App\DatosPersonales;
        $personalInfo->nombre = $request->input('nombre');
        $personalInfo->apellido_paterno = $request->input('apellido_paterno');
        $personalInfo->apellido_materno = $request->input('apellido_materno');
        $personalInfo->identificacion = $base64;
        $personalInfo->telefono = $request->input('telefono');
        $personalInfo->email = $request->input('email');
        $personalInfo->domicilio()->associate($personAddress);
        $personalInfo->save();

        $missingObject = new \App\ObjetoExtraviado;
        $missingObject->tipo()->associate(\App\TipoObjeto::where('id', $request->input('tipo_objeto'))->first());
        $missingObject->nombre = $request->input('nombre_objeto');
        $missingObject->descripcion = $request->input('descripcion_objeto');
        $missingObject->save();
        
        $eventAddress = new \App\Direccion;
        $eventAddress->calle = $request->input('calle_hechos');
        $eventAddress->numero = $request->input('numero_hechos');
        $eventAddress->num_interior = $request->input('num_interior_hechos');
        $eventAddress->codigo_postal = $request->input('codigo_postal_hechos');
        $eventAddress->municipio = $request->input('municipio_hechos');
        $eventAddress->estado = $request->input('estado_hechos');
        $eventAddress->save();

        $report = new \App\Reporte;
        $report->fecha = $request->input('fecha');
        $report->descripcion = $request->input('descripcion_hechos');
        $report->propietario()->associate($personalInfo);
        $report->lugar()->associate($eventAddress);
        $report->status()->associate(\App\ReporteStatus::where('id', 1)->first());
        $report->objeto_extraviado()->associate($missingObject);

        $report->save();        
        return back();
    }

    public function show($id)
    {
        $report = \App\Reporte::where('id', $id);
        return \View::make('report-detail')->with("report", $report);
    }

    public function edit($id)
    {
        $report = \App\Reporte::where('id', $id);
        return \View::make('report-detail')->with("report", $report);
    }

    public function update(Request $request, $id)
    {
        $path = $request->file('identificacion')->getRealPath();
        $img = file_get_contents($path);
        $base64 = base64_encode($img);

        $personAddress = new \App\Direccion;
        $personAddress->calle = $request->input('calle');
        $personAddress->numero = $request->input('numero');
        $personAddress->num_interior = $request->input('num_interior');
        $personAddress->codigo_postal = $request->input('codigo_postal');
        $personAddress->municipio = $request->input('municipio');
        $personAddress->estado = $request->input('estado');
        $personAddress->save();

        $personalInfo = new \App\DatosPersonales;
        $personalInfo->nombre = $request->input('nombre');
        $personalInfo->apellido_paterno = $request->input('apellido_paterno');
        $personalInfo->apellido_materno = $request->input('apellido_materno');
        $personalInfo->identificacion = $base64;
        $personalInfo->telefono = $request->input('telefono');
        $personalInfo->email = $request->input('email');
        $personalInfo->domicilio()->associate($personAddress);
        $personalInfo->save();

        $missingObject = new \App\ObjetoExtraviado;
        $missingObject->tipo()->associate(\App\TipoObjeto::where('id', $request->input('tipo_objeto'))->first());
        $missingObject->nombre = $request->input('nombre_objeto');
        $missingObject->descripcion = $request->input('descripcion_objeto');
        $missingObject->save();
        
        $eventAddress = new \App\Direccion;
        $eventAddress->calle = $request->input('calle_hechos');
        $eventAddress->numero = $request->input('numero_hechos');
        $eventAddress->num_interior = $request->input('num_interior_hechos');
        $eventAddress->codigo_postal = $request->input('codigo_postal_hechos');
        $eventAddress->municipio = $request->input('municipio_hechos');
        $eventAddress->estado = $request->input('estado_hechos');
        $eventAddress->save();

        $report = \App\Reporte::where('id', $id);
        $report->fecha = $request->input('fecha');
        $report->descripcion = $request->input('descripcion_hechos');
        $report->propietario()->associate($personalInfo);
        $report->lugar()->associate($eventAddress);
        $report->status()->associate(\App\ReporteStatus::where('id', 1)->first());
        $report->objeto_extraviado()->associate($missingObject);

        $report->update();        
        return back();
    }

    public function destroy($id)
    {
        $report = \App\Reporte::findOrFail($id);
        $report->delete();
    }
}
