@include('layoutsFrontend.head')

{{-- navbar --}}
@include('layoutsFrontend.pagesMenuRoti.navbarmenu')
{{-- //navbar --}}

<form action="{{ route('bayar') }}" method="post">
    @csrf
    <div class="container">
        <div class="container-beli">
            <div class="wr-beli">
                <div class="view-barang">
                    <h1 class="belilangsung-text">Beli Langsung</h1>
                    <div class="troll-container">
                        <div class="img-container-troll">
                            <img class="img-troli" src="{{ asset('assetsFrontend/images/troli/troli.png') }}"
                                alt="">
                        </div>
                        <div class="text-notic-container">
                            <h6 class="notic-text">
                                Ini halaman terakhir dari proses belanjamu. Pastikan semua sudah benar, ya. :)
                            </h6>
                        </div>
                    </div>
                    <h3 class="barang-y-beli-text">Barang yang dibeli</h3>
                    <div class="store">
                        <div class="store-wp">
                            <div class="img-store-container">
                                <img src="{{ asset('assetsFrontend/images/avatars/avatar1.png') }}" width="30"
                                    alt="">
                            </div>
                            <div class="store">
                                <h6 class="store-text">Rotiku</h6>
                            </div>
                        </div>
                        <p class="address-text">Indonesia, West Java</p>
                    </div>
                    <div class="picmenu">
                        <div class="img-menu">
                            <img class="img-menu-image" src="{{ asset('gallery/' . $roti->gambar ) }}"
                                width="80" alt="">
                        </div>
                        <div class="descriprion-menu">
                            <p class="merek">{{ $roti->roti }}</p>
                            {{-- <p class="berat">800gr</p> --}}
                            <h5 class="harga">Rp <input  id="hargaRill" type="number" disabled
                                    class="textinputhargarill" value="{{ $roti->harga }}"></h5>
                        </div>
                    </div>
                    <div class="container-btn-t-k-stok-beli">
                        <label for="" style="margin-left: 95px;">|</label>
                        <div class="jumlah-beli-Container">
                            <button type="button" id="kurang" class="tambah-dan-kurang">-</button>
                            <input id="jumlah" class="jumlah jumlah-input" value="{{ session('bayar.quantity') }}"
                                disabled>
                            <button type="button" id="tambah" class="tambah-dan-kurang tambah-beli">+</button>
                        </div>
                    </div>
                </div>
                <div class="view-intrac-container-ringkasanbelanja">
                    <div class="content-text-ring">
                        <div class="head-ring">
                            <div class="head-content">
                                <h3>Ringkasan Belanja</h3>
                            </div>
                        </div>
                        <div class="container-hargadanbarang">
                            <p class="jdl-pebayaran-ring">Total Belanja</p>
                            <div class="body-ring">
                                <div class="flex-display-ring">
                                    <div class="lbl-ring">
                                        <p class="color-wt">Total Harga (<input type="number" disabled
                                                id="jumlahBarang" class="input-barang-style-beli"
                                                value="{{ session('bayar.quantity') }}"> Barang)</p>
                                    </div>
                                    <div class="total harga barang">
                                        <p class="total-harga-ring">Rp <input id="totalHarga"
                                                class="input-intrac-style-beli" type="number" disabled
                                                value="{{ session('bayar.total_bayar') }}"></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p class="jdl-pebayaran-ring">Biaya Transaksi</p>
                                <div class="flex-display-ring">
                                    <div class="lbl-ring">
                                        <p class="color-wt">Biaya Layanan <i class="bi bi-exclamation-circle-fill"></i>
                                        </p>
                                    </div>
                                    <div class="total harga barang">
                                        <p class="total-harga-ring right-harga-barang">Rp <input id="biayaLayanan"
                                                type="text" class="input-biaya-layanan" value="1000" disabled></p>
                                    </div>
                                </div>
                                <div class="flex-display-ring">
                                    <div class="lbl-ring">
                                        <p class="color-wt">Biaya Jasa Aplikasi <i
                                                class="bi bi-exclamation-circle-fill"></i></p>
                                    </div>
                                    <div class="total harga barang">
                                        <p class="total-harga-ring right-harga-jasa">Rp <span
                                                class="harga-text">-</span></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="flex-display-ring">
                                    <div class="lbl-ring">
                                        <p class="total-tagihan">Total Tagihan</p>
                                    </div>
                                    <div class="total harga barang">
                                        <p class="total-harga-ring total-tagihan">Rp <input type="number"
                                                id="totalTagihan" class="input-total-tagihan"
                                                value="{{ session('bayar.total_bayar') }}" disabled></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @foreach (session('bayar') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <button type="submit" style="width: 100%; border-radius:10px;"
                                class="btn btn-primary button btn-bayar">
                                <span>Bayar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var kurang = document.getElementById('kurang');
    var jumlah = document.getElementById('jumlah');
    var tambah = document.getElementById('tambah');

    var hargaRill = document.getElementById('hargaRill');
    var totalHarga = document.getElementById('totalHarga');
    var totalTagihan = document.getElementById('totalTagihan');

    var angka = 1;

    // event ketika tombol tambah di klik
    tambah.addEventListener('click', function() {
        angka += 1;
        jumlah.value = angka.toString();

        // Jika penambahan berhasil, maka harga dalam subtotal akan berubah
        var hargaRillValue = parseInt(hargaRill.value);
        var jumlahValue = parseInt(jumlah.value);

        totalHarga.value = (hargaRillValue * jumlahValue).toString();
        totalTagihan.value = totalHarga.value;
    })

    kurang.addEventListener('click', function() {
        // value angka -1 setiap klik
        angka -= 1;
        // angka minimum adalah 1
        angka = Math.max(1, angka);

        // tampilkan hasil tambah dari angka ke jumlah
        jumlah.value = angka.toString();

        // jika pengurangan berhasil, maka harga dalam subtotal akan berubah
        var hargaRillValue = parseInt(hargaRill.value);
        var jumlahValue = parseInt(jumlah.value);

        totalHarga.value = (hargaRillValue * jumlahValue).toString();
        totalTagihan.value = totalHarga.value;
    })
</script>
