<?php

use App\Badge;
use App\User;
use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = Badge::all();
        $badgeFolder = 'images/badges/';
        $badgeLinks = [
            ['title' => 'Experienced user', 'link' => 'crown-icon.png'],
            ['title' => 'Most courses completed in one week', 'link' => 'golden-medal-icon.png'],
            ['title' => 'Second in completing most courses in one week', 'link' => 'silver-medal-icon.png'],
            ['title' => 'Third in completing most courses in one week', 'link' => 'bronze-medal-icon.png']];

        foreach ($badgeLinks as $badgeLink) {
            Badge::create([
                'title' => $badgeLink['title'],
                'link' => $badgeFolder . $badgeLink['link'],
            ]);
        }
    }
}
