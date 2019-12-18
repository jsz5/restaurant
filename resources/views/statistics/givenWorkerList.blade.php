@extends('layouts.app')

@section('content')
    <worker-statistics id="{{$workerId}}" year="{{$year}}"></worker-statistics>
@endsection
