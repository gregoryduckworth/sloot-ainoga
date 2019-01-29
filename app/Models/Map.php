<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'x', 'y', 'image', 'info', 'mine_id',
    ];

    public function mine()
    {
        return $this->belongsTo('App\Models\Mine');
    }
}
