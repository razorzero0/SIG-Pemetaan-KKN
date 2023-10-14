<?php

namespace App\Repositories\Lecturer;

use App\Models\Lecturer;

class LecturerRepository implements LecturerRepositoryInterface
{

    private $model;

    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct(Lecturer $user)
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
     * latest
     *
     * @return void
     */
    public function latest()
    {
        return $this->model->latest()->get();
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
    /**
     * update
     *
     * @param  mixed $req
     * @param  mixed $id
     * @return void
     */
    public function update($req, $id)
    {

        return $this->model->where('lecturer_id', $id)->update($req);
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
