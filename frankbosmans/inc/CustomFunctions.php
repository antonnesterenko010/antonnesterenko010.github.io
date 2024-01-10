<?php

namespace inc;


class CustomFunctions
{
    static function init()
    {
    }
    static function getSubFields($arr): array
    {
        $subFields = [];
        foreach ($arr as $item) {
            $subFields[$item] = get_sub_field($item) ?? '';
        }
        return $subFields;
    }
}
