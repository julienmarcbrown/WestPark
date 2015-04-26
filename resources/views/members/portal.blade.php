@extends('app')

@section('content')
    {!! Auth::user()->email !!}
    <div class="container">
        <h1>Members Portal</h1>

    </div>
@endsection
