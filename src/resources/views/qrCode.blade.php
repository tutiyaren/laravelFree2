@extends('test')

@section('contents')

<div>

    {!! QrCode::size('400')->generate('Hello') !!}

    <p><a href="{{ route('test') }}">戻る</a></p>
</div>

@endsection