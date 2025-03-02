<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Proyecto;
use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use Illuminate\Support\Facades\Schema;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Schema::getColumnListing('proyectos');
        $exclude =["created_at","updated_at"];
        $campos = array_diff($campos,$exclude);
        $filas = Proyecto::select($campos)->get();

        $totalProyectos = Proyecto::count();

        return view('proyectos.index',compact('filas','campos', 'totalProyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("proyectos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProyectoRequest $request)
    {
        $datos = $request->only("titulo","horas_previstas","fecha_de_comienzo");
        $proyecto = new Proyecto($datos);
        $proyecto->save();

        Alumno::factory(rand(1, 5))->create([
            'proyecto_id' => $proyecto->id
        ]);

        $proyecto->save();
        session()->flash("mensaje","El proyecto $proyecto->titulo ha sido creado.");
        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyectos.show',compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->input());
        session()->flash("mensaje","El proyecto $proyecto->titulo se ha actualizado.");
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        session()->flash("mensaje","El proyecto $proyecto->titulo ha sido eliminado.");
        return redirect()->route('proyectos.index');
    }
}
