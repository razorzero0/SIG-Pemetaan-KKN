<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory, Uuidable;

    public $incrementing = false;
    protected $primaryKey = 'lecturer_id';

    protected $fillable = ['name', 'nidn'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'lecturer_id', 'lecturer_id');
    }
}
