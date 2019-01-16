@extends('standard')

@section('title', 'Update')

@section('content')
        <div class="flex-center position-ref full-height">

            <div class="row content">
                <div class="col-md6">
                    @if(isset($success))
                        <div class="alert alert-success">{{ $success }}</div>
                    @endif
                    <form action="update-info" method="POST">
                        @csrf
                        <label>X Coordinate</label>
                        <input type="text" name="x"/><br />

                        <label>Y Coordinate</label>
                        <input type="text" name="y"/><br />

                        <label>Info</label><br />
                        <textarea name="info" rows="10" cols="20"></textarea><br /><br />

                        <input type="submit" />
                    </form>
                    <hr>
                    <a href="/">Back to Main Page</a>
                </div>
            </div>
        </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
