<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_title = [
            'tag_title' => '家事',
        ];
        Tag::create($tag_title);
        $tag_title = [
            'tag_title' => '勉強',
        ];
        Tag::create($tag_title);
        $tag_title = [
            'tag_title' => '運動',
        ];
        Tag::create($tag_title);
        $tag_title = [
            'tag_title' => '食事',
        ];
        Tag::create($tag_title);
        $tag_title = [
            'tag_title' => '移動',
        ];
        Tag::create($tag_title);
    }
}
