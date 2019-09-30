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

        /** @test */
        function a_user_can_create_timetables()
        {
            $timetable = make('App\Timetable');

            $response = $this->json('post', $timetable->path(), $timetable->toArray());

            $response->assertResponseStatus(201);
            $this->seeInDatabase('timetables', $timetable->toArray());
        }
    }
