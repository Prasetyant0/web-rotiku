@extends('layoutsDriver.masterdriver')

@section('content')
    <main>
        @include('layoutsDriver.navigation.navbardriver')
        
        <div class="bg-1">
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
        <div class="bg-2">
            <div class="content-bg-2">
                <div class="promotion">
                    <div class="image-promotion">
                        <img class="size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                        <img class="img-slide size-image-slide-drive" src="{{asset('assetsDriver/images/carousel/s1.png')}}" alt="" width="200px">
                    </div>
                </div>
                <div class="container-semua-pesanan">
                    <h3 class="semua-pesanan-title">Semua Pesanan</h3>
                    <hr class="underline">
                    <div class="card-container-pesanan-drive">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685548360.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685548507.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684821865.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684821969.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685548429.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684421269.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685549227.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684729890.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685549122.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684821447.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1685548778.jpg')}}" alt="">                                        
                            <img class="card-pesanan-drive size-card-drive" src="{{asset('gallery/1684488566.jpg')}}" alt="">  
                    </div>
                </div>
            </div>
            @include('layoutsDriver.navigation.navbarbottom')
        </div>
    </main>

@endsection