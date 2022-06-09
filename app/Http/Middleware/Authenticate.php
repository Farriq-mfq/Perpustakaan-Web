<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected $guards = [];

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;
    
        return parent::handle($request, $next, ...$guards);
    }
    protected function redirectTo($request)
    {
            if (! $request->expectsJson()) {
                if(in_array('admin',$this->guards)){
                    return route('auth.login');
                }else if(in_array('anggota',$this->guards)){
                    return route('client.login');
                }
            }
    }
}
