@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Assign Subject Data</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/setup/assign/subject/view"><i class="mdi mdi-arrow-left-bold-circle"></i></a></li>
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
                <h3 class="box-title"> Assign Subject List </h3>
                <a href=" {{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4>
                    <strong>Assign Subject : </strong> {{ $detailsData['0']['student_class']['name'] }}
                </h4>

                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">No</th>
                              <th width="20%">School Subject</th>
                              <th width="20%">Full Mark </th>
                              <th width="20%">Pass Mark </th>
                              <th width="20%">Subjective Mark </th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($detailsData as $key => $detail)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $detail['school_subject']['name']}}</td>
                              <td>{{ $detail->full_mark }}</td>
                              <td>{{ $detail->pass_mark }}</td>
                              <td>{{ $detail->subjective_mark }}</td>
                              
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