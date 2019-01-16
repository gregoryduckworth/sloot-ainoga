@extends('standard')

@section('title', 'Upload')

@section('content')
    <div class="col-md-6 col-sm-12 mx-auto mh-100" style="padding-top: 20px;">
        <div class="card bg-light">
            <div class="card-header">
                <p class="text-center">
                    Paste this script into your browser console to get the correct details:<br />
                    <small><i>Please note, you have to be on the 'Look Around' page for this to work</i></small>
                </p>
            </div>
            <div class="card-body">
                <p class="card-text text-monospace">
                    var table = $('div.background > table');
                    var map = '';
                    for(var i = 0, row; row = table.rows[i]; i++) {
                        for(var j = 0, cell; cell = row.cells[j]; j++) {
                            if(table.rows[0].cells[j].innerHTML === '&amp;nbsp;') { } else {
                                if(table.rows[i].cells[0].innerHTML === '&amp;nbsp;') { } else {
                                    map += table.rows[i].cells[0].innerHTML + ','
                                        + table.rows[0].cells[j].innerHTML + ','
                                        + cell.style.background.replace('url("//','https://').replace('")','')
                                        + '\n';
                                }
                            }
                        }
                    }
                    console.log(map);
                    copy(map);
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 mx-auto mh-100" style="padding-top: 20px;">
        <form action="upload" method="POST">
            @csrf
            <div class="form-group row">
                <textarea class="form-control"  name="map" rows="20" cols="100"></textarea>
            </div>
            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            @if(isset($success))
                <div class="alert alert-success">{{ $success }}</div>
            @endif
            <div class="form-group row">
                <input class="mx-auto btn btn-secondary" type="submit">
            </div>
        </form>
    </div>
@endsection
