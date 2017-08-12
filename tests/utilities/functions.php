<?php
/**
 * Created by PhpStorm.
 * User: hasan
 * Date: 12-Aug-17
 * Time: 10:54 PM
 */

function create($class, $attributes = [])
{
    return factory($class)->create($attributes);
}

function make($class, $attributes = [])
{
    return factory($class)->make($attributes);
}