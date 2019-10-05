<?php

    use Carbon\Carbon;
    use Laravel\Lumen\Testing\DatabaseMigrations;

    class CategoryTest extends TestCase
    {
        use DatabaseMigrations;

        /** @test */
        function a_user_can_fetch_categories()
        {
             $categories = create('App\Category', [], 10);

             $response = $this->json('get', 'api/category');

             $response->assertResponseStatus(200);
             $response->seeJsonEquals($categories->toArray());
        }

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
