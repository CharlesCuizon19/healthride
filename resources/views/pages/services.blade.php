@extends('layouts.app')

@section('page-title', 'Services')
@section('content')

<x-banner2 title="Services" background="images/services.png" />


<x-service-grid
    :services="$services"
    heading="Caring Transport Solutions for Every Need" />
@endsection