@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="/admin">Dashboards, Periode {{ $month }}</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pengeluaran</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($pengeluaran,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pemasukan</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($pemasukkan,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Keuntungan</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($keuntungan,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pesanan</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $pesanan }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Diagram Penjualan</h6>
              <h5 class="h3 mb-0">Total Pesanan</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart" id="chartpenjualan">
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Diagram Kas</h6>
              <h5 class="h3 mb-0">Jumlah Nominal</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart" id="chartpemasukkan">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Pesanan</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Total</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Belum Bayar
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Belum Bayar
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Produk</h3>
            </div>
            <div class="col text-right">
              <a href="/produk" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Stok</th>
                <!-- <th scope="col">Produk Terjual</th> -->
              </tr>
            </thead>
            <tbody>
              <tr></tr>
              <tr></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chartpenjualan', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Jumlah Penjualan'
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: [
        'Jenis Penjualan'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah Transaksi'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} kali</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Penjualan Produk',
      data: [{{ $penjualan_produk }}]

    }, {
      name: 'Penjualan Custom',
      data: [{{ $penjualan_custom }}]

    }]
  });

  Highcharts.chart('chartpemasukkan', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Jumlah Pemasukkan'
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: [
        'Jenis Transaksi'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Nominal'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Pemasukkan',
      data: [{{ $pemasukkan }}]

    }, {
      name: 'Pengeluaran',
      data: [{{ $pengeluaran }}]

    }]
  });
</script>
@endsection