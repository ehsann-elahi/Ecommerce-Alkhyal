@extends('layouts.app')
@section('title','Get free new window curtain estimate online in Dubai & Abu Dhabi')
@section('description','Get free new window curtain estimate online in Dubai & Abu Dhabi, We are expert in providing luxury curtain to the customer at market competent price in UAE. We can provide estimate for blackout curtain, shear curtain, net curtain, we have high quality curtains at budget price')
@section('og:description','Get free new window curtain estimate online in Dubai & Abu Dhabi, We are expert in providing luxury curtain to the customer at market competent price in UAE. We can provide estimate for blackout curtain, shear curtain, net curtain, we have high quality curtains at budget price')
@section('og:title','Get free new window curtain estimate online in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/getEstimate')
@section('canonical', url()->current())
@section('styles')
<style>
    .image-container img {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .estimate-content {
        flex: 1;
        background: #f8f8f8;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .estimate-content h2 {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .size-options {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .size-options label {
        font-size: 16px;
        font-weight: 600;
    }

    .size-options input {
        width: 70px;
        padding: 5px;
        border: 2px solid #ccc;
        border-radius: 5px;
        text-align: center;
    }

    .preset-options,
    .pricing-options {
        display: flex;
        gap: 10px;
        margin: 15px 0;
    }

    .option {
        padding: 12px 15px;
        border: 2px solid #ccc;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
        background: #fff;
        transition: all 0.3s ease-in-out;
    }

    .option:hover {
        background: #000;
        color: #fff;
        border-color: #000;
    }

    .price {
        font-size: 28px;
        font-weight: bold;
        margin: 15px 0;
        color: #333;
    }

    #result {
        height: 250px;
    }

    .service-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .service-card i {
        font-size: 30px;
        color: #000;
    }

    .service-card h5 {
        font-weight: bold;
        margin-top: 10px;
        font-size: 18px;
    }

    .service-card p {
        color: #555;
    }

    .section-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .section-title h2 {
        font-weight: bold;
    }

    .section-title p {
        color: #555;
    }

    .info-box {
        background: white;
        border-radius: 15px;
        padding: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-box .number {
        font-size: 50px;
        font-weight: bold;
        color: #000;
        margin-right: 20px;
    }

    .info-box .content h5 {
        font-weight: bold;
        color: #000;
        font-size: 18px;
    }

    .info-box .content p {
        color: #555;
        margin: 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .section-title h2 {
        font-weight: bold;
    }

    .info-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-card h5 {
        font-weight: bold;
        color: #3E3E3E;
        font-size: 15px;
    }

    .info-card p {
        color: #555;
        margin: 0;
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
                Get Estimate
            </a>
        </li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="image-container">
                <img loading="lazy" src="{{asset('/assets/front/image/get_estimate.png')}}" alt="Curtain Setup">
            </div>
        </div>
        <div class="col-md-6">
            <div class="estimate-content">
                <h1>Get Estimate</h1>
                <form id="estimateForm" method="post" class="main-input">
                    <fieldset id="account">
                        <div class="row mb-3 required">
                            <div class="col-sm-12">
                                <select class="form-control form-control-rounded" id="category_id" required>
                                    <option value="">Choose</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}" data-price="{{ $product->price }}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <input type="number" name="height" id="height" placeholder="Height" class="form-control" required>
                                    <select class="form-control form-control-rounded" name="wh_units">
                                        <option value="m">m</option>
                                        <option value="cm">cm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <input type="number" name="width" id="width" placeholder="Width" class="form-control" required>
                                    <select class="form-control form-control-rounded" name="wh_units">
                                        <option value="m">m</option>
                                        <option value="cm">cm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <textarea placeholder="Price per sq.m (AED)" id="result" class="form-control" disabled></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <button type="button" class="btn btn-style" onclick="calculateCost()">Estimate Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="service-card">
                <i class="fas fa-truck"></i>
                <h5>Free Visit</h5>
                <p>Book a personalized visit to select the perfect fabric and style. Our experts will suggest motorized curtains to match your unique taste and home decor.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card">
                <i class="fas fa-truck"></i>
                <h5>12-months Guarantee</h5>
                <p>Rest easy with our 12-month curtain guarantee and a 5-year motor warranty. Premium quality and enduring performance are our commitments to you.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card">
                <i class="fas fa-truck"></i>
                <h5>5 Days delivery</h5>
                <p>From order to installation in just 5 days. Enjoy our swift and free setup service in Dubai, designed to bring luxury to your home without the wait.</p>
            </div>
        </div>
    </div>
</div>

<div class="section-title">
    <h2>How to choose your curtains?</h2>
    <p>To choose your curtains, simply pick</p>
</div>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="info-box">
                <div class="number">1</div>
                <div class="content">
                    <h5>Your style</h5>
                    <p>Based on the amount of sunlight you want streaming in, and the mood you want in your room, you can simply pick one of our 4 pre-curated styles.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <div class="number">2</div>
                <div class="content">
                    <h5>Your fabrics</h5>
                    <p>Sheer, velvet, linen, etc. Keep in mind that the color of your curtain should ideally be in sync with the rest of the furnishings.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-title">
    <h2>What are the different curtains styles?</h2>
</div>
<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="info-card">
                <h5>Here Comes The Sun White Sheer</h5>
                <p>Sheer fabric curtains, allowing sunlight to enter your room and softening it. Ideal to get privacy in a bedroom or living room. Does not allow to shut out daylight when hung alone.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <h5>Here Comes The Sun White Sheer</h5>
                <p>Sheer fabric curtains, allowing sunlight to enter your room and softening it. Ideal to get privacy in a bedroom or living room. Does not allow to shut out daylight when hung alone.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <h5>Here Comes The Sun White Sheer</h5>
                <p>Sheer fabric curtains, allowing sunlight to enter your room and softening it. Ideal to get privacy in a bedroom or living room. Does not allow to shut out daylight when hung alone.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <h5>Here Comes The Sun White Sheer</h5>
                <p>Sheer fabric curtains, allowing sunlight to enter your room and softening it. Ideal to get privacy in a bedroom or living room. Does not allow to shut out daylight when hung alone.</p>
            </div>
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


@endsection
@section('script')
<script>
    function calculateCost() {
        // Get input values
        let height = parseFloat(document.getElementById('height').value);
        let width = parseFloat(document.getElementById('width').value);

        // Get selected units for height and width correctly
        const heightUnit = document.querySelectorAll('select[name="wh_units"]')[0].value;
        const widthUnit = document.querySelectorAll('select[name="wh_units"]')[1].value;

        // Get the selected price from the dropdown
        const categorySelect = document.getElementById('category_id');
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const pricePerSqM = parseFloat(selectedOption.getAttribute('data-price'));

        // Validate inputs
        if (isNaN(height) || isNaN(width) || isNaN(pricePerSqM)) {
            alert("Please enter valid numbers for height, width, and select a category.");
            return;
        }

        // Convert height and width to meters based on selected units
        if (heightUnit === "cm") {
            height = height / 100; // Convert cm to meters
        }
        // Otherwise, it's already in meters (m)

        if (widthUnit === "cm") {
            width = width / 100; // Convert cm to meters
        }
        // Otherwise, it's already in meters (m)

        // Calculate area in square meters
        const area = height * width;

        // Calculate total cost
        const totalCost = area * pricePerSqM;

        // Display result
        document.getElementById('result').value =
            `Total Area: ${area.toFixed(2)} m²\nEstimated Cost: ${totalCost.toFixed(2)} AED`;
    }
</script>
@endsection
