<?php

//custom blade helper functions

//turns courses group completion percents to verbal assessment
if (!function_exists('group_completion_to_words')) {

    function group_completion_to_words($percents)
    {
        if($percents < 25) {
            $level = 'noob';
        } elseif($percents >= 25 && $percents <= 70) {
            $level = 'advanced noob';
        } else {
            $level = 'pro';
        }
        return $level;
    }
}

//picks one random color from array
if (!function_exists('random_color')) {

    function random_color()
    {
        $colors = ['#7066ff', '#4cbdae', '#ee4379', '#00bcf9', '#f15c42'];
        $randomColor = $colors[array_rand($colors)];

        return $randomColor;
    }
}
