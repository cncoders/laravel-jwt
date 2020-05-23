<?php
namespace cncoders\jwt;

class DataTable
{
    public $data = [];
    public $headers = [];

    public function __construct( $data,  $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    public function getData():array
    {
        return $this->data;
    }

    public function getHeaders():array
    {
        return $this->headers;
    }

    public function __get($name)
    {
        return isset($this->data[$name])
            ? $this->data[$name]
            : null;
    }
}
