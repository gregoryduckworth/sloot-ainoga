@extends('standard')

@section('title', 'Mines')

@section('content')
    <div class="col mx-auto mh-100" style="padding-top: 20px;">
        @foreach($mines as $key => $mine)
            @if(($key-1 != -1 && $mine->type != $mines[$key-1]->type) || $key == 0)
              <h3>{{ ucfirst($mine->type) }}</h3>
            @endif
            <li>{{ $mine->y }}, {{ $mine->x }}</li>
            @if($key + 1 != count($mines) && $mine->mine != $mines[$key + 1]->mine)
              <hr>
            @endif
        @endforeach
    </div>
@endsection
