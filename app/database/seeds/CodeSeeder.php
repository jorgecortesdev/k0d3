<?php

class CodeSeeder extends Seeder
{
    public function run()
    {
        $code = array([
            'name' => 'Welcome',
            'description' => 'Description',
            'script' => 'echo "Hello world!"',
            'editor_mode_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('code')->insert($code);

        $tags = array([
            'code_id' => 1,
            'tag_id'  => 1
        ]);

        DB::table('code_tags')->insert($tags);
    }
}