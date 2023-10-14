<?php

namespace App\Repositories\Profile;

use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
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
        $user =  $this->model->find($id);
        return ['user' => $user];
    }
    /**
     * latest
     *
     * @return void
     */
    public function latest()
    {

        return $this->model->with('roles')->get();
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
    public function update($req,  $id)
    {

        return $this->model->where('user_id', $id)->update($req);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
