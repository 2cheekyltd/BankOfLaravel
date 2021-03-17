@extends('layouts.app')

@section('content')
    <h1>Withdrow</h1>
    <br>
    <form method="post" action="{{asset('withdrow')}}" >
    @csrf
        <input type="number" name="user_id" required placeholder="User Id">
        <input type="number" name="withdrow_amount" required placeholder="Withdrow Amount">

        <Button type="submit">Withdrow</Button>
    </form>
@endsection
