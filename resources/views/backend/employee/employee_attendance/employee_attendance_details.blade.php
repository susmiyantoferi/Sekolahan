@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Employee Attendance</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('employee.attendance.view') }}"><i class="mdi mdi-home-outline"></i></a></li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Employee Attendance Details</h3>
                {{-- <a href="{{ route('employee.attendance.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Attendance</a> --}}
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Name</th>
                                <th>Id No</th>
                                <th>Date</th>
                                <th>Attend Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($details as $key => $attend)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $attend ['user']['name']  }}</td>
                                <td>{{ $attend ['user']['id_no'] }}</td>
                                <td>{{date('d-m-Y', strtotime($attend->date)) }}</td>
                                <td>{{ $attend->attend_status }}</td>
                                
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                      </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection