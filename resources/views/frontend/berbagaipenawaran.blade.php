@include('layoutsFrontend.head')

<body>
    {{-- //main --}}
    <main class="mian-content">

        <head class="main-nav">
            @include('layoutsFrontend.pagesMenuRoti.navbarmenu')
        </head>
        <div class="container">
            <div class="content c-p">
                Menu / Berbagai Penawaran/
                <h3 class="berbagai-penawaran-title">Berbagai Penawaran</h3>
                <div class="container-card-berbagaipenawaran">
                    <div class="card-berbagai-penawaran">
                        <div class="list-tawaran">
                            <h5 class="card-title">Tawaran Pekerjaan</h5>
                            <a href="{{route('user.daftardriver')}}">Daftar Sebagai Driver.</a>
                            <a href="">Daftar Sebagai Admin.</a> 
                            <a href="">Daftar Sebagai Officer.</a>
                            <a href="">Daftar Sebagai Admin</a>
                            <a href="">Daftar Sebagai security.</a>
                            <a href="">Daftar Sebagai Koki</a>
                            <a href="">Daftar Sebagai Pengemas Roti</a>
                            <a href="">Daftar Sebgai Suplayer</a>
                        </div>
                    </div>
                    <div class="card-berbagai-penawaran">
                        <div class="list-tawaran">
                            <h5 class="card-title">Menu Yang Ada</h5>
                            <a href="">Harga menu lebih kecil dari Rp5000</a>
                            <a href="">Harga menu yang lebih besar dari Rp5000.</a> 
                            <a href="">Harga menu lebih kecil dari 10000.</a>
                            <a href="">Harga menu yang lebih besar dari 10000.</a>
                            <a href="">Harga menu lebih besar dari 15000.</a>
                            <a href="">Harga menu yang lebih besar dari 15000.</a>
                            <a href="">Harga menu lebih besar dari 20000.</a>
                            <a href="">Harga menu yang lebih besar dari 20000.</a>
                        </div>
                    </div>
                    <div class="card-berbagai-penawaran">
                        <div class="list-tawaran">
                            <h5 class="card-title">Tawaran Dison Menarik</h5>
                            <a href="">Diskon mulai dari 84%</a>
                            <a href="">Diskon mulai dari 50%</a>
                            <a href="">Diskon mulai dari 20%</a>
                            <a href="">Diskon mulai dari 15%</a>
                            <a href="">Diskon mulai dari 60%</a>
                            <a href="">Diskon mulai dari 56%</a>
                            <a href="">Diskon mulai dari 80%</a>
                            <a href="">Diskon mulai dari 90%</a>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </main>
    <!-- //main -->













    <!-- card -->
    {{-- @include('layoutsFrontend.pagesMenuRoti.card') --}}
    <!-- //card -->

























{{-- <table>
            <tr>
                <th>Pekerjaan</th>
                <th>Menu Yang ada</th>
                <th>Tawaran Disko</th>
            </tr>
            <tr>
                <td>Lorem ipsum dolor.
                Lorem ipsum dolor sit. <br>
                Lorem ipsum dolor, sit amet.<br>
                Lorem ipsum dolor sit amet cons<br>
                Lorem ipsum dolor sit amet consectetur.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
                Lorem ipsum, dolor sit amet consectetur adipisicing<br>    
                </td>
                <td>Lorem ipsum dolor.
                Lorem ipsum dolor sit. <br>
                Lorem ipsum dolor, sit amet.<br>
                Lorem ipsum dolor sit amet cons<br>
                Lorem ipsum dolor sit amet consectetur.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
                Lorem ipsum, dolor sit amet consectetur adipisicing<br>    
                </td>
                <td>Lorem ipsum dolor.
                Lorem ipsum dolor sit. <br>
                Lorem ipsum dolor, sit amet.<br>
                Lorem ipsum dolor sit amet cons<br>
                Lorem ipsum dolor sit amet consectetur.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing.<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
                Lorem ipsum, dolor sit amet consectetur adipisicing<br>    
                </td>
            </tr>
        </table> --}}