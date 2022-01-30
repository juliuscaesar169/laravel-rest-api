<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Customer;
// use App\Models\Region;

class Commune extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'A',
    ];

    protected $fillable = [
        'description',
    ];

    // Relationships
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
