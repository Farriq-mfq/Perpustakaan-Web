<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h3 class="card-title">
            <i class="fas fa-text-width"></i>
            Detail Buku
          </h3>
          <a href="{{route('books.index')}}" class="btn btn-primary btn-sm">Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body row">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li><b>Kode Buku</b>
                        <ul class="list-unstyled">
                            <li>{{$book->kode_buku}}</li>
                        </ul>
                    </li>
                    <li><b>Judul</b>
                        <ul class="list-unstyled">
                            <li>{{$book->judul}}</li>
                        </ul>
                    </li>
                    <li><b>Penulis</b>
                        <ul class="list-unstyled">
                            <li>{{$book->penulis}}</li>
                        </ul>
                    </li>
                    <li><b>Pengarang</b>
                        <ul class="list-unstyled">
                            <li>{{$book->pengarang}}</li>
                        </ul>
                    </li>
                    <li><b>Penerbit</b>
                        <ul class="list-unstyled">
                            <li>{{$book->penerbit}}</li>
                        </ul>
                    </li>
                    <li><b>Tahun Terbit</b>
                        <ul class="list-unstyled">
                            <li>{{$book->tahun_terbit}}</li>
                        </ul>
                    </li>
                    <li><b>Stok</b>
                        <ul class="list-unstyled">
                            <li>{{$book->stok}}</li>
                        </ul>
                    </li>
                    <li><b>Lokasi Rak</b>
                        <ul class="list-unstyled">
                            <li>{{$lokasi_rak}}</li>
                        </ul>
                    </li>
                    <li><b>Source</b>
                        <ul class="list-unstyled">
                            <li>{{$book->source}}</li>
                        </ul>
                    </li>
                    <li><b>Type</b>
                        <ul class="list-unstyled">
                            <li>{{$book->type}}</li>
                        </ul>
                    </li>
                    <li><b>Status</b>
                        <ul class="list-unstyled">
                            <li>
                                <span class="badge @if ($book->status == 1) badge-success @else badge-danger @endif">
                                    {{$book->status == 1 ? 'Active' : 'Disable'}}
                                </span>
                            </li>
                        </ul>
                    </li>
                  </ul>
            </div>
            <div class="col-md-6">
                <h4>Cover</h4>
                <img src="{{asset('storage/cover/'.$book->cover)}}" class="img-thumbnail" alt="Load cover">
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>