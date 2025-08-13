@extends('layouts.app')
@section('title','Do you need help to buy curtains online in Dubai & Abu Dhabi')
@section('description','We help in buying curtains online in Dubai & Abu Dhabi. Luxury curtain, top quality and competent price that accommodate your budget and luxury as well, contact us now to make your curtain experience happy')
@section('og:description','We help in buying curtains online in Dubai & Abu Dhabi. Luxury curtain, top quality and competent price that accommodate your budget and luxury as well, contact us now to make your curtain experience happy')
@section('og:title','Do you need help to buy curtains online in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/help')
@section('canonical', url()->current())
@section('styles')
<style>
    .faq {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .faq h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .faq-item {
        margin-bottom: 10px;
    }

    .faq-item h3 {
        cursor: pointer;
        padding: 10px;
        background: #f5f5f5;
        border-radius: 5px;
    }

    .faq-item p {
        display: none;
        padding: 10px;
        background: #fff;
        border-left: 3px solid #f5f5f5;
        margin-top: 5px;
    }
     body {
      margin: 0;
      font-family: 'Inter', sans-serif;
    }

    section.elegant-section {
      display: flex;
      flex-wrap: wrap;
      min-height: 90vh;
    }

    .text-side {
      flex: 1;
      padding: 80px 60px;
      background-image: url('https://www.transparenttextures.com/patterns/square-bg.png');
      background-color: #f9f9f9;
      background-repeat: repeat;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .text-side h2 {
      font-size: 42px;
      color: #222;
      margin-bottom: 24px;
      line-height: 1.3;
      font-weight: 600;
    }

    .text-side p {
      font-size: 17px;
      line-height: 1.8;
      color: #555;
      max-width: 600px;
    }

    .text-side .cta-btn {
      display: inline-block;
      margin-top: 40px;
      background-color: #2e798c;
      color: #fff;
      padding: 14px 28px;
      border: none;
      border-radius: 4px;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .text-side .cta-btn:hover {
      background-color: #2e798c;
      transform: translateY(-2px);
    }

    .image-side {
      flex: 1;
      min-height: 350px;
    }

    .image-side img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    @media (max-width: 1024px) {
      .text-side, .image-side {
        flex: 100%;
      }

      .text-side {
        padding: 60px 30px;
        text-align: center;
      }

      .text-side p {
        margin: 0 auto;
      }
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
                Help
            </a>
        </li>
    </ul>
</div>

<div class="container">
    <h1 class="text-center">Curtain FAQ'S</h1>
    <p class="text-center">From selecting the right fabric to professional fitting we answer all your common questions for a smooth shopping experience.</p>
    <div class="faq">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <h3>What services do you offer?</h3>
            <p>We provide high-quality, custom-made curtains and blinds with a seamless ordering and delivery process.</p>
        </div>
        <div class="faq-item">
            <h3>How long does the delivery take?</h3>
            <p>Delivery usually takes between 7-14 business days, depending on the customization required.</p>
        </div>
        <div class="faq-item">
            <h3>Do you offer installation services?</h3>
            <p>Yes, we provide professional installation services to ensure the perfect fit for your space.</p>
        </div>
        <div class="faq-item">
            <h3>What payment methods do you accept?</h3>
            <p>We accept credit/debit cards, payment options for your convenience.</p>
        </div>
        <div class="faq-item">
            <h3>Can I customize the size and fabric of the curtains?</h3>
            <p>Yes we offer made to measure curtains tailored to your exact size fabric and design preferences for a perfect match with your interior.</p>
        </div>
        <div class="faq-item">
            <h3>Where is the best place to buy curtains in Dubai and Abu Dhabi?</h3>
            <p>Alkhyl Curtains is your trusted destination to buy high quality curtains in Dubai and Abu Dhabi. We offer a wide variety of styles fabrics and custom made options to perfectly match your home or office interiors.</p>
        </div>

         <div class="faq-item">
            <h3>Do you offer curtain accessories and fittings?</h3>
            <p>Yes we provide a full range of curtain accessories including rods tracks hooks tiebacks and motorized systems for a complete and stylish window treatment.</p>
        </div>
         <div class="faq-item">
            <h3>Can I see curtain samples before placing an order?</h3>
            <p>Of course we offer a free home visit with fabric samples so you can see and feel the material before making a decision.</p>
        </div>
         <div class="faq-item">
            <h3>What is the difference between ready-made curtains and custom-made curtains?</h3>
            <p>Ready-made curtains are pre designed in standard sizes while custom made curtains are tailored to fit your exact window measurements fabric choice</p>
        </div>
    </div>
</div>
  <section class="elegant-section">
    <div class="text-side">
      <h2>Beautiful Spaces Begin with<br> the Right Details</h2>
      <p>
        At Urban Shades, we believe it’s the subtle touches that make a space truly stand out.
        From carefully selected fabrics to precise fittings and finishes, our curtains and blinds are crafted to enhance
        your interiors with style, comfort, and functionality. Because every beautiful space starts with attention to detail.
      </p>
      <a href="{{route('about')}}" class="cta-btn">ABOUT US</a>
    </div>
    <div class="image-side">
      <img loading="lazy" src="{{ asset('assets\upload\curtains.webp') }}"  alt="Curtains and Sofa" />
    </div>
  </section>


<script>
    document.querySelectorAll('.faq-item h3').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>
@endsection
