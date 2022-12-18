  @extends('layouts.sub_default')
  @section('style')
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
  a{
    font-weight:bold;
    margin-right: 30px;
  }

    p{
      text-align:center;
    }

  .header{
    background-color:white;
    height:40px;
    position:relative;
  }
    .container{
    position:relative;
    background-color:#f2f2f2;
    height: 80vh;
    width: 100vw;
    padding-top: 20px;
  }
  .stamp{
    width: 500px;
    margin-left:auto;
    margin-right:auto;
  }
  button{
    width:280px;
    height:120px;
    background-color:#e5e5e5;
    /*color:black;*/
    border:none;
    margin: 12px;
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
  .tr1{
    margin-top:15px;
  }
  </style>
  @endsection

  @section("content")
<div class="container">
  <table class="stamp">
    <form method="post">
    @csrf
    <tr class="tr1">
      <th colspan="2">{{$users->name}}さんお疲れ様です！</th>
    </tr>
    <tr>

    </tr>
    <tr>
      <input type="hidden" name="user_id" value="{{$users->id}}">
      @if(is_null($result))

        <td><button type="submit" formaction="attendance/job_start">勤務開始</button></td>
         <td><button type="submit" formaction="attendance/job_end" disabled>勤務終了</button></td>
         <tr>
      <td><button type="submit" formaction="attendance/break_start" disabled>休憩開始</button></td>
      <td><button type="submit" formaction="attendance/break_end" disabled>休憩終了</button></td>
    </tr>
      @elseif(is_null($result['job_end_time']))
        <td><button type="submit" formaction="attendance/job_start" disabled>勤務開始</button></td>
        <td><button type="submit" formaction="attendance/job_end">勤務終了</button></td>
        <tr>
          @if(empty($result2['rest'][count($result2['rest'])-1]->break_start_time))
            <td><button type="submit" formaction="attendance/break_start" >休憩開始</button></td>
            <td><button type="submit" formaction="attendance/break_end" disabled>休憩終了</button></td>

          @elseif(empty($result2['rest'][count($result2['rest'])-1]->break_end_time))
           <td><button type="submit" formaction="attendance/break_start" disabled>休憩開始</button></td>
            <td><button type="submit" formaction="attendance/break_end">休憩終了</button></td>
            @else
            <td><button type="submit" formaction="attendance/break_start">休憩開始</button></td>
            <td><button type="submit" formaction="attendance/break_end" disabled>休憩終了</button></td>
          @endif
    </tr>
      @else
        <td><button type="submit" formaction="attendance/job_start" disabled>勤務開始</button></td>
        <td><button type="submit" formaction="attendance/job_end" disabled>勤務終了</button></td>
        <tr>
        <td><button type="submit" formaction="attendance/break_start" disabled>休憩開始</button></td>
        <td><button type="submit" formaction="attendance/break_end" disabled>休憩終了</button></td>
    </tr>
      @endif
    </tr>

    </form>
</table>
</div>
@endsection
