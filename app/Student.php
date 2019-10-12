<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'stu_name',
        'stu_dob',
        'stu_phone',
        'status',
        'current_class_id',
    ];

    /**
     * Get the (current) Class associated with the Student
     */
    public function class()
    {
        $class = $this->hasOne('App\Classes', 'id', 'current_class_id');

        return $class;
    }
}
