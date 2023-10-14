<?php

namespace App\Services\Profile;

use App\Services\Profile\ProfileServiceInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Log;

class ProfileService implements ProfileServiceInterface
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
     * get latest data from db
     *
     * @return void
     */
    public function all()
    {
        return $this->model->all();
    }
    /**
     * get latest data from db
     *
     * @return void
     */
    public function latest()
    {
        return $this->model->latest();
    }
    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        $data  = $this->model->find($id);
        return ['user' => $data];
    }
    /**
     * store data
     *
     * @param  mixed $request
     * @return void
     */
    public function store($request)
    {
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
     * updatePassword
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updatePassword($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()->only(['password']);
        $validated['password'] = bcrypt($validated['password']);
        $acc = $this->model->update($validated, $id);
        return $acc;
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
            $this->model->delete($id);
            return [];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return [];
        }
    }
}
