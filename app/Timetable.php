<?php


    namespace App;
    use Illuminate\Database\Eloquent\Model;

    class Timetable extends Model
    {
        protected $fillable = [
            'name',
            'color'
        ];

        /**
         * @return mixed
         */
        public function activities()
        {
            return $this->hasMany(Activity::class);
        }

        public function path()
        {
            return "/api/timetable/{$this->id}";
        }

    }
