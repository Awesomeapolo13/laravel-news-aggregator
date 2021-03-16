<h2>Привет,
    @if(Auth::check())
        {{ Auth::user()->name }}</h2>
@endif
<br>
<p><strong><a href="{{ route('admin.admin') }}">To admin</a></strong>
    <br>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
</p>
