<?php

class TagsSeeder extends Seeder
{
    public function run()
    {
        $tags = array(
            ['name' => 'PHP',     'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['name' => 'MySQL',   'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['name' => 'Bash',    'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['name' => 'Laravel', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        );

        DB::table('tags')->insert($tags);
    }
}