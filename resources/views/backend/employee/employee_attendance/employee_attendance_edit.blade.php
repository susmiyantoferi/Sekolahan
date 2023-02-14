@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit Attendance </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('employee.attendance.update') }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            <div class="row"> <!-- first row -->
                                <div class="col-md-6"> <!-- first col-md-6 -->

                                    <div class="form-group">
                                        <h5>Attendance Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control" value="{{ $editData['0']['date'] }}">
                                        </div> 
                                    </div>
                                    
                                </div> <!-- end col-md-6 -->
                            </div> <!-- end row -->


                            <div class="row"> <!-- first row -->
                                <div class="col-md-12"> <!-- first col-md-12 -->

                                    <table class="table table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">No</th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                            </tr>

                                            <tr>
                                                <th class="text-center btn present_all" style="display: table-cell; background-color:mediumslateblue">Present</th>
                                                <th class="text-center btn absent_all" style="display: table-cell; background-color:mediumslateblue">Absent</th>
                                                <th class="text-center btn leave_all" style="display: table-cell; background-color:mediumslateblue">Leave</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($editData as $key => $data)

                                            <tr id="div {{ $data->id }}" >
                                                <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $data['user']['name'] }}</td>
                                                <td colspan="3">
                                                    <div class="switch-toggle switch-3 switch-candy">
                                                        <input name="attend_status{{ $key }}" value="Present" id="present{{$key}}" type="radio" class="with-gap" id="radio_1" checked="checked" {{ ($data->attend_status == 'Present')? 'checked' : '' }}>
						                                <label for="present{{$key}}">Present</label>

                                                        <input name="attend_status{{ $key }}" value="Absent" id="absent{{$key}}" type="radio" class="with-gap" id="radio_2" {{ ($data->attend_status == 'Absent')? 'checked' : '' }}>
						                                <label for="absent{{$key}}">Absent</label>
                                                        
                                                        <input name="attend_status{{ $key }}" value="Leave" id="leave{{$key}}" type="radio" class="with-gap" id="radio_3" {{ ($data->attend_status == 'Leave')? 'checked' : '' }}>
						                                <label for="leave{{$key}}">Leave</label>
                                                    </div>

                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>

                                    </table>
                                    
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->
                         

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" >
                               <a href="/employees/attendance/employee/view" class="btn btn-rounded btn-primary mb-5">Back</a>
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>


    
    </div>
</div>


@endsection