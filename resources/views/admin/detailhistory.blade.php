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
                                <h5 class="card-title mb-0">Detail History Pesnan</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">Nama Pemesan</th>
                                                <td class="d-none d-xl-table-cell">{{ $data2->nama_user }}</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">Produk Yang Dibeli</th>
                                                <td class="d-none d-xl-table-cell">{{ $dataRoti->roti }}</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">Total Bayar</th>
                                                <td class="d-none d-xl-table-cell">Rp{{ $data2->total_bayar }}</td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">Quantity</th>
                                                <td class="d-none d-xl-table-cell">{{ $data2->quantity }} buah roti</td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">Alamat</th>
                                                <td class="d-none d-xl-table-cell">{{ $data2->alamat }}</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <th class="d-none d-xl-table-cell">
                                                    <a href="{{route('admin.history.index')}}" class="btn btn-primary">Kembali</a>
                                                </th>
                                                <td class="d-none d-xl-table-cell"></td>
                                            </td>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            @include('layouts.footer')
