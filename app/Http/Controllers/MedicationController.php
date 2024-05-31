<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;



class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display detail.
     */
    public function detail(Request $request)
    {
        //
        $id = $request->id;
        $medication = Medication::find($id);

        return view('medication.detail',['medication'=>$medication]);
    }
    /**
     * Display all in json.
     */
    public function alljson()
    {
        $medications = Medication::all();

        return response()->json($medications);
    }
    /**
     * Add object medication.
     */
    public function save(Request $request)
    {     
        $msg = '';
        if(
            $request->isMethod('post')
        ){
            
            $medication = new Medication;

            $medication->name = $request->name;
            $medication->description = $request->description;
            $medication->price = $request->price;
            $medication->save();
            $msg = 'Guardado exitosamente';
        }



            return view('medication.save',['msg'=>$msg]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medication $medication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        //
    }
}
