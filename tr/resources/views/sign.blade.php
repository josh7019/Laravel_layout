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
    
</div>
@endsection

@section('script')
<script>
        alert('已登出');
        window.location = '/guest/index';
</script>
@endsection