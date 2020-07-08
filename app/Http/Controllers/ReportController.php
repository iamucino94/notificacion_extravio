<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = \App\Reporte::all();
        return \View::make('main')->nest('child', 'reports')->with("reports", $reports);
    }
    
    public function create()
    {
        return \View::make('main')->nest('child', 'new-report');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
