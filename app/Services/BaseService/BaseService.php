<?php

namespace App\Services\BaseService;

interface BaseService
{

    public function all();
    public function latest();
    public function find($id);
    public function store($req);
    public function update($req, $id);
    public function delete($id);
}
