<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check())
        {
          
          return redirect()->route('user.home',['noLogin'=>'Bạn chưa đăng nhập']);
        }
        $user = Auth::user();
          if($user->role != "admin")
          {
            
            return redirect()->route('user.home',['noAdmin'=>'Bạn không thể truy cập đến trang này']);
          }
        return $next($request);
   
   }
}
