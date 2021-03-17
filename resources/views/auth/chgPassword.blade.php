@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    <br>
    <form method="post" action="{{asset('chgPassword')}}" >
    @csrf
        <input type="text" name="user_id" required placeholder="User Id">
        <input type="password" name="old_pass" required placeholder="Old Password">
        <input type="password" name="new_pass" required placeholder="New Password">

        <Button type="submit">Change Password</Button>
    </form>
@endsection
