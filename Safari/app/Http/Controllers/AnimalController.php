<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['animales']=Animal::paginate(5);
        return view('Animal.indexAnimal',$datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Animal.createAnimal');
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
            'Familia'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'Foto'=>'required|max:1000|mimes:jpeg,png,jpg',
            'recintos_id'=>'required|numeric|max:1000',
        ];

        $mensaje=[
            'Familia.required'=>'Es necesario insertar una Familia',
            'Foto.required'=>'Es necesario insertar una Foto',
            'required'=>'Es necesario insertar un :attribute',
        ];

        $this->validate($request, $campos, $mensaje);
        
        // $datosAnimal=$request->all();

        $datosAnimal = request()->except('_token');

        if($request->hasfile('Foto')){
            $datosAnimal['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Animal::insert($datosAnimal);

        // return response()->json($datosAnimal);
        return redirect('Animal')->with('mensaje','Animal agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id_animal)
    {
        //
        $animal=Animal::findOrFail($id_animal);
        return view('Animal.editAnimal', compact('animal') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_animal)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Familia'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'recintos_id'=>'required|numeric|max:100',
        ];

        $mensaje=[
            'Familia.required'=>'Es necesario insertar una Familia',
            'required'=>'Es necesario insertar un :attribute',
        ];

        if($request->hasfile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'Es necesario insertar una Foto'];
        }

        $this->validate($request, $campos, $mensaje);
        //
        $datosAnimal = request()->except(['_token','_method']);
        if($request->hasfile('Foto')){
            $animal=Animal::findOrFail($id_animal);
            Storage::delete('public/'.$animal->Foto);
            $datosAnimal['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Animal::where('id_animal','=',$id_animal)->update($datosAnimal);
        $animal=Animal::findOrFail($id_animal);
        //return view('Animal.editAnimal', compact('animal') );
        return redirect('Animal')->with('mensaje','Animal actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_animal)
    {
        //

        $animal=Animal::findOrFail($id_animal);

        if(Storage::delete('public/'.$animal->Foto)){

            Animal::destroy($id_animal);

        }
        
        return redirect('Animal')->with('mensaje','Animal borrado');
    }
}
