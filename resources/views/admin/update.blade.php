@extends('standard')

@section('title', 'Update')

@section('content')
    <div class="col-md-6 col-sm-12 mx-auto mh-100" style="padding-top: 20px;">
        @if(isset($success))
            <div class="alert alert-success">{{ $success }}</div>
        @endif
        <form action="update-info" method="POST">
            @csrf
            <div class="form-group row">
                <label>X Coordinate</label>
                <input class="form-control" type="text" name="y"/>
            </div>

            <div class="form-group row">
                <label>Y Coordinate</label>
                <input class="form-control" type="text" name="x"/>
            </div>

            <div class="form-group row">
                <label>Info</label><br />
                <textarea class="form-control" name="info" rows="10" cols="20"></textarea>
            </div>

            <div class="form-group row">
                <label>Mine</label></div>
                <select name="mine">
                    <option value="none">None</option>
                    @foreach($mines as $mine)
                        <option value="{{ $mine->id }}">{{ ucfirst($mine->type) }}</option>
                    @endforeach
                </select>

            <div class="form-group row">
                <input class="mx-auto btn btn-secondary" type="submit">
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
