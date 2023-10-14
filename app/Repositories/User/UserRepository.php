<?php

namespace App\Repositories\User;

use App\Models\User;


class UserRepository implements UserRepositoryInterface
{

    private $model;

    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {

        return $this->model->all();
    }
    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
    /**
     * latest
     *
     * @return void
     */
    public function latest()
    {
        // return $this->model->with('roles')->get();
        return $this->model
            ->select('users.*', 'roles.name as role_name')
            ->join('model_has_roles', 'model_has_roles.model_uuid', '=', 'users.user_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_type', '=', User::class)
            ->orderByDesc('roles.name')
            ->get();
    }
    /**
     * create
     *
     * @param  mixed $req
     * @return void
     */
    public function create($req)
    {

        return $this->model->create($req);
    }
    /**
     * update
     *
     * @param  mixed $req
     * @param  mixed $id
     * @return void
     */
    public function update($req, $id)
    {

        return $this->model->where('user_id', $id)->update($req);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
