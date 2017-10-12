<?php

namespace App;

class Facility extends \Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'img'
    ];

    protected $rules = [
        'name' => 'required',
    ];

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
