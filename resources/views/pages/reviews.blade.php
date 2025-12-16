@extends('layouts.app')

@section('page-title', 'Reviews')
@section('content')

<x-banner2 title="Reviews" background="images/reviews.png" />

<x-review-grid
    :reviews="$reviews"
    heading="Reviews That Reflect Our Commitment"
    :initial="6" />
@endsection