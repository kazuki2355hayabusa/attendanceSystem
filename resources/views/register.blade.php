
  @extends('layouts.default')
  @section('style')
  <style>
  body{
    margin: 0px;
  }  
  .container{
    position:relative;
    /*background-color:#c4ced357;*/
    background-color:#f2f2f2;
    height: 82vh;
    width: 100vw;
  }
  .card{
    position:absolute;
    width: 300px;
    top: 32%;
    left: 50%;
    margin-top: 18px;
    transform: translate(-50%, -50%);
  }
  .login{
    width:300px;
    margin-bottom: 12px;
  }
  .login_t{
    width:330px;
  }
  .login_t .th_1{
    padding-bottom:20px;
  }
  tr{
    width:300px
  }
  .input{
    margin: 7px;
    width: 90%;
    height: 25px;
    border: 1px solid #B299FF;
    background-color:#f2f2f2;
    border-radius: 5px;
    font-size:11px

  }
  .button{
    width: 92%;
    height: 35px;
    margin: 7px;
    background-color:blue;
    color:white;
    border:none;
    border-radius: 5px;
  }
  p{
    text-align:center;
    color:#a2a2a2
;
    font-size:11px;
    margin:0px;
  }
  .header{
    background-color:white;
    height:80px;
    position:relative;
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
  h2{
    background-color:white;
    position:absolute;
    /*top: 15%;*/
    left:40px;
  }
  </style>
  @endsection

  @section("content")
  <div class="container">

   <div class="card">

  <form action="/register" method="POST" class="login">
    @csrf

      <table class="login_t">
        <tr>
          <th class="th_1">会員登録</th>
        </tr>
        @error('name')
        <tr>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <td><input type="text" name="name" placeholder="名前"  class="input"></td>
        </tr>
         @error('email')
        <tr>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <td><input type="mail" name="email" placeholder="メールアドレス" class="input"></td>
        </tr>
        @error('password')
        <tr>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <td><input type="password" name="password" placeholder=パスワード class="input"></td>
        </tr>
          <td><input type="password" name="password_confirmation" placeholder=確認用パスワード class="input"></td>
        <tr>
        </tr>
          <td><input type="submit" value="会員登録" class="button"></td>
        </tr>
      </table>
  </form>
  <p>アカウントをお持ちの方ははこちら</p>
  <p><a href="/login">ログイン</a></p>
  </div>
</div>
  @endsection

