@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Fee Amount Data</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/setup/fee/amount/view"><i class="mdi mdi-arrow-left-bold-circle"></i></a></li>
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
                <h3 class="box-title"> Fee Amount List </h3>
                <a href=" " style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4>
                    <strong>Fee Category : </strong> {{ $detailsData['0']['fee_category']['name'] }}
                </h4>

                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">No</th>
                              <th>Class Name</th>
                              <th>Amount </th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($detailsData as $key => $detail)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $detail['student_class']['name']}}</td>
                              <td>{{ $detail->amount }}</td>
                              
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