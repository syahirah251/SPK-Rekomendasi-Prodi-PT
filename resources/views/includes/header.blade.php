<header class="header">
    <!-- School Name Section (Aligned to the Left) -->
    <div class="school-name">
        <h1>SMAN 1 Wonoayu</h1>
    </div>

    <!-- User Greeting and Authentication Buttons Section (Aligned to the Right) -->
    <div class="user-section">
        @if(Auth::check())
            <div class="user-info">
                <span class="welcome-text">Selamat datang, {{ Auth::user()->name }}!</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @else
            <div class="auth-buttons">
                <form action="{{ route('login') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <a href="{{ route('register') }}" class="btn btn-success">Registrasi</a>
            </div>
        @endif
    </div>
</header>

<!-- Styles -->
<style>
    .header {
        background-color: blue; /* Warna latar biru */
        position: relative;
        height: 60px; /* Tinggi header */
    }
    .school-name {
        position: absolute;
        top: 10px;
        left: 10px;
    }
    .school-name h1 {
        font-size: 1.5rem;
        color: white;
        margin: 0;
    }
    .user-section {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        gap: 10px; /* Memberikan jarak antar elemen di dalam user-section */
    }
    .user-info {
        display: flex;
        align-items: center;
        gap: 10px; /* Memberikan jarak antara teks dan tombol */
    }
    .auth-buttons {
        display: flex;
        align-items: center;
        gap: 10px; /* Memberikan jarak antara tombol Login dan Registrasi */
    }
    .welcome-text {
        font-size: 1rem;
        color: white;
        margin: 0;
    }
    .btn {
        padding: 8px 16px;
        font-size: 1rem;
        color: white;
        text-decoration: none;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff;
    }
    .btn-success {
        background-color: #28a745;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    /* Responsiveness */
    @media (max-width: 768px) {
        .school-name h1 {
            font-size: 1.2rem;
        }
        .welcome-text {
            font-size: 0.9rem;
        }
        .btn {
            font-size: 0.9rem;
            padding: 6px 12px;
        }
    }
</style>
