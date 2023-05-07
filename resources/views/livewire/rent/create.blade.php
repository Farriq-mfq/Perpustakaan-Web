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
                  <h3 class="card-title">Form Buat Pinjaman</h3>
                </div>
                <form wire:submit.prevent="store" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Kode">Kode Pinjam</label>
                      <input type="text" disabled class="form-control @error('kode') is-invalid @enderror" id="kode" wire:model="kode">
                      @error('kode')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror        
                    </div>
                    <div class="form-group">
                      <label for="kode_buku">Kode Buku</label>
                      <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" id="kode_buku" placeholder="Masukan Kode buku" wire:model="kode_buku">
                      @error('kode_buku')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <select wire:model="anggota_id" class="form-control @error('anggota_id') is-invalid @enderror select2" style="width: 100%;">
                            @foreach ($anggotas as $anggota)
                            <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                            @endforeach
                        </select>
                        @error('anggota_id')
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