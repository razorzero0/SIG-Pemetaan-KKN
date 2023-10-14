<?php

namespace App\Http\Controllers;

use App\Http\Requests\LecturerRequest;
use App\Models\Lecturer;
use App\Services\Lecturer\LecturerService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class LecturerController extends Controller
{

    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(protected LecturerService $service)
    {
    }


    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $dpl = $this->service->latest();
        return view('dashboard.dpl.data-dpl', ['dpl' => $dpl]);
    }


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LecturerRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect('data-dpl')->with('success', 'Data berhasil ditambah !');
    }


    /**
     * @param Lecturer $lecturer
     * 
     * @return [type]
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LecturerRequest $request, $id)
    {

        $this->service->update($request, $id);
        return redirect('data-dpl')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect('data-dpl')->with('success', 'Data berhasil dihapus');
    }
}
