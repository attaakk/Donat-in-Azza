<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Donat-in azza</title>
    <style>
        :root {
            --pink-50: #FFF0F5;
            --pink-100: #FFE3EE;
            --pink-500: #FF4D8D;
            --pink-700: #D92B6B;
            --gold: #D4AF37;
            --dark: #2D2A2B;
            --light: #FFFFFF;
            --font-sans: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-serif: 'Georgia', 'Times New Roman', serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-sans);
            background-color: var(--pink-50);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .auth-card {
            background: var(--light);
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(255, 77, 141, 0.12);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 700;
            color: var(--pink-500);
            margin-bottom: 1.5rem;
            display: block;
            text-decoration: none;
        }
        .logo span { color: var(--gold); }
        .form-group { margin-bottom: 1.5rem; text-align: left; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--dark); font-size: 0.9rem; }
        .form-control {
            width: 100%; padding: 0.9rem 1.2rem; border: 2px solid var(--pink-100);
            border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--light);
            transition: all 0.3s;
        }
        .form-control:focus { outline: none; border-color: var(--pink-500); }
        .btn {
            display: block; width: 100%; padding: 0.9rem; border-radius: 100px;
            font-weight: 600; font-size: 1rem; border: none; cursor: pointer;
            transition: all 0.3s;
        }
        .btn-primary { background: var(--pink-500); color: var(--light); }
        .btn-primary:hover { background: var(--pink-700); transform: translateY(-2px); }
        .error-msg { color: #E74C3C; font-size: 0.85rem; margin-bottom: 1rem; text-align: left; }
        .link { color: var(--pink-500); text-decoration: none; font-weight: 600; }
        .link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="auth-card">
        <a href="/" class="logo">🍩 Donat-in<span> azza</span></a>
        <h2 style="margin-bottom: 0.5rem; color: var(--dark);">Selamat Datang Kembali</h2>
        <p style="color: #5A5557; font-size: 0.9rem; margin-bottom: 2rem;">Silakan login untuk mulai pesan donat manis.</p>

        @if($errors->any())
            <div class="error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Contoh: aku@email.com" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">Masuk</button>
        </form>

        <p style="margin-top: 2rem; font-size: 0.9rem; color: #5A5557;">
            Belum punya akun? <a href="/register" class="link">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>
