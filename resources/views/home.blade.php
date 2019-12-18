@extends('layouts.app')

{{--@section('header')--}}
{{--    <div></div>--}}
{{--@endsection--}}

@section('content')
    <homepage role="{{\App\Services\UserService::getAuthRoles()}}"></homepage>
@endsection
