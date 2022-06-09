<div class="grid gap-y-4 max-w-3xl mx-auto">
    <input wire:model="search" type="search" class="w-full bg-white shadow p-3 outline-none rounded-lg" placeholder="Cari buku Kesukaanmu">
    <div class="grid">
        @if(!$search)
        <h1 class="text-xl font-semibold text-gray-500">Ketikan judul untuk mencari buku! </h1>
        @endif
        @if($search)
        <h1 class="text-xl font-semibold text-gray-500">Pencarian Terkait : </h1>
        <div class="grid md:grid-cols-3 grid-cols-2 gap-4 mt-2">
            @foreach ($books as $book)
                <div class="flex flex-col">
                    <div class="w-full relative bg-gray-200 rounded lg:h-80 h-60 overflow-hidden">
                        <img class="object-fit absolute h-full w-full" src="{{asset('/storage/cover/'.$book->cover)}}" alt="Loading...">
                    </div>
                    <a href="{{route('client.detail',$book->slug)}}" class="truncate text-lg font-semibold mt-1 text-gray-700">
                        {{$book->judul}}
                    </a>
                    <span class="text-gray-500 text-md truncate">
                        {{$book->penulis}}
                    </span>
                </div>
            @endforeach
        </div>
        @endif
        @if($books->hasMorePages())
            <div id="__LOAD__MORE__PAGES"></div>
        @endif
    </div>
</div>
@push("scripts")
<script>
        document.addEventListener('livewire:load', function() {
        if(document.getElementById("__LOAD__MORE__PAGES")){
                let observer = new IntersectionObserver((entires) => {
                    entires.forEach((entry) => {
                        if(entry.isIntersecting){
                            @this.call("LoadMore")
                        }
                    });
                });
                
                observer.observe(document.getElementById("__LOAD__MORE__PAGES"));
            }
        })
</script>
@endpush