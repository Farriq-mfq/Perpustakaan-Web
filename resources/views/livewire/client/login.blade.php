<div class="container mx-auto p-8 flex">
    <div class="max-w-md w-full mx-auto">
        <h1 class="text-4xl text-center mb-12 font-thin">Login PerpusQu</h1>

        <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="p-8">
                @if($error)
                <div class="text-red-500 text-center">
                    {{$error}}
                </div>
                @endif
                <form method="POST" wire:submit.prevent="handleLogin">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                        <input type="text" name="email" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none @error('email') border-red-500 @enderror" wire:model="email">
                        @error('email')
                            <span class="text-red-500">
                                {{$message}}    
                            </span>
                        @enderror
                    </div>
            
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                        <input type="password" name="password" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none @error('password') border-red-500 @enderror" wire:model="password">
                        @error('password')
                            <span class="text-red-500">
                                {{$message}}    
                            </span>
                        @enderror
                    </div>
                    
                    <button wire:loading.attr="disabled" wire:target="handleLogin" type="submit" class="w-full p-3 mt-4 disabled:bg-opacity-80 bg-emerald-500 text-white rounded shadow">
                        <span wire:loading wire:target="handleLogin">Proses...</span>
                        <span wire:loading.class="hidden" wire:target="handleLogin">Login</span>

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
