@include('layoutsFrontend.head')

@include('layoutsFrontend.pagesMenuRoti.navbarmenu')

<main>
    <div class="cart-container container">
        <div class="subcontainer-cart">

            @foreach ($cart as $index => $data)
            <div id="card_c_{{ $index }}" class="image-itmes-and-description">
                <div>
                    <img src="{{asset('gallery/' . $data->itemRoti->gambar)}}" width="200" alt="">
                </div>
                <div class="title-and-subtitle-cart">
                    <h3 class="title-cart">{{ $data->itemRoti->roti }}</h3>
                    <p class="subtitle-cart">{{ $data->itemRoti->description }}</p>
                    <div class="jumlah-dan-stok-cart">
                        <div>Jumlah {{ $data->jumlah }}</div>
                        <div class="vertikal-cart"></div>
                        <div class="stok-cart">Stok {{ $data->itemRoti->stok }}</div>
                    </div>
                    <a href="" class="btn hapus-cart">Hapus</a>
                </div>
                <div class="harga-cart">Rp<span><input id="harga_barang" type="number" class="harga-cart-vall" disabled value="{{ $data->total_harga }}"></span></div>
            </div>
            @endforeach

            <div class="beli-intrac-cart">
                <h1>Cart</h1>
                <h3 class="title-intrac-cart">Total Belanja</h3>
                <div class="total-harga-intrac-cart">
                    <div>Total Harga (1 Barang)</div>
                    <div class="harga-intrac-cart">Rp <span><input id="total_harga" type="number" class="input-cart-total" value="0"></span></div>
                </div>

                <h3 class="title-intrac-cart">Biaya Transaksi</h3>
                <div>
                    <div class="biaya-transaksi">
                        <div>Biaya Layanan 
                            <i class="bi bi-exclamation-circle-fill not-cart-harga"></i>
                        </div>
                        <div class="harga-biaya-transaksi f-biaya-layanan"> 
                            <span>Rp</span><input id="biaya_layanan" class="input-cart-total" type="number" value="1000">
                        </div>
                    </div>
                    <div class="biaya-jasa-aplikasi">
                        <div>Biaya Jasa Aplikasi<i class="bi bi-exclamation-circle-fill not-cart-harga"></i></div>
                        <div class="biaya-jasa-aplikasi-harga-cart">Rp -</div>
                    </div>
                    <hr>
                    <div class="biaya-jasa-aplikasi ">
                        <div class="total-tagian-text total-tagian-cont">Total Tagihan 
                            <div class="w-rp-card-cart-input total-tagian">
                                <span>
                                    Rp
                                </span>
                                <span>
                                    <input id="total_tagian" class="input-harga-tagian-cart" type="number" disabled value="0">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" style="width: 100%; border-radius:10px;" class="btn btn-primary button btn-bayar-cart"><span>Bayar</span></button>
            </div>
        </div>
    </div>
</main>



<script>
    // Melakukan perulangan untuk mendapatkan semua elemen dengan ID yang unik
    var cards = document.querySelectorAll('[id^="card_c_"]');

    cards.forEach(function(card) {
        var hargaBarang = card.querySelector('.harga-cart-vall');
        var totalHarga = document.getElementById('total_harga');
        var biayaLayanan = document.getElementById('biaya_layanan');
        var totalTagian = document.getElementById('total_tagian');

        var hargaBarangInt = parseInt(hargaBarang.value);
        var biayaLayananInt = parseInt(biayaLayanan.value);
        var totalHargaInt = parseInt(totalHarga.value);

        card.addEventListener('click', function() {
            totalHarga.value = hargaBarangInt.toString();

            var tagihanHit = totalHargaInt + hargaBarangInt + biayaLayananInt;

            totalTagian.value = tagihanHit.toString();
        });
    });
</script>
