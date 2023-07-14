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
                <div class="row">
                    <div>
                        <div class="card flex-fill  mt-2">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Daftar Semua Pesnan</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th class="d-none d-xl-table-cell">No</th>
                                        <th class="d-none d-md-table-cell">Nama Pemesan</th>
                                        <th class="d-none d-md-table-cell">Alamat</th>
                                        <th class="d-none d-xl-table-cell">Produk</th>
                                        <th class="d-none d-xl-table-cell">Jumlah Barang yang Dibeli</th>
                                        <th class="d-none d-md-table-cell">Total Pembayaran</th>
                                        <th class="d-none d-md-table-cell">Pesanan Dikirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $data->nama_user }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $data->alamat }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $data->beliRoti->roti }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $data->quantity }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $data->total_bayar }}</td>
                                        <td class="d-none d-md-table-cell">
                                            <a href="{{ route('delete', $data->id_pesanan) }}" class="btn btn-primary" id="kirim">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                                  </svg>
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            @include('layouts.footer')
