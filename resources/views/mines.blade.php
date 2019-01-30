@extends('standard')

@section('title', 'Mines')

@section('content')
    <div class="col mx-auto mh-100" style="padding-top: 20px;">
        @foreach($mines as $key => $mine)
            <li>{{ $mine->y }}, {{ $mine->x }} - {{ ucfirst($mine->mine->type) }}</li>
            @if($key+1 != count($mines) && $mine->mine != $mines[$key+1]->mine)
              <hr>
            @endif
        @endforeach
    </div>
@endsection
