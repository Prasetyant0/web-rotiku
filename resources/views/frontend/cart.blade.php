@include('layoutsFrontend.head')

@include('layoutsFrontend.pagesMenuRoti.navbarmenu')

<main>
    <div class="cart-container container">
        <div class="subcontainer-cart">

            @foreach ($cart as $index => $data)
                <div id="card_c_{{ $index }}" class="image-itmes-and-description">
                    <div>
                        <img src="{{asset('gallery/' . $data->itemRoti->gambar)}}" class="img-cart-s" alt="">
                    </div>
                    <div class="title-and-subtitle-cart">
                        <h3 class="title-cart">{{ $data->itemRoti->roti }}</h3>
                        <p class="subtitle-cart">{{ $data->itemRoti->description }}</p>
                        <div class="jumlah-dan-stok-cart">
                            <div>Jumlah {{ $data->jumlah }}</div>
                            <div class="vertikal-cart"></div>
                            <div class="stok-cart">Stok {{ $data->itemRoti->stok }}</div>
                        </div>
                        <a href="{{ route('delete.cart', $data->id_cart) }}" class="btn hapus-cart" id="delete">Hapus</a>
                    </div>
                    <div class="harga-cart">Rp<span><input id="harga_barang" type="number" class="harga-cart-vall" disabled value="{{ $data->total_harga }}"></span></div>
                </div>
            @endforeach

            <div class="beli-intrac-cart">
                <form action="" method="post">
                    @csrf
                    <h1>Cart</h1>
                    <h3 class="title-intrac-cart">Total Belanja</h3>
                    <div class="total-harga-intrac-cart">
                        <div>Total Harga ({{$cartQuantityItems}} Barang)</div>
                        <div class="harga-intrac-cart">Rp <span><input id="total_harga" type="number" class="input-cart-total" disabled value="{{$subtotal}}"></span></div>
                    </div>

                    <h3 class="title-intrac-cart">Biaya Transaksi</h3>
                    <div>
                        <div class="biaya-transaksi">
                            <div>Biaya Layanan
                                <i class="bi bi-exclamation-circle-fill not-cart-harga"></i>
                            </div>
                            <div class="harga-biaya-transaksi f-biaya-layanan">
                            <span>Rp</span><input id="biaya_layanan" class="input-cart-total" type="number" disabled value="1000">
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
                                    <input id="total_tagian" class="input-harga-tagian-cart" type="number" disabled value="{{$subtotal + $biayaLayanan}}">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="address" class="address-cart" id="" placeholder="address">
                <button type="submit" style="width: 100%; border-radius:10px;" class="btn btn-primary button btn-bayar-cart"><span>Pesan</span></button>
            </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', async function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            const swalResult = await Swal.fire({
                title: 'Apakah kamu ingin menghapus data ini?',
                text: "Data akan terhapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            });

            if (swalResult.isConfirmed) {
                await Swal.fire(
                    'Terhapus!',
                    'Data telah terhapus!',
                    'success'
                );
                window.location.href = link;
            }
        });
    });
</script>

@include('sweetalert::alert')
