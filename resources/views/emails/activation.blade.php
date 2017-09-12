<h1>Hello</h1>

<p>
   Please click the folowing link to activate your account

    <a href="{{env('APP_URL')}}/activate/{{$user->email}}/{{$code}}">Click to activate!</a>
</p>