<?php

namespace DJ\Common;

class Annotation
{
    function fromMethod(\ReflectionMethod $method)
    {
        $doc = $method->getDocComment();
        if (!empty($doc)) {
            $pattern = '/@(\w+)[ ]?=[ ]?(.+)/';
            $tags = [];
            preg_match_all($pattern, $doc, $tags);
            return array_combine($tags[1], array_map('json_decode', $tags[2]));
        }
        return [];
    }
}
