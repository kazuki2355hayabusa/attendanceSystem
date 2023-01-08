<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
 
  <style>
    .button1{
       width:30px;
    height:28px;
    background-color:#e5e5e5;
    /*color:black;*/
    /*border:none;*/
    margin: 12px;
    }
    .pagination
    {
      margin-top: 22rem;
    }
  </style> 
  <title>Document</title>

</head>
<body>

  <!--<p><button class="button1" onclick="location.href='/attendance/attendance_lis?date={{$date}}&flag=1'"><</button>{{$date}}<button class="button1" onclick="location.href='/attendance/attendance_lis?date={{$date}}&flag=2'">></button></p>-->
  <?php
   //$date2 = $date; 
   //str_replace('-','/',$date);
  ?>
  {{$date}}
   <p><button class="button1" onclick="test('{{$date}}',0)"><</button>{{$date}}<button class="button1" onclick="test('{{$date}}',1)">></button></p>
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
        {{$results[$i]->rest_total_data}}
      </td>
      <td>
        {{$results[$i]->job_times}}
      </td>
      </tr>  
      @endfor      
  </table>

      {{ $results->links() }}
  <script>
    function test(date,flag)
    {
        var dtobj = new Date(date);
        if(flag==0){  
          dtobj.setDate(dtobj.getDate() - 1);
        }else{
          dtobj.setDate(dtobj.getDate() + 1);
        }
    
        var y = dtobj.getFullYear();
        var m = ("00" + (dtobj.getMonth()+1)).slice(-2);
        var d = ("00" + dtobj.getDate()).slice(-2);
        var result = y + "/" + m + "/" + d;
        alert('aaa');
        location.href = `/attendance/attendance_lis?date=${result}`;
        alert(result);

    }
  </script>
    
</body>
</html>