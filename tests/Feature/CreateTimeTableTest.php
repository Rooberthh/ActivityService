<?php

    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

    class CreateTimeTableTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        function a_user_can_create_timetables()
        {
            $timetable = make('App\Timetable');

            $response = $this->json('post', $timetable->path(), $timetable->toArray());

            $response->assertResponseStatus(201);
            $this->seeInDatabase('timetables', $timetable->toArray());
        }

        /** @test */
        function a_user_can_update_timetables()
        {
            $timetable = create('App\Timetable');

            $response = $this->json('patch', $timetable->path(), ['name' => 'is changed']);

            $response->assertResponseStatus(200);
            $response->assertEquals('is changed', $timetable->fresh()->name);
        }

        /** @test */
        function a_timetable_can_add_activities()
        {
            $timetable = create('App\Timetable');

            $activity = make('App\Activity');

            $timetable->addActivity($activity->toArray());

            $this->assertCount(1, $timetable->activities);
        }
    }
