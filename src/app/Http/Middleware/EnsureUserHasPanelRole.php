<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasPanelRole
{
    /**
     * Panel ID → required role mapping.
     * superadmin bypasses all checks.
     */
    private const PANEL_ROLES = [
        'admin'    => 'admin',
        'akademik' => 'akademik',
        'guru'     => 'guru',
        'orangtua' => 'orang_tua',
        'siswa'    => 'siswa',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('filament.admin.auth.login');
        }

        // super_admin can access all panels
        if ($user->hasRole('super_admin')) {
            return $next($request);
        }

        $panelId = Filament::getCurrentPanel()?->getId();
        $requiredRole = self::PANEL_ROLES[$panelId] ?? null;

        if ($requiredRole === null || ! $user->hasRole($requiredRole)) {
            abort(403, 'Anda tidak memiliki akses ke panel ini.');
        }

        return $next($request);
    }
}
