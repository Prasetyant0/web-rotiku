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
                <p class="stok">Stok {{ $invoice->stok }}</p>
                <div class="harga-invoice">Rp <span id="harga"><input id="harga" type="number"
                            value="{{ $invoice->harga }}" style="border: none;" disabled></span></div>
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
                        <p class="kemasan">Whole Utuh</p>
                        <hr>
                        <div class="container-btn-t-k-stok">
                            <div class="jumlah-beli-Container-invoice">
                                <button type="button" id="kurang" class="tambah-dan-kurang">-</button>
                                <input id="jumlah" type="number" class="jumlah jumlah-input" value="1"
                                    disabled>
                                <button type="button" id="tambah" class="tambah-dan-kurang tambah">+</button>
                            </div>
                            <div class="stok-in-interaction">
                                Stok: <span style="font-weight: bold;">{{ $invoice->stok }}</span>
                            </div>
                        </div>
                        <p class="min-pembelian">Address</p>
                        <div class="tambahcatatan-container">

                            <input class="catatan-input" type="text" autocomplete="off" name="alamat" id="catatan"
                                placeholder="Contoh: Kelas 12 RPL">

                        </div>
                        <p class="subtotal-text">
                            Sub Total: <span
                                style="font-weight: bold; position: absolute; right:0; margin-right:20px;">Rp
                                <span id="subtotal"><input type="number"  value="{{ $invoice->harga }}"
                                        class="input-intrac-style" disabled></span></span>
                        </p>
                        <ul>
                            {{-- <li><a href="#" class="btn-beli-dan-keranjang btn-tambah-keranjang"
                                    style="text-align: center;" onclick="tambahKeKeranjang()">Tambah Ke Keranjang</a>
                            </li> --}}
                            <li><button class="btn-beli-dan-keranjang btn-beli-menu" type="submit">Beli
                                    Langsung</button></li>
                        </ul>
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
        var stok = jumlah.value;
        var alamat = document.getElementById('catatan').value;
        var totalBayar = subtotal.firstChild.value;

        // Membuat objek data yang akan disimpan di sesi
        var bayarData = {
            id_roti: idRoti,
            stok: stok,
            alamat: alamat,
            total_bayar: totalBayar
        };

        // Mengirim data ke backend menggunakan AJAX atau fetch API
        // Pastikan Anda telah memasukkan token CSRF dalam request POST ini

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
</script>





























{{-- <div class="bodyContent">
<div class="container mt-5 mb-5" style="background: #eaeaea; border-radius:10px;">
    <div class="content d-flex flex-wrap p-5">
        <div class="imageWrapper">
            <img src="{{asset('gallery/' . $invoice->gambar )}}" alt="{{ $invoice->roti }}" style="width: 400px; height:390px; border-radius:10px;" max-width="500" max-height="500">
        </div>
        <div class="contetIsnteraction" style="margin-left: 30px">
            <h3 style="font-weight: bold; color:#7B7B7B;">{{ $invoice->roti }}</h3> --}}
{{-- <h5 style="font-weight: bold; color:#7B7B7B;">{{ $invoice->kategori }}</h5> --}}
{{-- <h2 class="mt-5" style="font-weight: bold;">Rp{{ $invoice->harga }}</h1>
            <button   type="button" class="btn btn-primary button" style="width: 30%; top:5px;" data-toggle="modal" data-target=".bd-example-modal-lg">
                <span class="">Pesan</span>
            </button>
            <p style="width:550px; margin-top:50px;">{{ $invoice->description }}</p>
        </div>
    </div>
</div>
</div> --}}
{{-- @includeIf('layoutsFrontend.footer') --}}
