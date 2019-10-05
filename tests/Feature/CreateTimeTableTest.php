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
    }
