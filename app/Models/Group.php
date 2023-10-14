<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Uuidable;
    public $incrementing = false;
    protected $primaryKey = "group_id";
    protected $fillable = ['lecturer_id', 'location_id', 'group_no', 'group_leader'];
    public function lecturer()
    {
        return $this->hasOne(Lecturer::class, 'lecturer_id', 'lecturer_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'location_id', 'location_id');
    }
}
