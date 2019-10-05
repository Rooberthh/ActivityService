<?php

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

        /** @test */
        function a_user_can_fetch_timetables()
        {
            $activities = create('App\Timetable', [], 10);

            $response = $this->json('get', 'api/timetable');

            $response->assertResponseStatus(200);
            $response->seeJsonEquals($activities->toArray());
        }
    }
