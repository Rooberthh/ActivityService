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
    }
