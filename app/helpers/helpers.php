<?php

//custom blade helper functions
if (! function_exists('lvl_completion_to_words')) {

    function lvl_completion_to_words($percents)
    {
        $level = '';
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
