@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Employee Salary</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
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
                <h3 class="box-title"> Employee Salary List</h3>
                <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Salary</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>Id No</th>
                              <th>Name</th>                              
                              <th>Gender</th>
                              <th>Mobile</th>
                              <th>Salary</th>
                              <th>Join Date</th>
                              <th width="20%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $salary)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $salary->id_no }}</td>
                              <td>{{ $salary->name }}</td>
                              <td>{{ $salary->gender }}</td>
                              <td>{{ $salary->mobile }}</td>
                              <td>${{ $salary->salary }}</td>
                              <td>{{date('d-m-Y', strtotime($salary->join_date)) }}</td>
                              <td>
                                <a href="{{ route('employee.registration.edit',$salary->id) }}" class="btn btn-info" title="Increment"><i class="fa fa-plus-circle"></i></a>
                                <a href="{{ route('employee.registration.details',$salary->id) }}" class="btn btn-danger" target="_blank" title="Details"><i class="fa fa-eye"></i></a>
                              </td>
                              
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