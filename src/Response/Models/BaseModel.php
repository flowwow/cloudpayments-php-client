<?php

namespace Flowwow\Cloudpayments\Response\Models;

use stdClass;

/**
 * Class BaseModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class BaseModel
{
    public function fill(stdClass $fillData)
    {
        $props = get_object_vars($fillData);
        foreach ($props as $key => $value) {
            $lowerKey = lcfirst($key);
            $this->{$lowerKey} = $value;
        }
    }
}
