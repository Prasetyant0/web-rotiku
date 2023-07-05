@include('layouts.head')
<div class="container-login">
    <div class="logo">
        {{-- <img class="image-logo" class="image-in" src="{{ asset('assetsFrontend/images/logo/logo.png') }}" width="200" alt=""> --}}
    </div>
    <div class="content-container">
        <div class="wr-login">
            <div class="text-masuk-dan-daftar">
                <h3 class="text-masuk">Masuk</h1>
                <a href="{{route('daftar.user')}}" class="text-daftar">Daftar</a>
            </div>
            <div class="form-login">
                <form action="{{ route('login.post') }}" method="post" >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label email">Email</label>
                        <input class="input-form form-email" type="email" id="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label password">Password</label>
                        <input class="input-form form-password" type="password" id="password" name="password" value="{{ old('password') }}"/>
                    </div>
                    <div >
                        <button type="submit" class="btn-lg login-btn"><strong>Login</strong></button>
                    </div>
                    <hr class="line">
                    <label class="atau-masik-dengan">atau masuk dengan</label>
                    <div >
                        <img src="{{asset('assets/img/login/withgoogle.png')}}" class=" image-google" height="40px" width="50px" alt="">
                        <a href="{{ route('login.google') }}" class=" btn btn-lg login-google"><strong>Google</strong></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
</body>
</html>
