<?php

return [

    /**
     * JWT采用的加密方式
     * 生成私钥：openssl genrsa -out rsaprivatekey.pem 1024
     * 生成公钥：openssl rsa -in rsaprivatekey.pem -out rsapublickey.pem -pubout
     * 转换格式：openssl pkcs8 -topk8 -in rsaprivatekey.pem -out pkcs8rsaprivate_key.pem -nocrypt
     */
    'signer' => 'RS256',

    /**
     * JWT公钥内容
     */
    'public_key' => file_get_contents( base_path('rsapublickey.pem') ),

    /**
     * JWT私钥
     */
    'private_key' => file_get_contents( base_path('rsaprivatekey.pem') ),

    /**
     * 过期时间
     */
    'ttl' => 86400,

    /**
     * 发布者
     */
    'issuer' => 'http://example.com',

    /**
     * 接受者
     */
    'audience' => 'http://example.com',

    /**
     * 头信息
     */
    'headers' => [],

    /**
     * JWT TOKEN传输的方式 可选 header|body
     */
    'form_type' => 'header',

    /**
     * 校验字段
     */
    'form_name' => 'token'
];
