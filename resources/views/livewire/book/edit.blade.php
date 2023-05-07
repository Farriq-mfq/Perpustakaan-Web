
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
                  <h3 class="card-title">Form Edit Buku </h3>
                </div>
                <form wire:submit.prevent="edit" method="post">
                    @csrf
                  <div class="card-body">
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
                        <select wire:model="rak_id" class="form-control @error('rak_id') is-invalid @enderror" style="width: 100%;">
                          @foreach ($raks as $rak)
                            <option value="{{$rak->id}}" @if($rak->id == $rak_id) selected @endif>{{$rak->lokasi_rak}}</option>
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
                            <input type="file" class="custom-file-input @error('new_cover') is-invalid @enderror" wire:model="new_cover" id="new_cover">
                            <label class="custom-file-label" for="cover">Choose file</label>
                        </div>
                        </div>
                        @error('new_cover')
                        <div class="text-danger">
                          {{$message}}
                        </div>        
                        @enderror 
                        <div wire:loading wire:target="new_cover">Loading For Preview....</div>
                        @if ($new_cover)
                        <img class="img-thumbnail mt-3" src="{{$new_cover->temporaryUrl()}}" >
                        @else
                        <img class="img-thumbnail mt-3" src="{{asset('/storage/cover/'.$cover)}}" >
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
                        <select wire:model="type" class="form-control @error('type') is-invalid @enderror" style="width: 100%;">
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