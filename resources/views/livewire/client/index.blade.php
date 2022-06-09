<div class="grid gap-y-6 max-w-6xl mx-auto py-3">
    <div class="bg-white p-2 w-full rounded-lg">
        <h1 class="text-gray-600 text-2xl font-semibold mb-2">Rak</h1>
        <ul class="py-2 border-y flex flex-wrap gap-2">
            @foreach ($raks as $rak)
                <li wire:click="clickRak({{$rak->id}})" class="border-2 @if($rakSearch == $rak->id) border-emerald-500 @endif py-1.5 relative px-4 cursor-pointer rounded text-gray-600">
                    {{$rak->lokasi_rak}} <span class="text-emerald-500 font-semibold">{{$this->countRak($rak->id)}}</span>
                </li>   
            @endforeach
            @if($rakSearch)
                <li wire:click="showAll" class="border-2 border-red-500 py-1.5 relative px-4 cursor-pointer rounded text-gray-600">
                    Clear
                </li>   
            @endif
        </ul>
    </div>
        <div class="grid md:grid-cols-4 grid-cols-2 gap-4 p-2">
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
        @if($books->hasMorePages())
            <div id="__LOAD__MORE__PAGES"></div>
        @endif
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

