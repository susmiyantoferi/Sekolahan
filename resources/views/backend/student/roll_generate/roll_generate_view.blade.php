@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Roll Generate</h3>
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
            <h4 class="box-title">Student <strong>Roll Generate</strong></h4>
            </div>
  
            <div class="box-body">
              
              <form method="GET" action="{{ route('student.year.class.search') }}">

                <div class="row">

                  <div class="col-md-4">

                    <div class="form-group">
                      <h5>Year <span class="text-danger"></span></h5>
                      <div class="controls">
              
                          <select name="year_id"  required="" class="form-control">
                              <option value="" selected="" disabled="" >Select Year</option>
                              @foreach ($years as $year)
                              <option value="{{ $year->id }}" {{ (@$year_id == $year->id)?"selected":"" }} >{{ $year->name }}</option> 
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
                              <option value="{{ $class->id }}" {{ (@$class_id == $class->id)?"selected":""}} >{{ $class->name }}</option> 
                              @endforeach
                          </select>

                      </div>
                    </div>

                   </div> {{--end col md 4 --}}

                   <div class="col-md-4" style="padding-top: 25px;">
                      
                    <a id="search" class="btn btn-primary" name="search">Search</a>

                   </div> {{--end col md 4 --}}

                </div> {{--end row --}}




                

              </form>
     
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection