<?php

    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

    class TimeTableTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        function a_timetable_contains_activities()
        {
            $timetable = create('App\Timetable');
            $activity = create('App\Activity', ['timetable_id' => $timetable->id]);

            $this->assertTrue($timetable->activities->contains($activity));
        }
    }
