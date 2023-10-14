<?php

namespace App\Services\Admin;

use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Log;

class AdminService implements AdminServiceInterface
{
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(protected UserRepository $model)
    {
    }

    /**
     * get all data from db
     *
     * @return void
     */
    public function all()
    {
        $data = $this->model->all();
        return ['data' => $data];
    }
    /**
     * get latest data from db
     *
     * @return void
     */
    public function latest()
    {
        $data = $this->model->latest();
        return ['data' => $data];
    }


    public function find($id)
    {
        $data  = $this->model->show($id);
        return ['data' => $data];
    }
    /**
     * store data
     *
     * @param  mixed $request
     * @return void
     */
    public function store($request)
    {

        $validated  = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $validated = $request->safe()->only(['name', 'email', 'password']);
        $user = $this->model->create($validated);
        $user->assignRole('admin');
        return $user;
    }
    /**
     * update data
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()->only(['name', 'email']);
        return $this->model->update($validated, $id);
    }
    /**
     * destroy data
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id): array
    {
        try {
            $this->model->destroy($id);
            return [];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return [];
        }
    }
}
