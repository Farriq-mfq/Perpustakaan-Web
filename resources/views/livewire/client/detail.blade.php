<div class="max-w-3xl mx-auto">
<a href="{{url()->previous()}}" class="bg-emerald-500 shadow rounded-lg px-6 text-lg font-semibold py-2 text-white inline-block"><i class="fas fa-arrow-left"></i> Back</a>
<div class="flex lg:flex-row flex-col gap-3 py-2">
    <div class="basis-5/12">
        <img class="w-full h-full rounded-lg object-cover shadow-sm" src="{{asset('storage/cover/'.$book->cover)}}" alt="Buku">
    </div>
    <div class="basis-7/12">
        <div class="grid gap-y-1 p-2">
            <h1 class="lg:text-3xl text-2xl font-bold truncate text-gray-700">{{$book->judul}}</h1>
            <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, inventore.</p>
            <ul class="flex flex-col gap-y-2">
                <li class="text-gray-600 text-lg font-semibold">Penulis
                    <li class="text-gray-600">{{$book->penulis}}</li>
                </li>
                <li class="text-gray-600 text-lg font-semibold">Pengarang
                    <li class="text-gray-600">{{$book->pengarang}}</li>
                </li>
                <li class="text-gray-600 text-lg font-semibold">Penerbit
                    <li class="text-gray-600">{{$book->penerbit}}</li>
                </li>
                <li class="text-gray-600 text-lg font-semibold">Tahun Terbit
                    <li class="text-gray-600">{{$book->tahun_terbit}}</li>
                </li>
                <li class="text-gray-600 text-lg font-semibold">Stok
                    <li class="text-gray-600">{{$book->stok}}</li>
                </li>
            </ul>
        </div>
        <div class="grid mt-3 gap-y-1">
            <button id="pinjam" class="bg-emerald-500 disabled:bg-opacity-80 p-2 text-white rounded-lg font-semibold shadow">Pinjam</button>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script>
    document.addEventListener("livewire:load",()=>{
        const btnPinjam = document.querySelector('#pinjam')
        if(btnPinjam){

            btnPinjam.addEventListener('click',(e)=>{
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin Ingin Meminjam Buku ini ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'IYA!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('handlePinjam')
                    }
                })
            })
        }
    })
    
</script>
@endpush

