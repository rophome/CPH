Task 1 = xxxxxx
<br>
Task 2 = yyyyyy

<form action="/posts" method="POST" >
    {{csrf_field()}}
    <input type="text" name="title" placeholder="Title" >
    <input type="submit" value="Create Post">

</form>

<form action="/logout" method="POST" id="logout-form">
    {{csrf_field()}}
    <input type="submit" value="Logout">
</form>