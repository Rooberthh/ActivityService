<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
        protected $fillable = [
            'name',
            'color'
        ];

        public function activities()
        {
            return $this->hasMany(Activity::class);
        }
    }
