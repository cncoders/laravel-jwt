<?php
namespace cncoders\jwt;

use App\contract\Utility;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $form_type = config('jwt.form_type');
        switch ((string) $form_type) {
            case 'header': $token = $request->header(config('jwt.form_name')); break;
            case 'body': $token = $request->input(config('jwt.form_name')); break;
            default: $token=''; break;
        }

        try {
            $jwtdata = \App\facades\Jwt::verifiy($token);
            $request->jwt   = $jwtdata;
            return $next($request);
        } catch (JwtException $j) {
            exit( Utility::renderJson($j->getCode(), $j->getMessage()) );
        }
    }
}
