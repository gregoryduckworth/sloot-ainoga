@extends('standard')

@section('title', 'Mines')

@section('content')
    <div class="col mx-auto mh-100" style="padding-top: 20px;">
        @foreach($mines as $mine)
            <li>{{ $mine->y }}, {{ $mine->x }} - {{ ucfirst($mine->mine) }}</li>
        @endforeach
    </div>
@endsection
