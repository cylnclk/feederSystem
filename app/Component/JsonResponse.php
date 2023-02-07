<?php

namespace Component;

class JsonResponse
{
    private $data;
    function __construct($data)
    {
        $this->data = $data;
        $this->setContentType('json');
    }
    function setContentType($contentType)
    {
        if ($contentType === 'json') {
            $contentTypes = 'application/json';
        }
        header('Content-Type: ' . $contentTypes . '; charset=utf-8');
    }
    function serialize()
    {
        $json = json_encode($this->data, JSON_UNESCAPED_UNICODE);
        return $json;
    }
}
