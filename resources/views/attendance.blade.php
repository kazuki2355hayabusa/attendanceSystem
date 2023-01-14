
 @extends('layouts.sub_default')
 @section('style')

<link href="{{ asset('css/app.css')}}" rel="stylesheet">
<!--<link href=".css/mybootstrap.scss" rel="stylesheet">-->
<!--<script src="{{ asset('js/app.js') }}"></script>-->
 
  <style>


     body{
      margin: 0px;
      

    } 
     h2{
    background-color:white;
    position:absolute;
    top: -20px;
    left:40px;
  }
  ul li{
        display: inline-block;
        text-align:right;
  }
  ul{
    text-align:right;
  }

  .header_link{
    font-weight:bold;
    margin-right: 30px;
  }
     p{
      text-align:center;
    }

  .header{
    background-color:white;
    height:50px;
    width: .w-auto;
    position:relative;
  }
   
 
    .container{
      position:relative;
      background-color:#f2f2f2;
      /*height: 80vh;*/
      height: 532px;
      width: 100vw;
      padding-top: 20px;
    }
    .stamp{
      width: 965px;
      height: 100px;
      margin-left:auto;
      margin-right:auto;
    }
    .header_t{ 
      margin-left:auto;
      margin-right:auto;
      text-align:center;
      height:45px;
    }
    .header_day{
      margin:27px;
      font-weight:bold;
    }
    .button1{
      width:30px;
      height:21px;
      background-color:white;
      color:#214bf4;
      font-weight:bold;
      border:1px solid #214bf4;*/
      margin: 12px;
    }
    .pagination
    {
      margin-top: 16rem;
      display: block;    
      text-align:center;
    }
     .fooder{
    position:relative;
    text-align:center;
    font-weight: bold;
    height:15px;
  }
  .fooder_c{
    position:absolute;
    text-align:center;
    top:50%;
  }
  .title{
    margin-top:15px;
  }
  th{
    text-align:left;
    height:50px;
  }
  td{
    font-weight:540;
  }
  th,td{
    border-top: 1px solid #909090;
    /*width:220px;*/
}


  </style> 
   @endsection

   @section("content")
   
   <div class="container">
    <p class="header_t"><button class="button1" onclick="test('{{$date}}',0)"><</button><span class="header_day">{{$date}}</span><button class="button1" onclick="test('{{$date}}',1)">></button></p>
   
    <table class="stamp" cellspacing="0">
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
     {{ $results->appends(request()->query())->links() }}

  </div>
      
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
        location.href = `/attendance/attendance_list?date=${result}`;


    }
  </script>

  
  
  @endsection