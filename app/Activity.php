<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Activity extends Model
    {
        protected $fillable = [
            'name', 'startDate', 'endDate', 'category_id'
        ];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function path()
        {
            return "/api/activities/{$this->id}";
        }
    }
