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
    {{$aUserItem['name']}}
</div>
@endsection

@section('script')
<script>
</script>
@endsection