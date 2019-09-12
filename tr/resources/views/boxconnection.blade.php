@extends('layout')

@section('style')
<style>
    body {
            font-family: arial,"Microsoft JhengHei","微軟正黑體",sans-serif !important;
            color:#a6a6a6;
            background-color:#1c1c1c;
            text-align:center
        }
    .test {
        border:solid;
        background-color: white;
        color: black;
        text-align:center
    }
    .test2 {
        border:solid;
        border-color:wheat;
    }
    th{
        border:solid;
        border-color:wheat;
    }
    td {
        border:solid;
        border-color:wheat;
    }
    .noTouch {
        background-color: gray;
    }
</style>
@endsection

@section('content')
<div class='form-group'>
    選擇:
    <select name="" id="">
        @foreach ($aElementListIdList as $aElementListIdItem)
        <option value="{{$aElementListIdItem['element_list_id']}}">{{$aElementListIdItem['name']}}</option>
        @endforeach
    </select>
</div>
<div class='col-md-12 test'>
    <table class='col-md-12'>
        <tr>
            <th>null</th>
            <th colspan="{{$iElement0Length}}">element0.length</th>
            <th colspan="{{$iElement1Length}}">element1.length</th>
            <th colspan="{{$iElement2Length}}">element2.length</th>
        </tr>
        <tr>
            <td>head</td>
            @foreach ($aElementDetailList as $aElementDetailItem)
            <td>{{$aElementDetailItem['name']}}</td>
            @endforeach
        </tr>
        @foreach ($aElementDetailList as $index1 => $aElementDetailItem)
        <tr>
            <td>{{$aElementDetailItem['name']}}</td>
            @foreach ($aElementDetailList as $index2 => $aElementDetailItem)
                @if ($index1 == $index2)
                <td class='noTouch'></td>
                @else
            <td><button data-type="{{$aElementDetailItem['type']}}" class='buttonGroup' value="0"> -</button></td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
<script>
    $('.buttonGroup').click(function() {
        if ($(this).val() == 0) {
            let type = $(this).data('type')
            switch (type) {
                case 0:
                    $(this).html('O');
                    $(this).val(1);
                    break;
                case 1:
                    $(this).html('OO');
                    $(this).val(1);
                    break;
                case 2:
                    $(this).html('OOO');
                    $(this).val(1);
                    break;
            }
        } else {
            $(this).html('-');
            $(this).val(0);
        }
    })
</script>
@endsection