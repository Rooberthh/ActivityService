<?php

    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

    class CategoryTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        public function a_category_has_a_name()
        {
            $category = create('App\Category', ['name' => 'Cat']);

            $this->assertEquals('Cat', $category->name);
        }

        /** @test */
        function a_category_contains_activities()
        {
            $category = create('App\Category');
            $activity = create('App\Activity', ['category_id' => $category->id]);

            $this->assertTrue($category->activities->contains($activity));
        }
    }
