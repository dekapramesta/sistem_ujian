@extends('layouts.master')

@section('content')
<div class="col-lg-12">
    <div class="row">

      <!-- Customers Card -->
      <div class="col-xxl-12 col-xl-12">

        <div class="card info-card customers-card">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
          <div class="card-body">
            {{-- <h5 class="card-title">ADMINISTRATOR <span>| {{ Auth::user()->name }}</span></h5> --}}
            <h5 class="card-title">ADMINISTRATOR <span>|</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>Selamat datang di CBT SMAN 1 Kawedanan</h6>
                <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">{{ now() }}</span>

                {{-- <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span> <span class="text-muted small pt-2 ps-1">{{ now() }}</span> --}}
              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->

      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Hasil Ujian <span>| Today</span></h5>

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">Nomor</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><a href="#">#2457</a></th>
                  <td>Brandon Jacob</td>
                  <td><a href="#" class="text-primary">At praesentium minu</a></td>
                  <td>$64</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2147</a></th>
                  <td>Bridie Kessler</td>
                  <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                  <td>$47</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2049</a></th>
                  <td>Ashleigh Langosh</td>
                  <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                  <td>$147</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Angus Grady</td>
                  <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                  <td>$67</td>
                  <td><span class="badge bg-danger">Rejected</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Raheem Lehner</td>
                  <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                  <td>$165</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Recent Sales -->

    </div>
  </div><!-- End Left side columns -->
@endsection
Footer