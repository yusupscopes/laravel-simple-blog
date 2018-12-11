<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'Backend', 'slug'  => 'backend']);
        Category::create(['title' => 'Frontend','slug'  => 'frontend']);
        Category::create(['title' => 'DevOps','slug'  => 'devops']);
        Category::create(['title' => 'UI/UX', 'slug' => 'ui-ux']);
    }
}
