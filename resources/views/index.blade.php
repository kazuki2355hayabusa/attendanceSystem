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
  .title{
    margin-top:15px;
  }
  </style>
  @endsection

  @section("content")
<div class="container">
  <table class="stamp">
    <form method="post">
      @csrf
      <tr class="title">
        <th colspan="2">{{$users->name}}さんお疲れ様です！</th>
      </tr>
      <tr>
        <input type="hidden" name="user_id" value="{{$users->id}}">
        <td><button type="submit" id="job_start" formaction="attendance/job_start">勤務開始</button></td>
         <td><button type="submit" id="job_end" formaction="attendance/job_end">勤務終了</button></td>
         <tr>
        <td><button type="submit" id="break_start" formaction="attendance/break_start">休憩開始</button></td>
        <td><button type="submit" id="break_end" formaction="attendance/break_end">休憩終了</button></td>
      </tr>
    </form>
  </table>
</div>
  <script>
    const attendace =  @json($attendace);
    const rest =  @json($rest);
    //window.alert(rest['rest'][0]);
    //window.alert(rest['rest'][0]['break_start_time']);
    //let el = document.body;
    //let str = "こんにちは！";

//el.textContent = rest['rest'];

    var target_job_start = document.getElementById("job_start");
    var target_job_end = document.getElementById("job_end");
    var target_break_start = document.getElementById("break_start");
    var target_break_end = document.getElementById("break_end");
    if(attendace === null)
    {
    
      target_job_start.disabled = false;
      target_job_end.disabled = true;
      target_break_start.disabled = true;
      target_break_end.disabled = true;
    }else if(attendace['job_end_time'] === null){
      if(rest['rest'][rest['rest'].length-1] === undefined){
      target_job_start.disabled = true;
      target_job_end.disabled = false;
      target_break_end.disabled = false;
      target_break_end.disabled = true;
      }else if(!(rest['rest'][rest['rest'].length-1]['break_end_time']))
        {
          target_job_start.disabled = true;
          target_job_end.disabled = true;
          target_break_start.disabled = true;
          target_break_end.disabled = false;
        }else{
          target_job_start.disabled = true;
          target_job_end.disabled = false;
          target_break_start.disabled = false;
          target_break_end.disabled = true;
        }

    }else{
      target_job_start.disabled = true;
      target_job_end.disabled = true;
      target_break_start.disabled = true;
      target_break_end.disabled = true;
    }
  </script>
@endsection
