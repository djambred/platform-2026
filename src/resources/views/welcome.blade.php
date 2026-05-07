{{-- resources/views/auth/login.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Rumpun Ilmu</title>
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
            --accent:      #F4A826;
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
            display: flex;
        }

        /* ── Left panel ─────────────────────────────────────────── */
        .panel-left {
            display: none;
            width: 44%;
            background: var(--brand);
            position: relative;
            overflow: hidden;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
        }

        @media (min-width: 1024px) { .panel-left { display: flex; } }

        .panel-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(255,255,255,.06) 0%, transparent 70%),
                radial-gradient(ellipse 40% 40% at 90% 10%, rgba(244,168,38,.12) 0%, transparent 60%);
        }

        .panel-left::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,.1);
        }

        .panel-brand {
            position: relative;
            z-index: 1;
        }

        .panel-brand-name {
            font-family: 'Lora', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #fff;
            letter-spacing: -.02em;
            line-height: 1.2;
        }

        .panel-brand-sub {
            font-size: .85rem;
            color: rgba(255,255,255,.65);
            margin-top: .4rem;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .panel-features {
            position: relative;
            z-index: 1;
        }

        .panel-features-title {
            font-family: 'Lora', serif;
            font-size: 1.75rem;
            font-weight: 400;
            font-style: italic;
            color: rgba(255,255,255,.9);
            line-height: 1.4;
            margin-bottom: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: .875rem;
            padding: .75rem 0;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .feature-dot {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255,255,255,.12);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-dot svg {
            width: 16px;
            height: 16px;
            stroke: rgba(255,255,255,.8);
            fill: none;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .feature-text {
            font-size: .875rem;
            color: rgba(255,255,255,.8);
            line-height: 1.5;
        }

        .panel-jenjang {
            position: relative;
            z-index: 1;
            display: flex;
            gap: .5rem;
        }

        .jenjang-pill {
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: .3rem .7rem;
            border-radius: 20px;
            background: rgba(255,255,255,.12);
            color: rgba(255,255,255,.75);
        }

        /* ── Right / form panel ─────────────────────────────────── */
        .panel-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            background: var(--surface);
        }

        .form-card {
            width: 100%;
            max-width: 420px;
        }

        /* Mobile top brand */
        .mobile-brand {
            display: flex;
            align-items: center;
            gap: .625rem;
            margin-bottom: 2.5rem;
        }

        @media (min-width: 1024px) { .mobile-brand { display: none; } }

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

        .mobile-brand-name {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--brand);
        }

        /* Form heading */
        .form-heading {
            margin-bottom: 2rem;
        }

        .form-heading h1 {
            font-family: 'Lora', serif;
            font-size: 1.875rem;
            font-weight: 600;
            color: var(--text-primary);
            letter-spacing: -.02em;
        }

        .form-heading p {
            font-size: .9rem;
            color: var(--text-muted);
            margin-top: .375rem;
        }

        /* Alert */
        .alert-error {
            border-radius: 10px;
            background: #FEF2F2;
            border: 1px solid #FCA5A5;
            color: #991B1B;
            font-size: .85rem;
            padding: .75rem 1rem;
            margin-bottom: 1.25rem;
        }

        /* Form fields */
        .field {
            margin-bottom: 1.25rem;
        }

        .field label {
            display: block;
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: .5rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg.input-icon {
            position: absolute;
            left: .875rem;
            top: 50%;
            transform: translateY(-50%);
            width: 17px;
            height: 17px;
            stroke: var(--text-muted);
            fill: none;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .field input[type="text"],
        .field input[type="password"] {
            width: 100%;
            height: 46px;
            border-radius: 10px;
            border: 1.5px solid var(--border);
            background: var(--panel-bg);
            padding: 0 1rem 0 2.75rem;
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            color: var(--text-primary);
            outline: none;
            transition: border-color .15s, background .15s, box-shadow .15s;
        }

        .field input:focus {
            border-color: var(--brand-mid);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(46,158,110,.12);
        }

        .field-error {
            font-size: .78rem;
            color: #DC2626;
            margin-top: .3rem;
        }

        /* Toggle password */
        .toggle-pw {
            position: absolute;
            right: .875rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            color: var(--text-muted);
            display: flex;
        }

        .toggle-pw svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Remember + forgot */
        .form-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .85rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--brand);
            cursor: pointer;
        }

        .forgot-link {
            font-size: .85rem;
            color: var(--brand);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover { text-decoration: underline; }

        /* Submit button */
        .btn-submit {
            width: 100%;
            height: 48px;
            border-radius: 10px;
            background: var(--brand);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            transition: background .15s, transform .1s;
        }

        .btn-submit:hover  { background: var(--brand-dark); }
        .btn-submit:active { transform: scale(.98); }

        .btn-submit svg {
            width: 16px;
            height: 16px;
            stroke: rgba(255,255,255,.8);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Role hint */
        .role-hint {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .role-hint-title {
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: .875rem;
        }

        .role-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .5rem;
        }

        .role-chip {
            border-radius: 8px;
            background: var(--panel-bg);
            border: 1px solid var(--border);
            padding: .6rem .5rem;
            text-align: center;
            cursor: pointer;
            transition: background .12s, border-color .12s;
        }

        .role-chip:hover {
            background: var(--brand-light);
            border-color: rgba(46,158,110,.25);
        }

        .role-chip-code {
            font-size: .9rem;
            font-weight: 700;
            color: var(--brand);
            font-variant-numeric: tabular-nums;
        }

        .role-chip-name {
            font-size: .7rem;
            color: var(--text-muted);
            margin-top: .15rem;
        }
    </style>
</head>
<body>

{{-- Left panel --}}
<div class="panel-left">
    <div class="panel-brand">
        <div class="panel-brand-name">Rumpun Ilmu</div>
        <div class="panel-brand-sub">Sistem Manajemen Akademik</div>
    </div>

    <div class="panel-features">
        <p class="panel-features-title">Kelola akademik sekolah Anda<br>dalam satu platform.</p>

        <div class="feature-item">
            <div class="feature-dot">
                <svg viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h10"/></svg>
            </div>
            <span class="feature-text">Manajemen data siswa, guru & kelas</span>
        </div>

        <div class="feature-item">
            <div class="feature-dot">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            </div>
            <span class="feature-text">Penjadwalan & presensi digital</span>
        </div>

        <div class="feature-item">
            <div class="feature-dot">
                <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2h-2"/></svg>
            </div>
            <span class="feature-text">Penilaian, rapor digital & analitik</span>
        </div>

        <div class="feature-item">
            <div class="feature-dot">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </div>
            <span class="feature-text">Portal orang tua real-time</span>
        </div>
    </div>

    <div class="panel-jenjang">
        <span class="jenjang-pill">TK</span>
        <span class="jenjang-pill">SD</span>
        <span class="jenjang-pill">SMP</span>
        <span class="jenjang-pill">SMA</span>
    </div>
</div>

{{-- Right panel (form) --}}
<div class="panel-right">
    <div class="form-card">

        {{-- Mobile brand --}}
        <div class="mobile-brand">
            <div class="brand-mark">
                <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <span class="mobile-brand-name">Rumpun Ilmu</span>
        </div>

        <div class="form-heading">
            <h1>Selamat datang</h1>
            <p>Masuk ke akun Anda untuk melanjutkan.</p>
        </div>

        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Username --}}
            <div class="field">
                <label for="login">Username / Email</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                    <input
                        id="login"
                        type="text"
                        name="login"
                        value="{{ old('login') }}"
                        placeholder="A-001 / G-001 / S-001 / email"
                        autocomplete="username"
                        required
                    >
                </div>
                @error('login')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required
                    >
                    <button type="button" class="toggle-pw" aria-label="Tampilkan password" onclick="togglePw()">
                        <svg id="pw-icon-show" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="pw-icon-hide" viewBox="0 0 24 24" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19M1 1l22 22"/></svg>
                    </button>
                </div>
                @error('password')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-meta">
                <label class="remember-label">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>
                <a href="#" class="forgot-link">Lupa password?</a>
            </div>

            <button type="submit" class="btn-submit">
                Masuk
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>

        {{-- Role hint --}}
        <div class="role-hint">
            <p class="role-hint-title">Format username</p>
            <div class="role-grid">
                <div class="role-chip" onclick="fillLogin('A-001')">
                    <div class="role-chip-code">A-xxx</div>
                    <div class="role-chip-name">Akademik</div>
                </div>
                <div class="role-chip" onclick="fillLogin('G-001')">
                    <div class="role-chip-code">G-xxx</div>
                    <div class="role-chip-name">Guru</div>
                </div>
                <div class="role-chip" onclick="fillLogin('S-001')">
                    <div class="role-chip-code">S-xxx</div>
                    <div class="role-chip-name">Siswa</div>
                </div>
                <div class="role-chip" onclick="fillLogin('O-001')">
                    <div class="role-chip-code">O-xxx</div>
                    <div class="role-chip-name">Orang tua</div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function togglePw() {
    const input = document.getElementById('password');
    const show  = document.getElementById('pw-icon-show');
    const hide  = document.getElementById('pw-icon-hide');
    if (input.type === 'password') {
        input.type = 'text';
        show.style.display = 'none';
        hide.style.display = 'block';
    } else {
        input.type = 'password';
        show.style.display = 'block';
        hide.style.display = 'none';
    }
}

function fillLogin(val) {
    const el = document.getElementById('login');
    el.value = val;
    el.focus();
}
</script>

</body>
</html>
