<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('motorcycle_index'), 403);

        $motorcycles = Motorcycle::paginate(5);
        return view('motorcycles.index', compact('motorcycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('motorcycle_create'), 403);

        return view('motorcycles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Motorcycle::create($request->all());

        return redirect()->route('motorcycles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Motorcycle $motorcycle)
    {
        // abort_if(Gate::denies('motorcycle_show'), 403);

        return view('motorcycles.show', compact('motorcycle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Motorcycle $motorcycle)
    {
        // abort_if(Gate::denies('motorcycle_edit'), 403);

        return view('motorcycles.edit', compact('motorcycle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motorcycle $motorcycle)
    {
        $motorcycle->update($request->all());

        return redirect()->route('motorcycles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motorcycle $motorcycle)
    {
        // abort_if(Gate::denies('motorcycle_delete'), 403);

        $motorcycle->delete();

        return redirect()->route('motorcycles.index');
    }
}
