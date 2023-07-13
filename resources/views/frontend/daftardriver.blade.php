@include('layoutsFrontend.head')

<body>
    {{-- //main --}}
    <main class="mian-content">

        <head class="main-nav">
            @include('layoutsFrontend.pagesMenuRoti.navbarmenu')
        </head>
        <div class="container">
            <div class="content c-p">
                <a href="">Menu</a> / <a href="">Berbagai Penawaran</a> / <a href="">Lamar Pekerjaan Driver</a>
                <h3 class="berbagai-penawaran-title">Lamar Pekerjaan Sebagai Driver</h3>
                    <form action="" method="post">
                        @csrf
                        <label  for="nama">Nama</label>
                        <input  class="input-daftar-driver lsbrl-fsgtsr-friver"  type="text" name="nama" placeholder="nama" id="nama">
                        
                        <label  for="alamat">Alamat</label>
                        <input  class="input-daftar-driver lsbrl-fsgtsr-friver"  type="text" name="alamat" placeholder="alamat" id="alamat">
                        
                        <label for="pekerjaan">Pekerjaan</label>
                        <input  class="input-daftar-driver lsbrl-fsgtsr-friver"  type="text" name="pekerjaan" placeholder="pekerjaan" id="pekerjaan">
                        
                        <label for="pekerjaan">Jenis Kelamin</label>
                        <select  class="input-daftar-driver lsbrl-fsgtsr-friver"  name="jenis_kelamin" id="">
                            <option value="laki_laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="umur">Umur</label>
                        <input  class="input-daftar-driver lsbrl-fsgtsr-friver"  type="text" name="umur" placeholder="umur" id="umur">
                        <button class="btn-kirim-lamaran">Kirim Lamaran</button>
                    </form>     
        </div>
    </main>
    <!-- //main -->
