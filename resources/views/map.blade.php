<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agonia Map</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            br {
               display: block;
               margin: 10px -2px;
            }
	    img {
	       margin-top: -2px;
	    }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="row content">
                @spaceless
                <div class="col-md-10" style="line-height: 23px;">
                        <?php $counter = 0; ?>
			@foreach($coords as $coord)
                            <?php $counter++; ?> 
			    <a href="/map?x={{ $coord->y }}&y={{ $coord->x }}&range={{ $range }}">
                            @if($coord->image != '')
                                <img src="{{ '/images/' . $coord->image }}" class="img-fluid" data-toggle="tooltip" data-placement="bottom" data-html="true"
                                    title="{{ $coord->y }},{{ $coord->x }} @if(!empty($coord->info)) <br>Additional Info:<br/>{{ $coord->info }} @endif">
                            @else
                                <img src="/images/unknown.gif" class="img-fluid" data-toggle="tooltip" data-placement="bottom" title="{{ $coord->y }},{{ $coord->x }}">
                            @endif
                            @if($counter === ($range * 2) + 1)
                                <br />
				<?php $counter = 0; ?>
                            @endif
                            </a>
                        @endforeach
                </div>
                @endspaceless
                <div class="col-md-2">
                    <form action="/map" method="GET">
                        <label>X Coordinate</label>
                        <input type="text" name="x"/><br />

                        <label>Y Coordinate</label>
                        <input type="text" name="y"/><br />

                        <label>Range (max 12)</label>
                        <input type="text" name="range"/><br /><br />

                        <input type="submit" />
                    </form>
                    <hr>
                    <a href="/">Back to Main Page</a>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</html>

