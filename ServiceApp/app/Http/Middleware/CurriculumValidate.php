<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use App\User;
use App\Curriculum;

class CurriculumValidate
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
        if(Auth::user()->role == 'Tecnico'){

            $curriculum = Curriculum::find(Auth::user()->id);

            if($curriculum != null){
                return $next($request);
            }else{
                return redirect('/curriculum')->with('message', 'Debe agregar su hoja de vida para continuar');
            }
        }else{
            return $next($request);
        }
    }
}
