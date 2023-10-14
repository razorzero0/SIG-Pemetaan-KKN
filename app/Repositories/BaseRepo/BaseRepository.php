<?php

namespace App\Repositories\BaseRepo;

use Illuminate\Database\Eloquent\Collection;

interface BaseRepository
{

    /**
     * all
     *
     * @return Collection
     */
    public function all();
    /**
     * latest
     *
     * @return void
     */
    public function latest();
    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id);
    /**
     * create
     *
     * @param  mixed $req
     * @return void
     */
    public function create($req);
    /**
     * update
     *
     * @param  mixed $req
     * @param  mixed $id
     * @return void
     */
    public function update($req, $id);
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id);
}
