<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-semibold text-gray-500">Peminjaman</h1>
    <a href="{{url()->previous()}}" class="bg-emerald-500 shadow rounded-lg my-4 px-6 text-lg font-semibold py-2 text-white inline-block"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="bg-white grid gap-y-4 shadow py-2 px-4 rounded-lg">
        @if(count($pinjam))
        <ul class="grid gap-y-3">
            @foreach($pinjam as $rent)
                @livewire('client.account.pinjam-component',['rent'=>$rent],key($rent->id))
            @endforeach
        </ul>
        @else
            <h1 class="text-gray-500">Tidak ada Peminjaman</h1>
        @endif
    </div>
</div>
