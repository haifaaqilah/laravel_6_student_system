<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_name',
        'level_id',
        'status',
    ];

    /**
     * Get the Level associated with the Class
     */
    public function level()
    {
        $level = $this->hasOne('App\Level', 'id', 'level_id');

        return $level;
    }
}
