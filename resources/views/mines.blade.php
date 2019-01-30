@extends('standard')

@section('title', 'Mines')

@section('content')
    <h2>Mines</h2>
      @foreach($mines as $key => $mine)
        @if(($key-1 != -1 && $mine->type != $mines[$key-1]->type) || $key == 0)
            <p><b>{{ ucfirst($mine->type) }}</b></p>
            <p>
        @endif
          {{ $mine->y }}, {{ $mine->x }}<br />
        @if($key + 1 != count($mines) && $mine->mine != $mines[$key + 1]->mine)
          </p>
        @endif
    @endforeach
@endsection
