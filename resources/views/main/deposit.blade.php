@extends('layouts.app')

@section('content')
    <h1>Deposit</h1>
    <br>
    <form method="post" action="{{asset('deposit')}}" >
    @csrf
        <input type="number" name="user_id" required placeholder="User Id">
        <input type="number" name="deposit_amount" required placeholder="Deposit Amount">

        <Button type="submit">Deposit</Button>
    </form>
@endsection
