@include('layoutsFrontend.head')

<nav class="navabar-notif">
    <div class="navbar-items-notif">
        <div class="nav-items-container">
            <div class="navbar-items"><a href="">Home</a> </div>
            <div class="navbar-items"><a href="">Dashboard</a></div>
            <div class="navbar-items"><a href="">Data Roti</a> </div>
            <div class="navbar-items"><a href="">Pesanan</a></div>
            <div class="navbar-items"><a href="">Kategori</a></div>
        </div>
        <div class="container-btn-items">
            <div>
                <a href="{{route('login.admin')}}" class="btn-masuk-user-notif">Masuk <span class="text-user-masuk-notif">| User</span> </a>
            </div>
        </div>
    </div>
</nav>
<main>
    <div class="container-main-notif">
        <h1>Kamu Bukan <span>User</span></h1>
        <p class="quot-notif">Kamu harus login sebagai <span> user</span> untuk mengakses halaman ini!</p>
    </div>
</main>