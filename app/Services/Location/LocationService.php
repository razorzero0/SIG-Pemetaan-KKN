<?php

namespace App\Services\Location;

use App\Repositories\Location\LocationRepository;
use App\Services\Location\LocationServiceInterface;
use Illuminate\Support\Facades\Log;


class LocationService implements LocationServiceInterface
{
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private LocationRepository $model)
    {
    }


    /**
     * all
     *
     * @return void
     */
    public function all(): array
    {
        $group = $this->model->all();
        return ['data' => $group];
    }
    /**
     * get latest data from db
     *
     * @return void
     */
    public function latest()
    {
        $group = $this->model->latest();
        return ['data' => $group];
    }
    /**
     * store data
     *
     * @param  mixed $request
     * @return void
     */
    public function store($request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['village', 'sub_district', 'city', 'full_address', 'coordinate']);
        // $validated['coordinate'] = substr($request->coordinate, 40, -2);
        return $this->model->create($validated);
    }


    public function find($id)
    {
        $data = $this->model->find($id);
        return ['data' => $data];
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
        $validated = $request->safe()->only(['village', 'sub_district', 'city', 'full_address', 'coordinate']);
        // $validated['coordinate'] = substr($request->coordinate, 40, -2);
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
