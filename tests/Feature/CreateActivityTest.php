<?php

    use App\Activity;
    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

    class CreateActivityTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        function a_user_can_fetch_activities()
        {
            create('App\Activity', [], 10);

            $this->json('get', 'api/activities')->assertResponseStatus(200);
        }

        /** @test */
        function a_user_can_create_activities()
        {
            $activity = make('App\Activity');

            $this->json('post', $activity->path() . '/activities', $activity->toArray())
                ->assertResponseStatus(201);

            $this->seeInDatabase('activities', ['name' => $activity->name]);
        }

        /** @test */
        function a_user_can_delete_activities()
        {
            create('App\Activity', [], 10);

            $activity = Activity::all()->first();

            $this->json('delete', "/api/activities/{$activity->id}")
                ->assertResponseStatus(204);
        }

        /** @test */
        function a_user_can_update_activities()
        {
            $activity = create('App\Activity');

            $this->json('patch', "/api/activities/{$activity->id}", [
                'name' => 'is changed',
                'startDate' => $activity->startDate,
                'endDate' => $activity->endDate,
                'category_id' => $activity->category->id
            ])->assertResponseStatus(200);

            $this->assertEquals('is changed', $activity->fresh()->name);
        }

        /** @test */
        public function a_activity_has_a_name()
        {
            $activity = create('App\Activity', ['name' => 'Activity']);

            $this->assertEquals('Activity', $activity->name);
        }

        /** @test */
        public function a_activity_has_a_startDate()
        {
            $date = Carbon::now();
            $activity = create('App\Activity', ['startDate' => $date]);

            $this->assertEquals($date, $activity->startDate);
        }

        /** @test */
        public function a_activity_has_a_endDate()
        {
            $date = Carbon::now();
            $activity = create('App\Activity', ['endDate' => $date]);

            $this->assertEquals($date, $activity->endDate);
        }
    }
