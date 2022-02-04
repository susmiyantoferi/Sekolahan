@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Student</h3>
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

          <div class="box bb-3 border-warning">
            <div class="box-header">
            <h4 class="box-title">Student <strong>Search</strong></h4>
            </div>
  
            <div class="box-body">
              
              <form method="" action="">

                <div class="row">

                  <div class="col-md-4">

                    <div class="form-group">
                      <h5>Year <span class="text-danger"></span></h5>
                      <div class="controls">
              
                          <select name="year_id"  required="" class="form-control">
                              <option value="" selected="" disabled="" >Select Year</option>
                              @foreach ($years as $year)
                              <option value="{{ $year->id }}">{{ $year->name }}</option> 
                              @endforeach
                          </select>

                      </div>
                    </div>

                   </div> {{--end col md 4 --}}

                   <div class="col-md-4">

                    <div class="form-group">
                      <h5>Class <span class="text-danger"></span></h5>
                      <div class="controls">
              
                          <select name="class_id"  required="" class="form-control">
                              <option value="" selected="" disabled="" >Select Class</option>
                              @foreach ($classes as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option> 
                              @endforeach
                          </select>

                      </div>
                    </div>

                   </div> {{--end col md 4 --}}

                   <div class="col-md-4" style="padding-top: 25px;">
                      
                    <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">

                   </div> {{--end col md 4 --}}

                </div> {{--end row --}}

              </form>

            </div>
          </div>
        </div> {{--end first col 12 --}}

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>Name</th>
                              <th>Number Id</th>
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $student)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $student->class_id }}</td>
                              <td>{{ $student->year_id }}</td>
                              <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger" id="delete">Delete</a>
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