@extends('layoutsDriver.masterdriver')

@section('content')
    @include('layoutsDriver.navigation.navbardriver')
    <main>
        <h3 class="title-semua-pesanan">#Profile</h3>
        <p class="link-text"><a href="/driver">Home</a>/<a class="list-profile-link" href="">Profile</a></p>
        <a href="" class="logout-driver">Log-Out</a>
        <div>
            <div class="foto-dan-name">
                <img class="profile-profile-driver" src="{{asset('assetsDriver/images/profile-profile.png')}}" alt="">
                <h4>Jajang Perkasa</h4>
                <p>jajangperkasa212@gmail.com</p>
            </div>
            <div class="bg-1 profile-driver-his">
                <div class="w-profile-driver">
                    <div>
                        <h1 class="title-p-d-driver">201</h1>
                        <p class="description-p-d-driver">Total Pesanan yang Kamu Kirim</p>
                    </div>
                    <div class="con-pesanan-b-d">
                        <h1 class="title-p-d-driver">192</h1>
                        <p class="description-p-d-driver">Pesanan yang Belum di Kirim</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layoutsDriver.navigation.navbarbottom')
@endsection