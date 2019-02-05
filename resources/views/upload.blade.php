@extends('standard')

@section('title', 'Upload')

@section('content')
    <p class="text-center">
        Paste this script into your browser console to get the correct details:<br />
        <small><i>Please note, you have to be on the 'Look Around' page for this to work</i></small>
    </p>
    <div style="background-color:rgb(181,173,157, 0.1);">
        <p>
            var table = $('div.background > table');
            var map = '';
            for(var i = 0, row; row = table.rows[i]; i++) {
                for(var j = 0, cell; cell = row.cells[j]; j++) {
                    if(table.rows[0].cells[j].innerHTML === '&amp;nbsp;') { } else {
                        if(table.rows[i].cells[0].innerHTML === '&amp;nbsp;') { } else {
                            map += table.rows[i].cells[0].innerHTML + ','
                                + table.rows[0].cells[j].innerHTML + ','
                                + cell.style.background.replace('url("//','https://').replace('")','').replace('repeat scroll 0% 0%','').replace('rgba(0, 0, 0, 0)','')
                                + '\n';
                        }
                    }
                }
            }
            console.log(map);
            copy(map);
        </p>
    </div>
    <form action="upload" method="POST" style="padding-bottom: 20px;">
        @csrf
        <div class="form-group row">
            <textarea class="form-control"  style="margin-top:20px; margin-left:20px; width:100%;" name="map" rows="20" cols="100"></textarea>
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
@endsection
