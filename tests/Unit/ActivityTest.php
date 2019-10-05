<?php

    use Laravel\Lumen\Testing\DatabaseMigrations;

    class ActivityTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        function it_belongs_to_a_timetable()
        {
            $timetable = create('App\Timetable');

            $activity = create('App\Activity', ['timetable_id' => $timetable->id]);

            $this->assertTrue($timetable->fresh()->activities->contains($activity));
        }
    }
