@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Employee</h3>
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
                <h3 class="box-title"> Employee List</h3>
                <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee</a>
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

                              @if (Auth::user()->role == "Admin")
                              <th>Code</th>
                              @endif

                              <th>Join Date</th>
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $employee)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $employee->id_no }}</td>
                              <td>{{ $employee->name }}</td>
                              <td>{{ $employee->gender }}</td>
                              <td>{{ $employee->mobile }}</td>
                              <td>{{ $employee->salary }}</td>

                              @if (Auth::user()->role == "Admin")
                              <td>{{ $employee->code }}</td>
                              @endif

                              <td>{{ $employee->join_date }}</td>
                              <td>
                                <a href="{{ route('designation.edit',$employee->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('designation.delete',$employee->id) }}" class="btn btn-danger" id="delete">Delete</a>
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