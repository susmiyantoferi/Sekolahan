@extends('admin.admin_master')

@section('admin')

{{-- jQuery Ajax CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Employee </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('store.employee.registration') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Employee Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="name" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Fathers Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="f_name" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Mothers Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="m_name" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 1st row --}}


                             <div class="row"> {{--first 2nd row --}}
                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Mobile Number <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="mobile" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Address <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="address" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Gender <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="gender" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 2nd row --}}

                             <div class="row"> {{--first 3rd row --}}

                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Religion <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="religion" id="religion" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Religion</option>
                                          <option value="Islam">Islam</option>
                                          <option value="Kristen">Kristen</option>
                                          <option value="Hindu">Hindu</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="dob" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Designation <span class="text-danger">*</span></h5>
                                    <div class="controls">
                            
                                        <select name="designation_id"  required="" class="form-control">
                                            <option value="" selected="" disabled="" >Select Designation</option>
                                            @foreach ($designation as $desig)
                                            <option value="{{ $desig->id }}">{{ $desig->name }}</option> 
                                            @endforeach
                                        </select>
          
                                    </div>
                                  </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 3rd row --}}

                             <div class="row"> {{--first 4th row --}}

                              <div class="col-md-3">

                                <div class="form-group">
                                    <h5>Salary <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="salary" class="form-control" required="">
                                    </div>
                                  </div>

                               </div> {{--end col md 3 --}}

                               <div class="col-md-3">

                                <div class="form-group">
                                    <h5>Join Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="join_date" class="form-control" required="">
                                    </div>
                                  </div>

                               </div> {{--end col md 3 --}}

                               <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Profile Images <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" id="image" class="form-control" > 
                                    </div>
                                  </div>
                               </div> {{--end col md 3 --}}

                               <div class="col-md-3">
                                <div class="form-group">
                                    <div class="controls">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" 
                                        style="width: 100px; width: 100px; boarder: 1px solid #000000">
                                    </div>                                  
                                </div>
                                </div> {{--end col md 3 --}}

                             </div> {{--end 4th row --}}
                                                               

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
                               <a href="/employees/regist/employee/view" class="btn btn-rounded btn-primary mb-5">Back</a>
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

{{-- Show Change Image JS --}}
<script type="text/javascript">

  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
  
    });
  
  });
  
  </script>


@endsection