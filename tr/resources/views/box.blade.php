@extends('layout')

@section('style')
<style>
    body {
            font-family: arial,"Microsoft JhengHei","微軟正黑體",sans-serif !important;
            color:#a6a6a6;
            background-color:#1c1c1c; 
        }
    .test {
        border:solid;
        background-color: #27ae60;
        color: white;
        text-align:center
    }
    .test2 {
        border:solid;
        border-color:wheat;
    }
    td{
        border:solid;
        border-color:wheat;
    }
</style>
@endsection

@section('content')
<div class='col-md-12 test'>
    <table class='col-md-12'>
        <tr>
            <th>123</th>
            <th>123</th>
            <th>123</th>
        </tr>
        <tr>
        </tr>
    </table>
</div>
@endsection

@section('script')
<script>
</script>
@endsection