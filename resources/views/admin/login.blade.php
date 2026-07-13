<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola - Sanggar Seni Tari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">

    <div class="login-card">
        <div class="login-header">
            <!-- Back to website link -->
            <a href="{{ route('home') }}" style="font-size: 0.85rem; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: inline-block; margin-bottom: 20px;">
                &larr; Kembali ke Website
            </a>
            <h2>Login Administrator</h2>
            <p>Masukkan akun pengelola untuk mengupdate konten website sanggar</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="padding: 10px 14px; font-size: 0.85rem;">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Terdaftar</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="contoh: admin@sanggar.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group" style="margin-bottom: 24px;">
                <label for="password" class="form-label">Kata Sandi (Password)</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
            </div>

            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <label class="form-checkbox">
                    <input type="checkbox" name="remember"> Ingat Saya
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px;">
                Masuk ke Panel Pengelola
            </button>
        </form>
    </div>

</body>
</html>
