<?php

namespace swkberlin;

class MergeStringsAlternately
{

    public function mergeAlternately($str1, $str2): string
    {
        $length = strlen($str1) + strlen($str2);

        $merged_string = '';

        for ($i = 0; $i < $length; $i ++) {
            if(isset($str1[$i])) {
                $merged_string .= $str1[$i];
            }
            if(isset($str2[$i])) {
                $merged_string .= $str2[$i];
            }
        }

        return $merged_string;
    }
}