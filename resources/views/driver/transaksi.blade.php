@extends('layoutsDriver.masterdriver')

@section('content')
    @include('layoutsDriver.navigation.navbardriver')
    <main>
        <h3 class="title-transaksi">#Transaksi</h3>
        <p class="link-text"><a href="/driver">Home</a>/<a href="/listpesanan">Listpesanan</a>/<a class="list-pesanan-link" href="">Transaksi</a></p>
        <div class="container-transaksi-conrent">
            <div class="container-product-info-transaksi">
                <div class="img-menu-transaksi">
                    <img src="{{asset('gallery/1685548360.jpg')}}" alt="">
                </div>
                <div class="desctiption-transaksi">
                    <p>Lorem Lorem ipsum dolor sit Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. lorem amet, consectetur adipisicing elit. Quaerat, nostrum illo </p>
                    <h3>Siap Kirim <img src="{{asset(asset('assetsDriver/'))}}" alt=""></h3>
                </div>
            </div>
            <div>
                <form action="" class="form-input-transaksi" method="post" enctype="multipart/form-data"> 
                    <input type="text" placeholder="Nama Penerima">
                    <input type="text" placeholder="Kelas">
                    <input type="text" placeholder="Total Biaya">
                    <input type="file">
                    <br>
                    <button>Lakukan Transaksi</button>
                </form>
            </div>
        </div>
    </main>
    @include('layoutsDriver.navigation.navbarbottom')
@endsection