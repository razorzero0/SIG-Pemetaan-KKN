<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(protected AdminService $model)
    {
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = $this->model->latest();
        return view('dashboard.admin.data-admin', $data);
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
    public function store(UserRequest $request)
    {
        $this->model->store($request);
        return redirect('data-admin')->with('success', 'data admin berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $this->model->update($request, $id);
        return redirect('data-admin')->with('success', 'data admin berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->model->delete($id);
        return redirect('data-admin')->with('success', 'data admin berhasil dihapus!');
    }
}
