<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Services\Location\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{


    public function __construct(private LocationService $model)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->latest();
        return view('dashboard.lokasi.data-lokasi', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.lokasi.create-lokasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $req)
    {

        $this->model->store($req);
        return redirect('data-lokasi')->with('success', 'Data berhasil ditambah !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view('dashboard.lokasi.edit-lokasi', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, $id)
    {

        $this->model->update($request, $id);
        return redirect('data-lokasi')->with('success', 'Data berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        $this->model->delete($id);
        return redirect('data-lokasi')->with('success', 'Data berhasil dihapus !');
    }
}
