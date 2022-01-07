<?php


function copyright()
{
    $created = '2022';
    $now = date('Y');
    return $created == $now ? $created : $created . ' - ' . $now;
}
function avatar($path, $name)
{
    return asset($path . $name);
}
