@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Employee Salary Data</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/employees/salary/employee/view"><i class="mdi mdi-arrow-left-bold-circle"></i></a></li>
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
                <h3 class="box-title"> Employee Salary Details List</h3>
                <br><br>
                <h5><strong>Employee ID : </strong>{{ $details->id_no }}</h5>
                <h5><strong>Employee Name : </strong>{{ $details->name }}</h5>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table  class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>                              
                              <th>Present Salary</th>
                              <th>Effected Date</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($salary_log as $key => $logs)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>${{ $logs->previous_salary }}</td>
                              <td>${{ $logs->increment_salary }}</td>
                              <td>${{ $logs->present_salary }}</td>
                              <td>{{ date('d-m-Y', strtotime($logs->effected_salary))  }}</td>
                              
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