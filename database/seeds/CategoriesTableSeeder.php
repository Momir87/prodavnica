<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category = new \App\Category([
        'category_name' => 'Bubnjevi',
        'category_img' => 'bubnjevi1.jpg',
      ]);
      $category->save();


    $category = new \App\Category([
      'category_name' => 'DJ Oprema',
      'category_img' => 'dj1.jpg',
    ]);
      $category->save();


    $category = new \App\Category([
      'category_name' => 'Gitare',
      'category_img' => 'gitara2.jpg',
    ]);
      $category->save();

      $category = new \App\Category([
        'category_name' => 'Klasični instrumenti',
        'category_img' => 'violina2.jpg',
      ]);
        $category->save();


    $category = new \App\Category([
      'category_name' => 'Klaviri',
      'category_img' => 'klavir2.jpg',
    ]);
      $category->save();


    $category = new \App\Category([
      'category_name' => 'Ozvučenje',
      'category_img' => 'oprema1.jpg',
    ]);
      $category->save();


    }

}
