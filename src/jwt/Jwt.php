<?php
namespace cncoders\jwt;


class Jwt
{
    /**
     * 需要加密的数据
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @param array $data
     * @return $this
     */
    public function data(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function headers( array $headers = [])
    {
        $this->headers = array_merge(config('jwt.headers'), $headers);
        return $this;
    }

    /**
     * 创建TOKEN
     * @return string
     */
    public function create() :string
    {
        $payload = array(
            "iss" => config('jwt.issuer'),
            "aud" => config('jwt.audience'),
            "cat" => time(),
            "exp" => time() + config('jwt.ttl'),
            'headers' => $this->headers,
            'data' => $this->data
        );

        return \Firebase\JWT\JWT::encode($payload, config('jwt.private_key'), config('jwt.signer'));
    }

    /**
     * TOKEN校验
     * @param $token
     * @return DataTable
     * @throws JwtException
     */
    public function verifiy($token):DataTable
    {
        try {
            if ( empty($token) ) {
                throw new JwtException('TOKEN不存在', 1002);
            }

            $jwt = \Firebase\JWT\JWT::decode(
                $token,
                config('jwt.public_key'),
                [config('jwt.signer')]);

            return new DataTable($jwt->data, $jwt->headers);

        } catch(\Exception $e) {
            throw new JwtException('TOKEN无效或已过期', 1001);
        }
    }
}
