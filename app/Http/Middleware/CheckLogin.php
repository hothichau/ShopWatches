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
         echo "Chưa đăng nhập vào trang web";
         return redirect('/user/home');
        }
        $user = Auth::user();
          if($user->role != "admin")
            {
                return redirect("/user/home");
             }
        return $next($request);
   
   }
}
