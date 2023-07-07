@include('layoutsFrontend.head')

@include('layoutsFrontend.pagesMenuRoti.navbarmenu')
<div class="background-top-filter"></div>
<div  class="container container-filter">
    {{-- @foreach ($kategori as $k) --}}
    <h1 class="title-filter">{{$kategori->kategori}}</h1>
    {{-- @endforeach --}}
    <div class="uri-view-filter"> <strong class="url-in-filter"><a  href="{{route('menu')}}"><strong class="url-in-filter" >Beranda</strong></a> > Kategori Utama > Kategori Roti ></strong> {{$kategori->kategori}}</div>
    <div class="main-filter">
        <p class="jdl-produk-filter">Menampilkan {{count($menu)}} produk untuk "{{$kategori->kategori}}"</p>
        <hr>
    <div class="container-filter-dan-menu">
        <div class="container-filter-intrac">
            <div class="title-filter-intrac">
                Filter
            </div>
            <div class="content-filter-intrac">
                <form action="">
                    <input type="number" class="input-filter" name="hargaMinimum" placeholder="Harga Min" id="">
                    <input type="number" class="input-filter" name="hargaMaximum" placeholder="Harga Max" id="">
                    <div class="diskon-filter">
                    <label for="" >Diskon? </label>
                        <div>
                            <input type="radio" class="ya-diskon-filter" name="diskon" id="ya">
                            <label for="ya">Ya</label>
                            |
                            <input type="radio" class="tidak-diskon-filter" name="diskon" id="tidak">
                            <label for="tidak">Tidak</label>
                        </div>

                    </div>
                    <button type="submit" style="width: 100%; border-radius:10px;" class="btn  button btn-bayar input-filter">
                        <span>Filter</span>
                    </button>
                </form>
            </div>
        </div>
        {{-- <div class="search-menu">
                <div class="icon-src-filter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <input type="search" placeholder="search {{$kategori->kategori = strtolower($kategori->kategori)}}" class="src-menu-filter " name="search-menu-filter" id="searchInput">
        </div> --}}
        <div class="containerCard menu-card">
            @foreach ( $menu as $mFilter)
                <a  href="{{ route('invoice.menu', $mFilter->id_roti) }}" class="card card-margin">
                        <div class="cardimage">
                            <img class="imageProduct"
                            src="{{ asset('gallery/' . $mFilter->gambar) }}" width="186"
                                height="189" class="img-responsive">
                        </div>
                        <div class="subText">
                            <p  class="subtitleProduct">
                                {{$mFilter->roti}}
                            </p>
                            <h2 class="hargaProduct">
                                Rp{{number_format($mFilter->harga,0, ',','.')}}
                                <div class="line-harga"></div>
                            </h2>
                            <p class="tersediaProduct">Tersedia @php
                                    $res = DB::select(DB::raw('CALL `hitungStok`(' . $mFilter->id_roti . ', @output)'));
                                    $opt = DB::select(DB::raw('SELECT @output AS hasil'))[0];
                                    echo $opt->hasil == null ? 0 : $opt->hasil;
                                @endphp</p>
                        </div>
                </a>
            @endforeach
        </div>
    </div>
    </div>
</div>
<script>
                    const searchInput = document.getElementById('searchInput');
                    const menuItems = document.querySelectorAll('.card');
                    const catrgoriHiden = document.querySelectorAll('.pCategori');

                searchInput.addEventListener('keyup', function() {
                    const keyword = searchInput.value.toLowerCase();

                    for (let i = 0; i < menuItems.length; i++) {
                        const menuItem = menuItems[i];
                        const menuName = menuItem.innerText.toLowerCase();

                        if (menuName.includes(keyword)) {
                            menuItem.style.display = 'block';
                        } else {
                            menuItem.style.display = 'none';
                        }
                    }
                });

                </script>
