<?php
namespace cncoders\jwt;

trait JwtTrait
{
    /**
     * 生成一个JWT
     * @param array $data
     * @param array $headers
     * @return string
     */
    public function createToken(array $data, array $headers = []):string
    {
        return Jwt::headers($headers)->data($data)->create();
    }
}
