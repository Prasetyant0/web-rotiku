@extends('layoutsDriver.masterdriver')

@section('content')
    @include('layoutsDriver.navigation.navbardriver')
        <main>
            <h3 class="title-semua-pesanan">#List Pesanan</h3>
            <p class="link-text"><a href="/driver">Home</a>/<a class="list-pesanan-link" href="">Listpesanan</a></p>
            <div class="container-listpesanan">
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/1685548360.jpg')}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit.</p>
                        <a href="/transaksi" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/1684421269.jpg')}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit.</p>
                        <a href="" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/1685548945.jpg')}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit.</p>
                        <a href="" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/1685548694.jpg')}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit.</p>
                        <a href="" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/1685548429.jpg')}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit.</p>
                        <a href="" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </main>
    @include('layoutsDriver.navigation.navbarbottom')
@endsection