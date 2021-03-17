@extends('layouts.app')

@section('content')
    <h1>Log In</h1>
    <br>
    <form method="post" action="{{asset('login')}}" >
    @csrf
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">

        <Button type="submit">Login</Button>
    </form>
@endsection
