<?php

namespace App\Repositories\Group;

use App\Models\Group;

use App\Repositories\Group\GroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GroupRepository implements GroupRepositoryInterface
{

    private $group;

    /**
     * __construct
     *
     * @param  mixed $group
     * @return void
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }
    /**
     * all
     *
     * @return void
     */
    public function all(): Collection
    {

        return $this->group->all();
    }
    /**
     * latest
     *
     * @return void
     */
    public function latest()
    {
        return $this->group->with('lecturer', 'location')->get();
    }
    /**
     * create
     *
     * @param  mixed $req
     * @return void
     */
    public function create($req)
    {

        return $this->group->create($req);
    }
    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        return $this->group->find($id)->with('lecturer', 'location')->first();
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

        return $this->group->where('group_id', $id)->update($req);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        return $this->group->destroy($id);
    }
}
