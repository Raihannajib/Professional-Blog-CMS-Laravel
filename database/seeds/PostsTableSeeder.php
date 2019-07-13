<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          // reset the posts table
          DB::table('posts')->truncate();

          // generate 10 dummy posts data
          $posts = [];
          $faker = Factory::create();
  
          for ($i = 1; $i <= 10; $i++)
          {
              $image = "Post_Image_" . rand(1, 5) . ".jpg";
              $date = date("Y-m-d H:i:s", strtotime("2016-07-18 08:00:00 +{$i} days"));
  
              $posts[] = [
                  
                  'title' => $faker->sentence(rand(8, 12)),
                  'body' => $faker->text(rand(150, 200)),
                  'excerpt' => $faker->text(rand(150, 200)),
                  'slug' => $faker->slug(),
                  'image' => rand(0, 1) == 1 ? $image : NULL,
                  'author_id' => rand(1, 3),
                  'created_at' => $date,
                  'updated_at' => $date,
              ];
          }
  
          DB::table('posts')->insert($posts);
      }
  }
