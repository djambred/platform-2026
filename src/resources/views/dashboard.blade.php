<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Panel — Rumpun Ilmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand:       #1A6B4A;
            --brand-dark:  #124D36;
            --brand-light: #E8F5EF;
            --brand-mid:   #2E9E6E;
            --surface:     #FDFCF9;
            --panel-bg:    #F7F5F0;
            --text-primary:#1C1C1A;
            --text-muted:  #6B6B66;
            --border:      rgba(28,28,26,.1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--surface);
            color: var(--text-primary);
            min-height: 100vh;
        }

        /* ── Top bar ──────────────────────────────────────────────── */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 2rem;
            border-bottom: 1px solid var(--border);
            background: #fff;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: .625rem;
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-mark svg {
            width: 18px;
            height: 18px;
            stroke: #fff;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .brand-name {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--brand);
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
        }

        .user-name {
            font-size: .875rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: .375rem;
            padding: .45rem .875rem;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: transparent;
            font-family: 'DM Sans', sans-serif;
            font-size: .82rem;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, color .15s;
        }

        .btn-logout:hover {
            background: #FEF2F2;
            border-color: #FCA5A5;
            color: #991B1B;
        }

        .btn-logout svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* ── Main ──────────────────────────────────────────────────── */
        .main {
            max-width: 960px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
        }

        .page-heading {
            margin-bottom: 2.5rem;
        }

        .page-heading h1 {
            font-family: 'Lora', serif;
            font-size: 1.875rem;
            font-weight: 600;
            color: var(--text-primary);
            letter-spacing: -.02em;
        }

        .page-heading p {
            font-size: .95rem;
            color: var(--text-muted);
            margin-top: .375rem;
        }

        /* ── Panel grid ────────────────────────────────────────────── */
        .panel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.25rem;
        }

        .panel-card {
            display: flex;
            flex-direction: column;
            text-decoration: none;
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            transition: transform .15s, box-shadow .15s, border-color .15s;
            cursor: pointer;
        }

        .panel-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0,0,0,.08);
            border-color: var(--panel-accent);
        }

        .panel-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
        }

        .panel-icon-wrap svg {
            width: 24px;
            height: 24px;
            stroke: #fff;
            fill: none;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .panel-label {
            font-family: 'Lora', serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: .375rem;
        }

        .panel-desc {
            font-size: .855rem;
            color: var(--text-muted);
            line-height: 1.55;
            flex: 1;
        }

        .panel-arrow {
            margin-top: 1.25rem;
            display: flex;
            align-items: center;
            gap: .375rem;
            font-size: .82rem;
            font-weight: 600;
            letter-spacing: .03em;
        }

        .panel-arrow svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: transform .15s;
        }

        .panel-card:hover .panel-arrow svg {
            transform: translateX(4px);
        }
    </style>
</head>
<body>

{{-- Top bar --}}
<header class="topbar">
    <div class="topbar-brand">
        <div class="brand-mark">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <span class="brand-name">Rumpun Ilmu</span>
    </div>

    <div class="topbar-user">
        <img
            src="{{ $user->getFilamentAvatarUrl() }}"
            alt="{{ $user->name }}"
            class="user-avatar"
        >
        <span class="user-name">{{ $user->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                Keluar
            </button>
        </form>
    </div>
</header>

{{-- Main content --}}
<main class="main">
    <div class="page-heading">
        <h1>Selamat datang, {{ explode(' ', $user->name)[0] }}!</h1>
        <p>Pilih panel yang ingin Anda akses.</p>
    </div>

    <div class="panel-grid">
        @php
            $icons = [
                'shield'         => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
                'book-open'      => '<path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/>',
                'users'          => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
                'home'           => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
                'graduation-cap' => '<path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c0 1.66 4 3 6 3s6-1.34 6-3v-5"/>',
            ];
        @endphp

        @foreach ($panels as $id => $panel)
            <a
                href="{{ $panel['path'] }}"
                class="panel-card"
                style="--panel-accent: {{ $panel['color'] }}20; border-color: var(--border);"
                onmouseenter="this.style.borderColor='{{ $panel['color'] }}40'"
                onmouseleave="this.style.borderColor=''"
            >
                <div class="panel-icon-wrap" style="background: {{ $panel['color'] }}">
                    <svg viewBox="0 0 24 24">{!! $icons[$panel['icon']] ?? '' !!}</svg>
                </div>
                <div class="panel-label">{{ $panel['label'] }}</div>
                <div class="panel-desc">{{ $panel['description'] }}</div>
                <div class="panel-arrow" style="color: {{ $panel['color'] }}">
                    Masuk ke panel
                    <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
        @endforeach
    </div>
</main>

</body>
</html>
