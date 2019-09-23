<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Activity extends Model
    {
        protected $fillable = [
            'name', 'startDate', 'endDate', 'category_id'
        ];

        protected $hidden = [
            'password',
        ];
    }
