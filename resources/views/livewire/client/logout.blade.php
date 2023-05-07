<form method="POST" wire:submit.prevent="handleLogout">
    @csrf
    <button class="text-gray-500 lg:inline-block block text-center ">
        <i class="fa fa-sign-out-alt"></i>
        <span class="lg:ml-1 lg:inline block lg:text-lg text-base">Logout</span>
    </button>
</form>