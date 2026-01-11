<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'E-book',
                'desc' => 'Read and Learn',
                'slug' => 'ebook',
                'icon' => 'images/icons/ebook.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Course',
                'desc' => 'Expand Your Skills',
                'slug' => 'course',
                'icon' => 'images/icons/course.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Template',
                'desc' => 'Designs Made Easy',
                'slug' => 'template',
                'icon' => 'images/icons/template.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Font',
                'desc' => 'Typography Selection',
                'slug' => 'font',
                'icon' => 'images/icons/font.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
