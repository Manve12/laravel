
@extends('layout')

@section('head')
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
<div style="min-width:400px;">
  <image-carousel></image-carousel>
  <our-benefits id="benefits"></our-benefits>
  <our-services id="services"></our-services>
  <our-customers id="customers"></our-customers>
  <about-us id="about"></about-us>
  <contact-us id="contact"></contact-us>
  <web-footer></web-footer>
</div>
@endsection
