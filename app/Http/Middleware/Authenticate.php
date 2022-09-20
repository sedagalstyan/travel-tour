<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            
            if ($request->is('admin') || $request->is('admin/*')) {
                return redirect()->route('locale.admin.login', ['locale' => app()->getLocale()]);
            }
            
            return redirect()->route('locale.login', ['locale' => app()->getLocale()]);
        }
    }
}
