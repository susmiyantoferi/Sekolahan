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
                 <h4 class="box-title">Edit Student</h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.student.registration', $EditData->student_id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $EditData->id }}">

                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Student Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="name" class="form-control" required="" value="{{ $EditData['student']['name'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Fathers Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="f_name" class="form-control" required="" value="{{ $EditData['student']['f_name'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Mothers Name <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="m_name" class="form-control" required="" value="{{ $EditData['student']['m_name'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 1st row --}}


                             <div class="row"> {{--first 2nd row --}}
                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Mobile Number <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="mobile" class="form-control" required="" value="{{ $EditData['student']['mobile'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Address <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="address" class="form-control" required="" value="{{ $EditData['student']['address'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Gender <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="gender" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Male" {{ ($EditData ['student']['gender'] == 'Male')? 'selected': '' }}>Male</option>
                                          <option value="Female" {{ ($EditData ['student']['gender'] == 'Female')? 'selected': '' }}>Female</option>
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
                                          <option value="Islam" {{ ($EditData ['student']['religion'] == 'Islam')? 'selected': '' }}>Islam</option>
                                          <option value="Kristen" {{ ($EditData ['student']['religion'] == 'Kristen')? 'selected': '' }}>Kristen</option>
                                          <option value="Hindu" {{ ($EditData ['student']['religion'] == 'Hindu')? 'selected': '' }}>Hindu</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="dob" class="form-control" required="" value="{{ $EditData['student']['dob'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Discount <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="discount" class="form-control" required="" value="{{ $EditData['discount']['discount'] }}">
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 3rd row --}}

                             <div class="row"> {{--first 4th row --}}

                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Year <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="year_id"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Year</option>
                                          @foreach ($years as $year)
                                          <option value="{{ $year->id }}" {{ ($EditData->year_id == $year->id)? "selected": "" }}>{{ $year->name }}</option> 
                                          @endforeach
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Class <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="class_id"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Class</option>
                                          @foreach ($classes as $class)
                                          <option value="{{ $class->id }}" {{ ($EditData->class_id == $class->id)? "selected": "" }}>{{ $class->name }}</option> 
                                          @endforeach
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Group <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="group_id"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Group</option>
                                          @foreach ($groups as $group)
                                          <option value="{{ $group->id }}" {{ ($EditData->group_id == $group->id)? "selected": "" }}>{{ $group->name }}</option> 
                                          @endforeach
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 4th row --}}


                             <div class="row"> {{--first 5th row --}}

                              <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Shift <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="shift_id"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Shift</option>
                                          @foreach ($shifts as $shift)
                                          <option value="{{ $shift->id }}" {{ ($EditData->shift_id == $shift->id)? "selected": "" }}>{{ $shift->name }}</option> 
                                          @endforeach
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <h5>Profile Images <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="file" name="image" id="image" class="form-control" > 
                                  </div>
                                </div>

                               </div> {{--end col md 4 --}}

                               <div class="col-md-4">

                                <div class="form-group">
                                  <div class="controls">
                                      <img id="showImage" src="{{ (!empty($EditData['student']['image'])) ? url('upload/student_images/'.$EditData['student']['image']) : url('upload/no_image.jpg') }}" 
                                      style="width: 100px; width: 100px; boarder: 1px solid #000000">
                                  </div>                                  
                                </div>

                               </div> {{--end col md 4 --}}

                             </div> {{--end 5th row --}}
                                    

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" >
                               <a href="/students/registration/view" class="btn btn-rounded btn-primary mb-5">Back</a>
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