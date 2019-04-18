<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupTitles = ['Java', 'PHP', 'React', 'Python', 'Spanish'];

        foreach($groupTitles as $groupTitle)
        {
            Group::create([
                'title' => $groupTitle,
            ]);
        }
    }
}
