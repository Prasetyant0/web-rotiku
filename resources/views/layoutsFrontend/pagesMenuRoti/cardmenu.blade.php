<h2 class="judulMenu">Berbagai Pilihan Menu</h2>
                <div class="containerCard">
                    @foreach ($menu as $d)
                        <a  href="{{ route('invoice.menu', $d->id_roti) }}" class="card">
                                <div class="cardimage">
                                    <img class="imageProduct"
                                    src="{{ asset('gallery/' . $d->gambar) }}" width="186"
                                        height="189" class="img-responsive">
                                </div>
                                <div class="subText">
                                    <p  class="subtitleProduct">
                                        {{$d->roti}}
                                    </p>
                                    <h2 class="hargaProduct">
                                        Rp{{number_format($d->harga,0, ',','.')}}
                                        <div class="line-harga"></div>
                                    </h2>
                                    <p class="tersediaProduct">Tersedia {{ $d->stok }}</p>
                                </div>
                        </a>
                    @endforeach
                </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @include('sweetalert::alert')
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
                