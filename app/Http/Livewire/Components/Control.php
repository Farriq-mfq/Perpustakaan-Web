<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Control extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
                <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
                </div>
            </aside>
            </div>
        blade;
    }
}
