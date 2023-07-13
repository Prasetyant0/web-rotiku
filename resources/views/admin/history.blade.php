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
                                <h5 class="card-title mb-0">History Pesnan</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th class="d-none d-xl-table-cell">No</th>
                                        <th class="d-none d-md-table-cell">No Pemesanan</th>
                                        <th class="d-none d-md-table-cell">Nama Penerima</th>
                                        <th class="d-none d-xl-table-cell">Alamat</th>
                                        <th class="d-none d-md-table-cell">Detail</th>
                                        <th class="d-none d-md-table-cell">Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($history as $d)
                                <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $d->kode_pesanan }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $d->nama_penerima }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $d->alamat }}</td>
                                        <td class="d-none d-md-table-cell">
                                            <a href="{{route('admin.history.detail', $d->id_history)}}" class="btn btn-info" id="history">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                  </svg>
                                            </a>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            <a href="" class="btn btn-danger" id="delete">
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </main>

            @include('layouts.footer')
