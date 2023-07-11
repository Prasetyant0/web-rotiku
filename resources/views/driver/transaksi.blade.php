@extends('layoutsDriver.masterdriver')

@section('content')
    @include('layoutsDriver.navigation.navbardriver')
    <main>
        <h3 class="title-transaksi">#Transaksi</h3>
        <p class="link-text"><a href="/driver">Home</a>/<a href="/listpesanan">Listpesanan</a>/<a class="list-pesanan-link" href="">Transaksi</a></p>
        <div class="container-transaksi-conrent">
            <div class="container-product-info-transaksi">
                <div class="img-menu-transaksi">
                    <img src="{{asset('gallery/' .  $produk->beliRoti->gambar)}}" alt="">
                </div>
                <div class="desctiption-transaksi">
                    <p>{{ $produk->beliRoti->description }}</p>
                    <h3>Siap Kirim <img src="{{asset(asset('assetsDriver/'))}}" alt=""></h3>
                </div>
            </div>
            <div>
                <form action="{{ route('storeTransaksi' , $produk->id_pesanan) }}" class="form-input-transaksi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" placeholder="Nama Penerima" name="nama_penerima" required>
                    <input type="text" placeholder="Alamat" name="alamat" value="{{ $produk->alamat }}">
                    <input type="text" placeholder="Total Harga" name="total_harga" value="{{ $produk->total_bayar }}">
                    <input type="file" name="foto_bukti" required>
                    <br>
                    <button type="submit">Lakukan Transaksi</button>
                </form>
            </div>
        </div>
    </main>
    @include('layoutsDriver.navigation.navbarbottom')
@endsection
