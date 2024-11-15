@extends('ui.layouts.mainLayout')

@section('styles')
<!-- Add any additional CSS here if needed -->
@endsection

@section('content')


@include('ui.home.firstthree-section')
@include('ui.home.control-everything')
@include('ui.home.middle-section')
@include('ui.home.testimonial')
@include('ui.home.counter-up')
@include('ui.home.get-started')
@include('ui.home.client-section')
@include('ui.home.latest-news')
@include('ui.home.changing-mockup')
@include('ui.home.faq')



@endsection

@section('scripts')
  <script src="{{URL::asset('assets/js/home.js')}}"></script>
@endsection