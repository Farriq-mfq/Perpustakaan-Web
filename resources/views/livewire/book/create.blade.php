@push('styles')
<link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
<div>
    @if(session()->has('alert'))
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-info"></i> Alert!</h5>
      {{session('alert')}}
    </div>
    @endif
      <div class="row">
          <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form add Buku</h3>
                </div>
                <form wire:submit.prevent="store" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Kode">Kode Buku</label>
                      <input type="text" disabled class="form-control @error('kode') is-invalid @enderror" id="kode" wire:model="kode">
                      @error('kode')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror        
                    </div>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukan judul Buku" wire:model="judul">
                      @error('judul')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="penulis">Penulis</label>
                      <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" placeholder="Masukan Penulis" wire:model="penulis">
                      @error('penulis')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="pengarang">Pengarang</label>
                      <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" placeholder="Masukan Pengarang" wire:model="pengarang">
                      @error('pengarang')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" placeholder="Masukan Penerbit" wire:model="penerbit">
                      @error('penerbit')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="tahun_terbit">Tahun Terbit</label>
                      <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" placeholder="Masukan Tahun Terbit" wire:model="tahun_terbit">
                      @error('tahun_terbit')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="stok">Stok</label>
                      <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukan Stok Buku" wire:model="stok">
                      @error('stok')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                        <label>Rak</label>
                        <select wire:model="rak_id" class="form-control @error('rak_id') is-invalid @enderror select2" style="width: 100%;">
                            @foreach ($raks as $rak)
                            <option value="{{$rak->id}}">{{$rak->lokasi_rak}}</option>
                            @endforeach
                        </select>
                        @error('rak_id')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>        
                        @enderror 
                      </div>
                    <div class="form-group">
                        <label for="cover">Cover Buku</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('cover') is-invalid @enderror" wire:model="cover" id="cover">
                            <label class="custom-file-label" for="cover">Choose file</label>
                        </div>
                        </div>
                        @error('cover')
                        <div class="text-danger">
                          {{$message}}
                        </div>        
                        @enderror 
                        <div wire:loading wire:target="cover">Loading For Preview....</div>
                        @if ($cover)
                        <img class="img-thumbnail mt-3" src="{{$cover->temporaryUrl()}}" >
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="source">Source</label>
                      <input type="text" class="form-control @error('source') is-invalid @enderror" id="source" placeholder="Masukan source Buku" wire:model="source">
                      @error('source')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select wire:model="type" class="form-control select2 @error('type') is-invalid @enderror" style="width: 100%;">
                            <option value="fisik">Fisik</option>
                            <option value="ebook">E-Book</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>        
                        @enderror 
                      </div>
                    </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
  </div>
  @push('scripts')
  <script src="{{asset("/plugins/select2/js/select2.full.min.js")}}"></script>
  <script>
    document.addEventListener('livewire:load', function() {
      $(function () {
        $('.select2').select2()
      })
    })
  </script>
  @endpush