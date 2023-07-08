{{--  head  --}}
@include('layouts.head')

<body>
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="main">

            {{--  navbar  --}}
            @include('layouts.navbar')
            {{--  endnavbar  --}}
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Tambah Data Produk Keluar</h1>
                        <p class="badge bg-primary ms-2" target="_blank"> rotiku <i
                                class="fas fa-fw fa-external-link-alt"></i></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Tambah Data Produk Keluar</h5>
                                    <h6 class="card-subtitle text-muted">Isi form berikut untuk menambahkan data produk yang keluar</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="">
                                            <form action="{{ route('admin.produk_keluar.store') }}" method="post" id="FormData">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="roti">Nama Roti</label>
                                                <select class="form-select" id="roti" name="id_roti">
                                                    @foreach ($namaRoti as $nama)
                                                    <option value="{{ $nama->id_roti }}">{{ $nama->roti }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="jumlah_keluar">Jumlah Keluar</label>
                                                <input id="jumlah_keluar" name="jumlah_keluar" type="number" class="form-control"
                                                    placeholder="jumlah keluar">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-labeal" for="catatan">Catatan</label>
                                                <input id="catatan" name="catatan" type="text" class="form-control" placeholder="catatan">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary me-1" type="submit" id="tambah">Tambahkan Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            @include('layouts.footer')
