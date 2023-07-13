@include('layoutsFrontend.head')

@include('layoutsFrontend.pagesMenuRoti.navbarmenu')
<div class="container container-invoice">
    <form id="beli-form" action="{{ route('confirm') }}" method="POST">
        @csrf
        <input type="hidden" name="id_roti" id="idRoti" value="{{ $invoice->id_roti }}">
        <div class="rowinvoice">
            <div class="image">
                <img class="main-image" src="{{ asset('gallery/' . $invoice->gambar) }}" alt="{{ $invoice->roti }}">
            </div>
            <div class="description-infoice">
                <h1 class="title">{{ $invoice->roti }}</h1>
                <p class="stok">Stok @php
                    $res = DB::select(DB::raw('CALL `hitungStok`(' . $invoice->id_roti . ', @output)'));
                    $opt = DB::select(DB::raw('SELECT @output AS hasil'))[0];
                    echo $opt->hasil == null ? 0 : $opt->hasil;
                @endphp</p>
                <div class="harga-invoice">Rp <span id="harga"><input class="harga-invoice" id="harga"
                            type="number" value="{{ $invoice->harga }}"
                            style="border: none; background-color:transparent;" disabled></span></div>
                <div class="detail">
                    <div class="class rincian">
                        <hr style="position: relative; top:20px;">
                        <p class="detail-text">Detail</p>
                        <hr style="position: relative; bottom:10px;">
                        Berat Satuan: 800 g <br>
                        Kategori: {{ $kategori->kategori }} <br>
                        Etalase: ROTI BREAD <br>
                        Grandpas VEGAN TOAST BREAD WHOLEMEAL - ROTI TAWAR GANDUM <br>
                    </div>

                    <div class="description-text">
                        {{ $invoice->description }}
                    </div>
                </div>
            </div>
            <div class="container-interaction">
                <div class="cardnyam button" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="nyam-text">
                        Rotiku NYAM!
                    </div>
                </div>
                <div class="card-jumlah-dan-catatan">
                    <div class="contet-interaction-invoice">
                        <h6 class="atur-jumlah-text">Atur jumlah dan catatan</h6>
                        {{-- <p class="kemasan">Whole Utuh</p> --}}
                        <hr>
                        <div class="container-btn-t-k-stok">
                            <div class="jumlah-beli-Container-invoice">
                                <button type="button" id="kurang" class="tambah-dan-kurang">-</button>
                                <input id="jumlah" type="number" class="jumlah jumlah-input" value="1"
                                    disabled>
                                <button type="button" id="tambah" class="tambah-dan-kurang tambah">+</button>
                            </div>
                            <div class="stok-in-interaction">
                                Stok: <span style="font-weight: bold;"> @php
                                    $res = DB::select(DB::raw('CALL `hitungStok`(' . $invoice->id_roti . ', @output)'));
                                    $opt = DB::select(DB::raw('SELECT @output AS hasil'))[0];
                                    echo $opt->hasil == null ? 0 : $opt->hasil;
                                @endphp </span>
                            </div>
                        </div>
                        <p class="min-pembelian">Catatan*(Wajib diisi!)</p>
                        <div class="tambahcatatan-container">

                            <input class="catatan-input" type="text" autocomplete="off" name="alamat" id="catatan"
                                placeholder="Contoh: Kelas 12 RPL" required>

                        </div>
                        <p class="subtotal-text">
                            Sub Total: <span
                                style="font-weight: bold; position: absolute; right:0; margin-right:20px;">Rp
                                <span id="subtotal"><input style="font-weight: bold;" type="number"
                                        value="{{ $invoice->harga }}" class="input-intrac-style" disabled
                                        name="totalHarga" id="totalHarga"></span></span>
                        </p>
                        <div>
                            @php
                                $res = DB::select(DB::raw('CALL `hitungStok`(' . $invoice->id_roti . ', @output)'));
                                $opt = DB::select(DB::raw('SELECT @output AS hasil'))[0];
                                $hasil = $opt->hasil == null ? 0 : $opt->hasil;
                            @endphp

                            @if ($hasil)
                                <button type="button" class="btn-beli-dan-keranjang btn-tambah-keranjang"
                                    onclick="tambahKeKeranjang()">Tambah Ke Keranjang</button>
                                <button class="btn-beli-dan-keranjang btn-beli-menu" type="submit">Beli
                                    Langsung</button>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                    </symbol>
                                </svg>
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Info:">
                                        <use xlink:href="#info-fill" />
                                    </svg>
                                    <div style="font-style: italic;">
                                        Stok kosong
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
    </form>
</div>
<script>
    // Ambil setiap elemen berdasarkan id
    var kurang = document.getElementById('kurang');
    var jumlah = document.getElementById('jumlah');
    var tambah = document.getElementById('tambah');
    var harga = document.getElementById('harga');
    var subtotal = document.getElementById('subtotal');

    var angka = 1;

    // Buat sebuah aksi atau event ketika tombol tambah di klik, maka angka +1
    tambah.addEventListener('click', function() {
        angka += 1;
        jumlah.value = angka.toString();

        // Jika penambahan berhasil, maka harga dalam subtotal akan berubah
        var hargaValue = parseInt(harga.firstChild.value);
        var jumlahValue = parseInt(jumlah.value);

        subtotal.firstChild.value = (hargaValue * jumlahValue).toString();
    });

    // Buat sebuah aksi atau event ketika tombol kurang di klik, maka angka -1
    kurang.addEventListener('click', function() {
        // Cek jika angka lebih dari 1, maka angka dapat dikurangi
        if (angka > 1) {
            angka -= 1;
            jumlah.value = angka.toString();

            // Jika pengurangan berhasil, maka harga dalam subtotal akan berubah
            var hargaValue = parseInt(harga.firstChild.value);
            var jumlahValue = parseInt(jumlah.value);

            subtotal.firstChild.value = hargaValue * jumlahValue;
        }
    });

    var beliForm = document.getElementById('beli-form');
    beliForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Mengambil nilai input yang ingin disimpan ke dalam sesi
        var idRoti = document.getElementById('idRoti').value;
        var quantity = jumlah.value;
        var alamat = document.getElementById('catatan').value;
        var totalBayar = subtotal.firstChild.value;

        // Membuat objek data yang akan disimpan di sesi
        var bayarData = {
            id_roti: idRoti,
            quantity: quantity,
            alamat: alamat,
            total_bayar: totalBayar
        };

        fetch('{{ route('confirm') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                body: JSON.stringify(bayarData)
            })
            .then(function(response) {
                // Redirect ke halaman beli setelah berhasil menyimpan data di sesi
                window.location.href = '{{ route('beli') }}';
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    });

    function tambahKeKeranjang() {
        var jumlah = parseInt(document.getElementById('jumlah').value);
        var totalHarga = parseInt(document.getElementById('totalHarga').value);
        var idRoti = <?= $invoice->id_roti ?>;

        $.ajax({
            url: '{{ route('addToCart') }}',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'jumlah': jumlah,
                'totalHarga': totalHarga,
                'id_roti': idRoti
            },
            success: function(response) {
                Swal.fire('Produk berhasil dimasukkan ke keranjang.', response.message, 'success')
                    .then(() => {
                        window.location.href =
                            '{{ route('user.cart.view', ['id_roti' => $invoice->id_roti]) }}';
                    });
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Terjadi kesalahan saat menambahkan ke keranjang', 'error');
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@include('sweetalert::alert')
</body>

</html>
