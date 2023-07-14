@extends('layoutsDriver.masterdriver')

@section('content')
    @include('layoutsDriver.navigation.navbardriver')
        <main>
            <h3 class="title-semua-pesanan">#List Pesanan</h3>
            <p class="link-text"><a href="/driver">Home</a>/<a class="list-pesanan-link" href="">Listpesanan</a></p>
            <div class="container-listpesanan">
                @foreach ($showPesanan as $pesanan)
                <div class="card-semua-pesanan-driver">
                    <div class="img-list-pensanan">
                        <img src="{{asset('gallery/' . $pesanan->beliRoti->gambar)}}" alt="">
                    </div>
                    <div class="message-text">
                        <p>{{ $pesanan->beliRoti->description }}</p>
                        <a href="{{ route('transaksi.form', $pesanan->id_pesanan) }}" class="btn-siap-kirim">Terkirim <img src="{{asset('assetsDriver/images/icon/verry.png')}}" alt=""></a>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    @include('layoutsDriver.navigation.navbarbottom')
@endsection
