<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                <a href="#" class="d-block">{{auth()->user()->nama}}</a>
              </div>
            </div>
      
            <!-- SidebarSearch Form -->
            <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>
      
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                  <a href="{{route('home.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Data Anggota
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('anggota.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('anggota.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Data</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Data Rak
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('rak.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('rak.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Data</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Data Buku
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('books.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('books.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Data</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                      Transaksi
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('rent.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peminjaman Buku</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('rent.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Buat Transaksi</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                <button type="button" class="btn btn-danger text-white nav-link" data-toggle="modal" data-target="#modal-logout">
                  Logout
                 </button>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
            </div>
        blade;
    }
}
