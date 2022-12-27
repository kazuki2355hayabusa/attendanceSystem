<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .button1{
       width:30px;
    height:20px;
    background-color:#e5e5e5;
    /*color:black;*/
    /*border:none;*/
    margin: 12px;
    }
  </style> 
  <title>Document</title>
</head>
<body>
  <p><button class="button1" onclick="location.href='/attendance/attendance_lis?date={{$date}}&flag=1'"><</button>{{$date}}<button class="button1">></button></p>
  <table>
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @for($i = 0;$i < count($results);$i++)
      <tr>
       <td> 
        {{$results[$i]->User->name}}
      </td>
      <td> 
        {{$results[$i]->job_start_time}}
      </td>
      <td>
        {{$results[$i]->job_end_time}}
      </td>
      <td>
        {{$break_totals[$i]}}
         
      </td>
      <td>
        {{$job_times[$i]}}
      </td>
      </tr>  
      @endfor      
  </table>
    
</body>
</html>