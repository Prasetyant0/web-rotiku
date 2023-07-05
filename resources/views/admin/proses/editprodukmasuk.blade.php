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
                        <h1 class="h3 d-inline align-middle">Edit Data Produk Masuk</h1>
                        <p class="badge bg-primary ms-2" target="_blank"> rotiku <i
                                class="fas fa-fw fa-external-link-alt"></i></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Data Produk Masuk</h5>
                                    <h6 class="card-subtitle text-muted">Ubah beberapa data untuk mengubah data produk masuk</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="">
                                            <form action="" method="post" id="FormData">
                                            <div class="mb-3">
                                                <label class="form-label" for="roti">Nama Roti</label>
                                                <select class="form-select" id="roti" name="id_roti">
                                                        <option value="">Roti Bakar</option>
                                                        <option value="">Roti Panggang</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="roti">Jumlah Masuk</label>
                                                <input id="roti" name="jumlah_masuk" type="number" class="form-control"
                                                    placeholder="jumlah masuk">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="roti">Tanggal Masuk</label>
                                                <input id="roti" name="tanggal_masuk" type="date" class="form-control"
                                                    placeholder="description">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-labeal" for="harga">Catatan</label>
                                                <input id="harga" name="catatan" type="text" class="form-control"
                                                    placeholder="Harga">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary me-1" type="submit" id="tambah">Edit Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            @include('layouts.footer')
