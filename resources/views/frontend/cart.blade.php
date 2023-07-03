@include('layoutsFrontend.head')

@include('layoutsFrontend.pagesMenuRoti.navbarmenu')

<main>
    <div class="cart-container container">
        <div class="subcontainer-cart">

            
            <div class="image-itmes-and-description">
                <div>
                    <img src="{{asset('assetsFrontend/images/bayar/1.jpg')}}" width="200" alt="">
                </div>
                <div class="title-and-subtitle-cart">
                    <h3 class="title-cart">Avocado Bagel Toastt</h3>
                    <p class="subtitle-cart">This bagel sandwich also completely customizable. Add in any other ingredients that you have on hand</p>
                    <div class="jumlah-dan-stok-cart">
                        <div>Jumlah 10</div>
                        <div class="vertikal-cart"></div>
                        <div class="stok-cart">Stok 20</div>
                    </div>
                    <a href="" class="hapus-cart">Hapus</a>
                </div>
                <div class="harga-cart">Rp1500000</div>
            </div>
        
            <div class="beli-intrac-cart">
                <h1>Cart</h1>
                <h3 class="title-intrac-cart">Total Belanja</h3>
                <div class="total-harga-intrac-cart">
                    <div>Total Harga (1 Barang)</div>   
                    <div class="harga-intrac-cart">Rp1500000</div>
                </div>

                <h3 class="title-intrac-cart">Biaya Transaksi</h3>
                <div>
                    <div class="biaya-transaksi">
                        <div>Biaya Layanan <i class="bi bi-exclamation-circle-fill not-cart-harga"></i></div>
                        <div class="harga-biaya-transaksi">Rp 1000</div>
                    </div>
                    <div class="biaya-jasa-aplikasi">
                        <div>Biaya Jasa Aplikasi<i class="bi bi-exclamation-circle-fill not-cart-harga"></i></div>
                        <div class="biaya-jasa-aplikasi-harga-cart">Rp -</div>
                    </div>
                </div>
                <button type="submit" style="width: 100%; border-radius:10px;" class="btn btn-primary button btn-bayar-cart"><span>Bayar</span></button>
            </div>
        </div>
    </div>
</main>