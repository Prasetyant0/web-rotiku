<div class="pCategori ">
    <div class="subCate">
        <h2 class="judulCate">Kategori Pilihan</h2>
        <div class="container-card-category">
            <div class="allkotakCate">
                <div class="allkotakCate">
                    @foreach ($kategori as $k)
                        <a href="#" class="kotak" data-aos="fade-up"><img src="{{ asset('gallery/' . $k->gambar) }}" style="width:100px;" alt=""></a>
                    @endforeach
                </div>
            </div>
            <div class="botcate">
                <a href="" class="catetext">Semua Kategori</a>
            @foreach ($kategori as $k)
                <a href="{{route('filter.menu', $k->id_kategori)}}" class="catetext">{{$k->kategori}}</a>
            @endforeach
            </div>
        </div>
        </div>
</div>
