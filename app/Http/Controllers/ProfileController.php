<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function __construct(private ProfileService $model)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->find(auth()->user()->user_id);
        return view('dashboard.profile.data-profile', $data);
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
    public function show($id)
    {
        $data = $this->model->find($id);
        return view('dashboard.profile.data-profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->model->find($id);
        return view('dashboard.profile.edit-profile', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $this->model->update($request, $id);
        return redirect('data-profile')->with('success', 'Profile berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * changePassword
     *
     * @return void
     */
    public function changePassword()
    {

        return view('dashboard.profile.change-password');
    }
    /**
     * updatePassword
     *
     * @param  mixed $req
     * @return void
     */
    public function updatePassword(PasswordRequest $req)
    {
        $this->model->updatePassword($req, auth()->user()->user_id);
        return redirect('change-password')->with('success', 'password berhasil diperbaharui !');
    }
}
