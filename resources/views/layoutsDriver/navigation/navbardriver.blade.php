{{-- {{request()->routeIs('admin.dashboard') ? 'active' : ''}} --}}
<nav class="{{ request()->routeIs('driver.home') ? 'nav-transparent' : 'nav-white' }}">
    <div class="profile-container">
         <div ><img class="profile-img" src="{{asset('assetsDriver/images/profile.png')}}" width="35" alt="" srcset=""></div>
         <div class="profile-name">Jajang Perkasa</div>
    </div>
     <div class="search">
         <div>
             <div>
                 <input type="text" class="search-pesanan" name="search-pesanan" placeholder="Search Pesanan" id="">
                 {{-- <i class="bi bi-search search-icon-driver"></i> --}}
                 <div><img class="search-icon-driver" src="{{asset('assetsDriver/images/search.svg')}}" alt=""></div>
             </div>
             <div></div>
         </div>
     </div>
 </nav>