<?php

namespace App\Services\Lecturer;

use App\Services\Lecturer\LecturerServiceInterface;
use App\Repositories\Lecturer\LecturerRepository;
use Illuminate\Support\Facades\Log;

class LecturerService implements LecturerServiceInterface
{
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(protected LecturerRepository $model)
    {
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
     * get latest data from db
     *
     * @return void
     */
    public function latest()
    {
        return $this->model->latest();
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
        $validated = $request->safe()->only(['name', 'nidn']);
        $this->model->create($validated);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
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
        $validated = $request->safe()->only(['name', 'nidn']);
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
            $this->model->delete($id);
            return [];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return [];
        }
    }
}
