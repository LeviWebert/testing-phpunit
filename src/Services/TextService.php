<?php

namespace App\Services;

class TextService
{
    public function toUpperCase(string $str):string
    {
        return strtoupper($str);
    }

    public function capitalizeFirst(string $str):string
    {
        return ucfirst($str);
    }

    public function minimizeFirst(string $str):string
    {
        $minStr="";
        $i=0;
        foreach (str_split($str,1) as $letter)
        {
            if ($i==0)
            {
                $minStr.=strtolower($letter);
                $i++;
            }
            else
            {
                $minStr.=$letter;
            }

        }
        return $minStr;
    }
}