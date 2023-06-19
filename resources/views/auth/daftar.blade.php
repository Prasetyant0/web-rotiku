@include('layoutsFrontend.head')
<div class="containersig">
    <div class="nan">
        {{-- <div class="imgl">
			<div class="imgld">
				<a href="{{route('menu')}}"><img class="imgldc" src="{{asset('assetsFrontend/images/logo/logorotiku.png')}}" width="200"></a>
			</div>
		</div> --}}
        <div class="imgsig">
            <div class="imgs">
                <img src="{{ asset('assetsFrontend/images/daftar/sigin3.webp') }}" class="imgsig position">
            </div>
            <div class="textjg">
                {{-- jangan jual beli, soalnya ini hanya website penjualan roti saja --}}
                <div class="textJ">Jual Beli Mudah Hanya di Sini Aja</div>
                <div class="textG">Gabung dan rasakan kemudahan bertransaksi sekarang juga</div>
            </div>
        </div>
    </div>
    <div class="kotakSigin position">
        <form action="{{ route('daftar.store') }}" method="post">
            @csrf
            <h1 class="textpost"><a href="{{ route('login.admin') }}" id="nan"><span
                        class="material-symbols-outlined">arrow_back</span></a><span class="daftar">Daftar </span><span
                    class="nan">Sekarang</span></h1>
            <span class="textpost2"><span class="nan">sudah punya akun Rotiku?</span> <a class="masT"
                    href="{{ route('login.admin') }}">Masuk</a></span>
            <div class="elSigin">
                <ul>
                    <li>
                        <input type="name" name="name" class="inel" placeholder="name" value="{{ old('name') }}">
                    </li>
                    <li>
                        <input type="email" name="email" class="inel" placeholder="email" value="{{ old('email') }}">
                    </li>
                    <li>
                        <input type="password" name="password" class="inel" id="password" placeholder="password" value="{{ old('password') }}">
                        {{-- <div id="show">
                            <i class="fa fa-eye"></i>
                        </div> --}}
                    </li>
                    <li>
                        <input type="password" name="confirm" class="inel" id="confirm"
                            placeholder="confirm password" value="{{ old('confirm') }}">
                    </li>
                    <li>
                        <button type="submit" name="sigin" class="butdaf" style="width: 100%">Daftar</button>
                    </li>
                    <li>
                        <div class="daftar-white-google">
                            <hr class="line">
                            <label class="atau-daftar-dengan">atau daftar dengan</label>
                            <div class="btn-daftar-with-google">
                                <img src="{{ asset('assets/img/login/withgoogle.png') }}"
                                    style="position: absolute; z-index:1;" class="image-google-daftar" height="40px"
                                    width="50px" alt="">
                                <a href="{{ route('login.google') }}"
                                    class="btn btn-lg daftar-google"><strong>Google</strong></a>
                            </div>
                        </div>
                        <div class="privC">
                            <div class="privT">
                                Dengan mendaftar, saya menyetujui <br>
                                <a href="" class="privL">Syarat dan Ketentuan</a> serta <a href=""
                                    class="privL">Kebijakan Privasi</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div class="cp nan">
        <div class="cptext">
            <p> &#169; 2022, Rotiku Makananku</p>
        </div>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const showPassword = document.getElementById('show');
    const eyeIcon = showPassword.querySelector('i');

    showPassword.addEventListener('click', function() {
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
</body>

</html>
