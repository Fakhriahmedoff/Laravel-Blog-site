<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Haqqimizda','Kariyer','Vizyon','Missiya'];
        $count = 0;
        foreach($pages as $page){
        $count++;
        DB::table('pages')->insert([
            'title' => $page,
            'content' => 'lorem ipsum dolor sit amet consentecur ipsom sdsa sahjsda asdjasjas asdjsa sloar loar meoler',
            'slug' => Str::slug($page),
            'image' => 'https://www.business.com/images/content/5ca/3db8b5a215e8a458b9d10/1500-0-',
            'order' =>$count,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        }

    }
}
