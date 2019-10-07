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

        /**
         * @param $activity
         * @return Activity
         */
        public function addActivity($activity)
        {
            $activity = $this->activities()->create($activity);

            return $activity;
        }

        public function path()
        {
            return "/api/timetable/{$this->id}";
        }

    }
