@extends('standard')

@section('style')
    @media (max-width: 720px) {
        img {
            margin-left: -1px;
        }
    }
    .tooltip-inner {
        max-width: 200px;
        padding: 3px 8px;
        color: #fff;
        text-align: center;
        background-color: #000;
        border-radius: .25rem;
    }
    .tooltip.bs-tooltip-auto[x-placement^=bottom] .arrow::before, .tooltip.bs-tooltip-bottom .arrow::before {
        margin-left: -3px;
        content: "";
        border-width: 0 5px 5px;
        border-bottom-color: #000;
    }
@endsection

@section('title', 'Map')

@section('content')
    @spaceless
        <h2>Map</h2>
        <?php $counter = 0;?>
        <center>
        <table style="border-spacing: 0px; padding-bottom:20px; padding-top:20px;">
            <tr>
        @foreach($coords as $coord)
            <?php $counter++;?>
            <td>
                <a href="/map?x={{ $coord->y }}&y={{ $coord->x }}&range={{ $range }}" style="margin: 0; padding: 0; line-height: 0;">
            @if($coord->image != '')
                <img src="{{ '/images/' . $coord->image }}"
            @else
                <img src="/images/unknown.gif"
            @endif
                style="width: 24px; border: 0;" data-toggle="tooltip" data-placement="bottom" data-html="true"
                    title="{{ $coord->y }},{{ $coord->x }}
                    @if($coord->info || $coord->mine_id)
                        <br />Additional Info:<br />
                        @if($coord->info)
                            {{ $coord->info }}<br />
                        @endif
                        @if($coord->mine_id)
                            {{ ucfirst($coord->mine->type) }} Spot<br />
                        @endif
                    @endif
                    ">
            @if($counter === ($range * 2) + 1)
                <?php $counter = 0;?>
            </tr>
            @endif

            </a>
            </td>
        @endforeach
        </table>
        </center>
    @endspaceless
@endsection

@section('form')
<div class="panel" style="display:inline-block;">
    <form action="/map" method="GET">
        <div class="form-group row">
            <label for="x" class="d-none d-lg-block">X Coordinate</label>
            <input id="x" class="form-control" placeholder="X Coord" type="text" name="x" value="{{ app('request')->input('x') }}">
        </div>
        <br />
        <div class="form-group row">
            <label for="y" class="d-none d-lg-block">Y Coordinate</label>
            <input id="y" class="form-control" placeholder="Y Coord" type="text" name="y" value="{{ app('request')->input('y') }}">
        </div>
        <br />
        <div class="form-group row">
            <label for="range" class="d-none d-lg-block">Range (max 20)</label>
            <input id="range" class="form-control" placeholder="Range" type="text" name="range" value="{{ app('request')->input('range') }}">
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
