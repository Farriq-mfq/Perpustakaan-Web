<li wire:click="Toggle" class="last:border-none last:pb-0 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500 cursor-pointer relative">
    <i class="fas fa-book"></i>
    <div class="flex flex-col justify-center ml-1">
        <p class="ml-2 text-base truncate">{{$rent->judul_buku}} @if(!$rent->persetujuan) <button wire:click.prevent="handlebatal({{$rent->id}})" class="bg-red-500 p-1 rounded text-white font-semibold">Batalkan</button>@endif</p>
        <p class="ml-2 text-base truncate">{{$rent->kode_pinjam}} - @if($rent->persetujuan)<span class="text-emerald-500">Di Setujui @if($rent->status === 'dikembalikan') <i class="fas fa-check"></i> @elseif($rent->status == 'pinjam') <i class="fas fa-clock"></i> @elseif($rent->status == 'telat') <i class="fas fa-times text-red-500"></i> @endif</span> @else <span class="text-red-500">Belum Di Setujui</span> @endif</p>
        @if($show && $rent->persetujuan)
            <p class="ml-2 text-base truncate">Tanggal Pinjam : {{$rent->tanggal_pinjam}}</p>
            <p class="ml-2 text-base truncate">Tanggal Kembali : {{$rent->tanggal_kembali}}</p>
            <p class="ml-2 text-base truncate">Denda : {{$rent->denda}}</p>
            <p class="ml-2 text-base truncate">Status : {{$rent->status}}</p>
        @endif
    </div>
    <i class="fas fa-list absolute right-0 my-auto"></i>
</li>