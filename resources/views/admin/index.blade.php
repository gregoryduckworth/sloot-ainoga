@extends('standard')

@section('title', 'Welcome')

@section('content')
    <div class="col">
        <div class="text-center">
            Welcome to Agonia Tools - Admin Section!
        </div>
        <div class="col mx-auto mh-100" style="padding-top: 20px;">
            <li><a href="/admin/update-info">Update Info</a></li>
            <li><a href="/admin/update-images">Update Images</a></li>
            <li><a href="/admin/clear-cache">Clear Cache</a></li>
        </div>
    </div>

@endsection
