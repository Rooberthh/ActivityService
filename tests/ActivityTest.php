<?php

    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

class ActivityTest extends TestCase
{
    use DatabaseMigrations;

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
