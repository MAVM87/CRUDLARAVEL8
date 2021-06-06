<?php

namespace App\Http\Controllers;

use App\Models\Recinto;
use Illuminate\Http\Request;

class RecintoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['recintos']=Recinto::paginate(5);
        return view('Recinto.indexRecinto',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Recinto.createRecinto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Capacidad'=>'required|numeric|max:10000',
            'Ubicacion'=>'required|string|max:100',
        ];

        $mensaje=[
            'Nombre.required'=>'Es necesario insertar un Nombre',
            'required'=>'Es necesario insertar una :attribute',
        ];

        $this->validate($request, $campos, $mensaje);

        // $datosRecinto=$request->all();

        $datosRecinto = request()->except('_token');
       
        Recinto::insert($datosRecinto);

        // return response()->json($datosRecinto);
        return redirect('Recinto')->with('mensaje','Recinto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function show(Recinto $recinto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function edit($id_recinto)
    {
        //
        $recinto=Recinto::findOrFail($id_recinto);
        return view('Recinto.editRecinto', compact('recinto') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_recinto)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Capacidad'=>'required|numeric|max:10000',
            'Ubicacion'=>'required|string|max:100',
        ];

        $mensaje=[
            'Nombre.required'=>'Es necesario insertar un Nombre',
            'required'=>'Es necesario insertar una :attribute',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datosRecinto = request()->except(['_token','_method']);
        Recinto::where('id_recinto','=',$id_recinto)->update($datosRecinto);

        $recinto=Recinto::findOrFail($id_recinto);
        //return view('Recinto.editRecinto', compact('recinto') );
        return redirect('Recinto')->with('mensaje','Recinto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_recinto)
    {
        //
        Recinto::destroy($id_recinto);
        return redirect('Recinto')->with('mensaje','Recinto borrado');
    }
}
