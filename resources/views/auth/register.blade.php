<div class="flex justify-center item-center">
    <div class="mt-20 mb-10 bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold text-center mb-4">Daftar</h1>

        <form name="registerForm" id="registerFrom" action="{{ route('auth.register') }}" method="POST"
            enctype="multipart/form-data" onsubmit="return validateForm()" @required(true)>

            @csrf
            <div>
                <label for="name" class="block text-gray-700">Nama </label>
                <input id="name" type="text" class="w-full border-gray-300 rounded p-2" placeholder="Nama Anda">
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" class="w-full border-gray-300 rounded p-2"
                    placeholder="email@contoh.com">
            </div>
            <div>
                <label for="alamat" class="block text-gray-700">Alamat</label>
                <input id="alamat" type="text" class="w-full border-gray-300 rounded p-2"
                    placeholder="Nama Produk">
            </div>
            <div>
                <label for="notelepon" class="block text-gray-700">notelepon</label>
                <input id="notelepon" type="number" class="w-full border-gray-300 rounded p-2" placeholder="10000">
            </div>
            <button type="button" id="register-button"
                class="w-full mt-2 bg-black-500 text-black p-2 rounded hover:bg-blue-600">Daftar</button>

            <div class="col-12 text-blue">
                <a href="{{ route('auth.login') }}" class="text-blue"><i class="fa fa-sign-in">
                    </i> Punya akun ? Masuk</a>

            </div>
        </form>
    </div>


</div>
