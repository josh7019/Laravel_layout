@extends('layout')

@section('style')
<style>
    div {
        text-align: center;
    }
</style>
@endsection

@section('content')
<div>
    {{$test}}
</div>
@endsection

@section('script')
<script>
    $(function() {
        alert();
    });
</script>
@endsection