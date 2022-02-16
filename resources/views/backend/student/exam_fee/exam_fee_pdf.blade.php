<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers" >
    <tr>
      <td>
        <h2>

          <?php $image_path = '/upload/sekolahan.png'; ?>
          <img src="{{ public_path().$image_path }}" width="200" height="100">

        </h2>
      </td>
      
      <td><h2>Easy Bootcamp Learning</h2>
        <p>School Address : INDONESIA</p>
        <p>School Phone : 9493666</p>
        <p>School Email : easyschool@gmail.com</p>
        <p><b> Student Exam Fee </b></p>
     </td>
    </tr>
</table>

@php

$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id', '4')
->where('class_id', $details->class_id)->first();
    
    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discounttablefee = $discount / 100 * $originalfee;
    $finalfee = (float)$originalfee - (float)$discounttablefee;

@endphp

<table id="customers">
  <tr>
    <th width="10%">No</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID Number</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Student Role</b></td>
    <td>{{ $details->roll}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Class</b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Fathers Name</b></td>
    <td>{{ $details['student']['f_name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Mothers Name</b></td>
    <td>{{ $details['student']['m_name'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Mobile Number</b></td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>Address</b></td>
    <td>{{ $details['student']['address'] }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><b>exam Fee</b></td>
    <td>{{ $originalfee }}$</td>
  </tr>
  <tr>
    <td>11</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount }}%</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Fee After Discount For {{ $exam_type }}</b></td>
    <td>{{ $finalfee }}$</td>
  </tr>
  
</table>
<br>
<i style="font-size: 10px; float: right;"> Print Date :  {{ date("d M Y") }}</i>

</body>
</html>


