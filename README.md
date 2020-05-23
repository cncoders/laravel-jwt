# laravel-jwt

laravel的权限验证

使用方法

1. 复制 config/jwt.php到laravel配置目录下

2. 在需要进行权限验证的地方使用中间件

```php

Route::post('/user', function (Request $request){

    return \App\contract\Utility::renderJson(200,'获取登陆用户信息成功', [$request->jwt->data]);

})->middleware(\cncoders\jwt\JwtMiddleware::class);

```

3.在登陆或者获取TOKEN的接口使用

```php

Route::post('/login', function (){

    $token = \cncoders\Jwt::headers(['channel' => 'OS'])->data(['user_id' => 1001010])->create();

    return \App\contract\Utility::renderJson(200, '登陆成功', compact('token'));
});

```

在控制器内可以使用 cncoders\jwt\jwtTrait.php

