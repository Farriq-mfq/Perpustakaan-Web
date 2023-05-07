<div class="grid gap-y-4 max-w-3xl mx-auto">
    <h1 class="text-3xl font-semibold text-gray-500">Akun Kamu</h1>
    <div class="bg-white shadow py-2 px-4 rounded-lg">
        <ul class="grid gap-y-3">
            <li>
                <a href="{{route('client.account.info')}}" class="h-10 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                    <i class="fas fa-user"></i>
                    <p class="ml-2">Informasi Akun</p>
                </a>
            </li>
            <li>
                <a href="{{route('client.account.rent')}}" class="h-10 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                    <i class="fas fa-book"></i>
                    <p class="ml-2">Peminjaman</p>
                </a>
            </li>
        </ul>
    </div>
</div>
