<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Panel definitions: id → [label, path, icon, color, description]
     */
    private const PANELS = [
        'admin'    => [
            'label'       => 'Admin',
            'path'        => '/admin',
            'icon'        => 'shield',
            'color'       => '#3B82F6',
            'description' => 'Manajemen pengguna, role & konfigurasi sistem',
        ],
        'akademik' => [
            'label'       => 'Akademik',
            'path'        => '/akademik',
            'icon'        => 'book-open',
            'color'       => '#F59E0B',
            'description' => 'Kurikulum, jadwal, nilai & laporan akademik',
        ],
        'guru'     => [
            'label'       => 'Guru',
            'path'        => '/guru',
            'icon'        => 'users',
            'color'       => '#10B981',
            'description' => 'Absensi, tugas, penilaian & kelas Anda',
        ],
        'orangtua' => [
            'label'       => 'Orang Tua',
            'path'        => '/orangtua',
            'icon'        => 'home',
            'color'       => '#8B5CF6',
            'description' => 'Pantau perkembangan & kehadiran putra-putri',
        ],
        'siswa'    => [
            'label'       => 'Siswa',
            'path'        => '/siswa',
            'icon'        => 'graduation-cap',
            'color'       => '#EC4899',
            'description' => 'Jadwal, tugas, nilai & informasi sekolah',
        ],
    ];

    /** Role → allowed panel IDs (non-superadmin) */
    private const ROLE_PANELS = [
        'admin'     => ['admin'],
        'akademik'  => ['akademik'],
        'guru'      => ['guru'],
        'orang_tua' => ['orangtua'],
        'siswa'     => ['siswa'],
    ];

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('super_admin')) {
            $panels = self::PANELS;
        } else {
            $allowed = [];
            foreach (self::ROLE_PANELS as $role => $ids) {
                if ($user->hasRole($role)) {
                    foreach ($ids as $id) {
                        $allowed[$id] = self::PANELS[$id];
                    }
                }
            }

            $panels = $allowed;
        }

        return view('dashboard', compact('user', 'panels'));
    }
}
