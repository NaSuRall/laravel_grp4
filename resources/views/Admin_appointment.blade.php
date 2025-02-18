@extends( 'layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_appointment.css') }}">
@endsection
@section('content')
    @include('elements.nav')

@endsection


