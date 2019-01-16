@extends('standard')

@section('style')
    @media (max-width: 720px) {
        img {
            margin-left: -1px;
        }
    }
@endsection

@section('title', 'Map')

@section('content')
    <div class="col-md-6 col-sm-12 mx-auto mh-100" style="white-space:nowrap;">
        <div class="text-center">
        @spaceless
            <?php $counter = 0;?>
            @foreach($coords as $coord)
                <?php $counter++;?>
                <a href="/map?x={{ $coord->y }}&y={{ $coord->x }}&range={{ $range }}">
                @if($coord->image != '')
                    <img src="{{ '/images/' . $coord->image }}" class="img-fluid" style="margin-top:-4px; margin-left: -1px;" data-toggle="tooltip" data-placement="bottom" data-html="true"
                        title="{{ $coord->y }},{{ $coord->x }} @if(!empty($coord->info)) <br>Additional Info:<br/>{{ $coord->info }} @endif">
                @else
                    <img src="/images/unknown.gif" class="img-fluid" data-toggle="tooltip" data-placement="bottom" title="{{ $coord->y }},{{ $coord->x }}">
                @endif
                @if($counter === ($range * 2) + 1)
                    <br />
                    <?php $counter = 0;?>
                @endif
                </a>
            @endforeach
        @endspaceless
        </div>
    </div>
    <div class="col-md-6 col-sm-12 mx-auto mh-100">
        <form class="col-md-6" action="/map" method="GET" style="padding-top:20px;">
            <div class="form-group row">
                <label for="x" class="d-none d-lg-block">X Coordinate</label>
                <input id="x" class="form-control" placeholder="X Coord" type="text" name="x">
            </div>
            <br />
            <div class="form-group row">
                <label for="y" class="d-none d-lg-block">Y Coordinate</label>
                <input id="y" class="form-control" placeholder="Y Coord" type="text" name="y">
            </div>
            <br />
            <div class="form-group row">
                <label for="range" class="d-none d-lg-block">Range (max 12)</label>
                <input id="range" class="form-control" placeholder="Range" type="text" name="range">
            </div>
            <br />
            <div class="form-group row">
                <input type="submit" class="mx-auto btn btn-secondary">
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
