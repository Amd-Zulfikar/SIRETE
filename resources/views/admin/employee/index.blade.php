@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Buttons</h1> -->
            <!-- <td>
              
            </td> -->
            <ol class="breadcrumb float-sm-left">
              <a type="button" class="btn btn-block bg-gradient-primary" onclick="location.href='{{ route ('add.employee') }}'">Tambah Data</a>
            </ol>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">employee</li>
            </ol>
          </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" employee="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" employee="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Data employee
                </h3>
              </div>
              <!-- card -->
              <div class="card-body pad table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>employee</th>
                      <th>contact</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       @forelse($employees as $employee)
                      <td>{{ $employee->name }}</td>
                      <td>{{ $employee->contact }}</td>
                      <td> 
                        <a class="btn btn-info btn-sm" href="{{ route ('edit.employee', $employee->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                      </td>
                    </tr>
                     @empty
                  <tr>
                    <td>Data Note Found!</td>
                  </tr>
                  @endforelse
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>employee</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- Laravel Pagination -->
                <div class="mt-2">
                    {{ $employees->links('pagination::bootstrap-4') }}
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection