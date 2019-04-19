<?php

//custom blade helper functions
if (! function_exists('group_completion_to_words')) {

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
