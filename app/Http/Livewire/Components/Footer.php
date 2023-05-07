<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
            <footer class="main-footer">
            <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
            </div>
        blade;
    }
}
