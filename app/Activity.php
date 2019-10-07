<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Activity extends Model
    {
        protected $fillable = [
            'name', 'startDate', 'endDate', 'category_id', 'timetable_id'
        ];

        public function timetable()
        {
            return $this->belongsTo(Timetable::class);
        }

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function path()
        {
            return "/api/timetables/{$this->category->id}/{$this->timetable->id}";
        }
    }
