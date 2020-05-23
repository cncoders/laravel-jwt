<?php
namespace cncoders;

use Illuminate\Support\Facades\Facade;

class Jwt extends Facade
{
    public static function getFacadeAccessor()
    {
        return \cncoders\jwt\Jwt::class;
    }
}
