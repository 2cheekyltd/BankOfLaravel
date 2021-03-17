@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    <br>
    <form method="post" action="{{asset('register')}}" >
    @csrf
        <input type="text" name="user_id" required placeholder="User Id">
        <input type="text" name="first_name" required placeholder="First Name">
        <input type="text" name="last_name" required placeholder="Last Name">
        <input type="email" name="email" required placeholder="Email">
        <input type="text" name="bank_account" required placeholder="Bank Account">
        <input type="number" name="phone_num" required placeholder="Phone Number">
        <input type="password" name="password" required placeholder="Password">

        <Button type="submit">Register</Button>
    </form>
@endsection
