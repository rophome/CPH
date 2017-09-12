<h1>Hello</h1>

<p>
   Please click the folowing link to reset password.

    <a href="{{env('APP_URL')}}/reset/{{$user->email}}/{{$code}}">Click to reset!</a>
</p>