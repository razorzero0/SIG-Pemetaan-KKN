<?php

namespace App\Services\Group;

use App\Http\Requests\GroupRequest;
use App\Models\Lecturer;
use App\Models\Location;
use App\Repositories\Group\GroupRepository;
use App\Services\Group\GroupServiceInterface;
use Illuminate\Support\Facades\Log;

class GroupService implements GroupServiceInterface
{
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private GroupRepository $model, private Lecturer $lecturer, private Location $location)
    {
    }

    /**
     * get latest data from db
     *
     * @return void
     */
    public function all()
    {
        $group = $this->model->all();
        $lecturer = $this->lecturer->all();
        $location = $this->location->all();

        return ['group' => $group, 'lecturer' => $lecturer, 'location' => $location];
    }
    /**
     * latest
     *
     * @return void
     */
    public function latest()
    {
        $group = $this->model->latest();
        $lecturer = $this->lecturer->all();
        $location = $this->location->all();

        return ['group' => $group, 'lecturer' => $lecturer, 'location' => $location];
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
        $validated = $request->safe()
            ->only(['lecturer_id', 'location_id', 'group_no', 'group_leader']);
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
        $group = $this->model->find($id);
        $lecturer = $this->lecturer->all();
        $location = $this->location->all();

        return ['group' => $group, 'lecturer' => $lecturer, 'location' => $location];
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
        $validated = $request->safe()
            ->only(['lecturer_id', 'location_id', 'group_no', 'group_leader']);
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
