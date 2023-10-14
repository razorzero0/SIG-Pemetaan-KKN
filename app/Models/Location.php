<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory, Uuidable;
    public $incrementing = false;
    protected $primaryKey = 'location_id';
    protected $fillable = [
        'village', 'sub_district', 'city', 'full_address', 'coordinate'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'location_id', 'location_id');
    }
}
