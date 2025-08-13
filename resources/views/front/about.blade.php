@extends('layouts.app')
@section('title','About Us - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','About Us - Buy Online curtain in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/about')
@section('canonical', url()->current())
@section('styles')
<style>
    .content {
        margin-top: 20px;
        text-align: center;
    }

    .features {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    .feature-box {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        flex: 1;
        max-width: 350px;
    }

    .feature-box i {
        font-size: 30px;
        color: black;
    }

    .mission-section {
        margin-top: 50px;
        background-color: #f5f5f5;
        padding: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: left;
    }

    .mission-content {
        flex: 1;
        padding: 20px;
    }

    .mission-image {
        flex: 1;
        max-width: 500px;
    }

    .mission-image img {
        width: 100%;
        border-radius: 10px;
    }
</style>
@endsection
@section('content')

<div id="product-category" class="container">
    <ul class="breadcrumb">
        <li>
            <a href="{{route('index')}}">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="">
                About Us
            </a>
        </li>
    </ul>
</div>

<div class="container">
    <div class="content">
        <h1>Our Story</h1>
        <p>We created our company to make it easy for everyone to furnish their space without hassle and upfront cost. Along the journey, we realized how complicated it was to get custom-made products. We went through it all: unreliable suppliers, opaque prices, complex selection processes. With our service, we want to help you get what you need, without hassle.</p>
    </div>
    <div class="features">
        <div class="feature-box">
            <i class="icon-truck"></i>
            <p>Simplified Experience</p>
        </div>
        <div class="feature-box">
            <i class="icon-truck"></i>
            <p>Transparent Prices</p>
        </div>
        <div class="feature-box">
            <i class="icon-truck"></i>
            <p>Smooth Delivery Process</p>
        </div>
    </div>
    <div class="content mt-5">
        <h2>Our Mission</h2>
        <p>Our mission is simple to help you create beautiful spaces with the right curtains.</p>
    </div>
    <div class="mission-section">
        <div class="mission-image">
            <img loading="lazy" src="{{asset('/assets/front/image/about.png')}}" alt="Our Mission">
        </div>
        <div class="mission-content">
            <h2>Trouble-Free Services</h2>
            <p>We are transforming the buying experience by making it seamless, digital, and transparent. Our mission is to remove complexities and make every step hassle-free.</p>
            <p>With a commitment to excellence, we ensure a smooth process from selection to delivery, putting convenience at the forefront of our services.</p>
            <p>Customer satisfaction is our top priority, and we strive to offer a stress-free experience that exceeds expectations.</p>
            <p>By leveraging innovation and efficiency, we aim to simplify decision-making, making your journey effortless and rewarding.</p>
            <p>Our goal is to build trust through reliability, ensuring that every customer enjoys a frictionless and delightful service experience.</p>
        </div>

    </div>
    <div class="mission-section">
        <div class="mission-content">
            <h2>Our Professional Team</h2>
            <p>Our team consists of dedicated professionals who bring expertise, innovation, and passion to every project, ensuring excellence in service delivery.</p>
            <p>We work collaboratively to create seamless experiences, making every step effortless and stress-free for our customers.</p>
            <p>With a strong commitment to quality, our professionals focus on delivering top-notch solutions tailored to meet your specific needs.</p>
            <p>Transparency, efficiency, and customer satisfaction drive our team’s approach, ensuring a smooth and rewarding journey for every client.</p>
            <p>By combining skills, experience, and dedication, we strive to build lasting relationships and exceed expectations at every stage.</p>
        </div>
        <div class="mission-image">
            <img loading="lazy" src="{{asset('/assets/front/image/about_1.png')}}" alt="Our Mission">
        </div>
    </div>
    <div class="mission-section">
        <div class="mission-image">
            <img loading="lazy" src="{{asset('/assets/front/image/about_2.png')}}" alt="Our Mission">
        </div>
        <div class="mission-content">
            <h2>Quality Services with Reasonable Price</h2>
            <p>We are committed to delivering high-quality services at affordable prices, ensuring that our customers receive the best value for their investment.</p>
            <p>Our approach focuses on efficiency, reliability, and transparency, making the entire process smooth and hassle-free for our clients.</p>
            <p>By leveraging modern solutions and customer-centric strategies, we provide an easy and convenient experience tailored to your needs.</p>
            <p>With competitive pricing and uncompromised quality, we aim to make premium services accessible to everyone without hidden costs.</p>
            <p>Customer satisfaction is our priority, and we continuously strive to exceed expectations by offering outstanding services at the best possible price.</p>
        </div>

    </div>
</div>
@endsection