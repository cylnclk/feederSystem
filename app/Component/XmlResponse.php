<?php

namespace Component;

class XmlResponse
{
    private $data;
    function __construct($data)
    {
        $this->data = $data;
        $this->setContentType('xml');
    }
    function setContentType($contentType)
    {
        if ($contentType === 'xml') {
            $contentTypes = 'application/xml';
        }
        header('Content-Type: ' . $contentTypes . '; charset=utf-8');
    }
    function arrayToXml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'product_' . $key;
                }
                $subnode = $xml_data->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    function serialize()
    {
        $xml = new \SimpleXMLElement('<Products_Details/>');
        $this->arrayToXml($this->data, $xml);
        return $xml->asXML();
    }
}
