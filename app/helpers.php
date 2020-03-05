<?php

    function point_for_comma(string $str) : string
    {
        return str_replace('.', ',', $str);
    }

    function comma_for_point(string $str) : string
    {
        return str_replace(',', '.', $str);
    }

    function request_path()
    {

        if (!isset($_SERVER['REQUEST_URI']))
            return;

        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        
        if (empty($parts))
        {
            return '/';
        }
        
        $path = implode('/', $parts);
     
        if (($position = strpos($path, '?')) !== FALSE)
        {
            $path = substr($path, 0, $position);
        }
        
        return $path;
    }