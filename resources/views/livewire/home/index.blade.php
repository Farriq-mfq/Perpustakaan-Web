<div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Anggota</span>
            <span class="info-box-number">
                {{$total_anggota}}
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Buku</span>
            <span class="info-box-number">
                {{$total_buku}}
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-spinner"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Total Peminjaman Buku</span>
                <span class="info-box-number">
                    {{$total_peminjaman}}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Total Peminjaman Selesai</span>
                <span class="info-box-number">
                    {{$total_peminjaman_selesai}}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
    </div>
    @if($ischart)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grafik Peminjaman Perminggu</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$peminjamanMingguIni}}</span>
                    <span>Peminjaman setiap minggu</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> {{$persen}}%
                    </span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> 
                    {{$rangeMingguIni}}
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> 
                   {{$rangeMinggulalu}}
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
    </div>
    @endif
</div>
@push('scripts')
<script src="{{asset('/plugins/jquery/jquery.min.js')}}" ></script>
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}" ></script>
<script>
    /* global Chart:false */
document.addEventListener('livewire:load', function() {
  // console.log(@this.returnDays("2022-06-10"))
  $(function () {
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $visitorsChart = $('#visitors-chart')
    console.log(@this.mingguLalu)
    let labels__ = [];
    let labels__2 = [];
    let dataMingguLalu = []
    let dataMingguIni = []
    @this.mingguLalu.forEach(label => {
      labels__.push(label.tanggal_pinjam)
      dataMingguLalu.push(label.total)
    });
    @this.mingguIni.forEach(label_ => {
      labels__2.push(label_.tanggal_pinjam)
      dataMingguIni.push(label_.total)
    });
    var visitorsChart = new Chart($visitorsChart, {
      data: {
        labels: labels__2, // hanya minggu lalu
        datasets: [{
          type: 'line',
          data: dataMingguIni,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          pointBorderColor: '#007bff',
          pointBackgroundColor: '#007bff',
          fill: false
        },
        {
          type: 'line',
          data: dataMingguLalu,
          backgroundColor: 'tansparent',
          borderColor: '#ced4da',
          pointBorderColor: '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill: false
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
              suggestedMax: 10
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  })
  document.addEventListener('livewire:update', function () {
      visitorsChart.update()
    })
})
</script>
@endpush