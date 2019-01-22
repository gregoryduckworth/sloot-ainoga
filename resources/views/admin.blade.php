@extends('standard')

@section('title', 'Welcome')

@section('content')
    Welcome to Agonia Tools - Admin Section!

    <div class="col mx-auto mh-100" style="padding-top: 20px;">
        <li><a href="/admin/update-info">Update Info</a></li>
        <li><a href="/admin/update-images">Update Images</a></li>
    </div>
@endsection
