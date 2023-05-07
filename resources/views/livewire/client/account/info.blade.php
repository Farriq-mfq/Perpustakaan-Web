<div class="max-w-3xl mx-auto">
    <a href="{{url()->previous()}}" class="bg-emerald-500 shadow rounded-lg px-6 text-lg font-semibold py-2 text-white inline-block"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="grid gap-y-4 bg-white shadow py-2 px-4 rounded-lg mt-2">
        <ul class="grid gap-y-3">
            <li class="h-10 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                <form wire:submit.prevent="changeNama" class="flex justify-between items-center w-full">
                    <input type="text" class="p-1 w-full bg-transparent  font-semibold outline-none" wire:model="nama">
                    <button type="submit" class="bg-emerald-500 w-10 h-10 flex items-center justify-center text-white rounded">
                        <i class="fas fa-edit"></i> 
                    </button>
                </form>
            </li>
            <li class="h-10 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                <form wire:submit.prevent="changeUsername" class="flex justify-between items-center w-full">
                    <input type="text" class="p-1 w-full bg-transparent  font-semibold outline-none" wire:model="username">
                    <button type="submit" class="bg-emerald-500 w-10 h-10 flex items-center justify-center text-white rounded">
                        <i class="fas fa-edit"></i> 
                    </button>
                </form>
            </li>
            <li class="h-10 w-full flex items-center text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                <form wire:submit.prevent="changeEmail" class="flex justify-between items-center w-full">
                    <input type="email" class="p-1 w-full bg-transparent  font-semibold outline-none" wire:model="email">
                    <button type="submit" class="bg-emerald-500 w-10 h-10 flex items-center justify-center text-white rounded">
                        <i class="fas fa-edit"></i> 
                    </button>
                </form>
            </li>
            <li class="w-full text-lg font-semibold border-b pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                <form method="post" wire:submit.prevent="changeProfile" class="flex justify-between items-center w-full">
                    <input type="file" class="p-1 w-full bg-transparent  font-semibold outline-none" wire:model="profile">
                    <button type="submit" class="bg-emerald-500 w-10 h-10 flex items-center justify-center text-white rounded">
                        <i class="fas fa-edit"></i> 
                    </button>
                </form>
                @if($profile)
                    <img src="{{$profile->temporaryUrl()}}" class="h-40 w-40 rounded-lg" alt="Profile">
                @elseif(auth()->guard('anggota')->user()->profile_picture == null)
                    <span>Tidak ada Foto Profile</span>
                @else
                    <img src="{{asset('/storage/profile/'.auth()->guard('anggota')->user()->profile_picture)}}" class="h-40 w-40 rounded-lg" alt="Profile">
                @endif
            </li>
            <li class="w-full flex items-center text-lg font-semibold pb-2 hover:bg-gray-500 hover:bg-opacity-5 hover:rounded text-gray-500">
                <form wire:submit.prevent="changePassword" class="flex flex-col w-full">
                    @if($alert)
                     <div class="@if($alert['type'] == 'success') text-emerald-500 @else text-red-500 @endif">{{$alert['message']}}</div>
                    @endif
                    <div>
                        <input type="text" wire:model="password" class="p-1 @error('konfirmasi_password') border-red-500 @enderror w-full bg-transparent border my-2 font-semibold outline-none" placeholder="Password Lama">
                        @error('password')
                        <div class="text-md font-light text-red-500">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="my-2 w-full">
                        <input type="text" wire:model="new_pass" class="@error('new_pass') border-red-500 @enderror p-1 w-full bg-transparent border font-semibold outline-none" placeholder="Password Baru">
                        @error('new_pass')
                        <div class="text-md font-light text-red-500">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <button type="submit" class="bg-emerald-500 py-1 px-4 font-semibold flex items-center justify-center justify-self-start text-white rounded">
                            Submit
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
