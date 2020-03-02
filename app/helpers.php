<?php

    function point_for_comma(string $str) : string
    {
        return str_replace('.', ',', $str);
    }

    function comma_for_point(string $str) : string
    {
        return str_replace(',', '.', $str);
    }