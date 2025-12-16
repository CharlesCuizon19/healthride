@extends('layouts.app')

@section('page-title', 'Destinations')
@section('content')

<x-banner2 title="Destinations" background="images/destinations.png" />


<x-destination-package
    heading="Safe, Reliable, and Compassionate Medical Rides"
    :packages="$ridePackages" />
@endsection