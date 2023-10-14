<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Services\Group\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{


    public function __construct(private GroupService $model)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->latest();
        // dd($data);
        return view('dashboard.kelompok.data-kelompok', $data);
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
    public function store(GroupRequest $request)
    {
        $this->model->store($request);
        return redirect('data-group')->with('success', 'data kelompok berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        // dd($data);
        return view('dashboard.kelompok.edit-kelompok', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $req, $id)
    {
        $this->model->update($req, $id);
        return redirect('data-group')->with('success', 'data kelompok berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect('data-group')->with('success', 'data kelompok berhasil dihapus!');
    }
}
