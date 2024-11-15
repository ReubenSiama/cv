<?php

namespace App\Http\Middleware;

use App\Jobs\ProcessVisitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\warning;

class VisitorCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'visited_at' => now(),
            'visited_route' => $request->path(),
        ];
        if($data['user_agent'] == '' || $data['user_agent'] == null){
            info('User agent not found for IP: ' . $data['ip_address']);
            return abort(403, 'User agent not found');
        }

        ProcessVisitor::dispatch($data);

        return $next($request);
    }
}
