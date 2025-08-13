@if(session('cart') && count(session('cart')) > 0)
<li>
    <h6 class="dropdown-header text-center fw-bold text-primary">Your Cart</h6>
</li>
<li class="cart-items-list p-0">
    @foreach(session('cart') as $key => $item)
    <div class="cart-item d-flex align-items-center border-bottom pb-2 pt-2">
        <img loading="lazy" src="{{ asset('assets/upload/prod/' . $item['image']) }}" alt="{{ $item['name'] }}" class="rounded" width="60" height="60">
        <div class="ms-3">
            <h6 class="m-0">{{ $item['name'] }}</h6>
            <p class="text-muted small mb-1">{{ $item['quantity'] }} × <strong class="text-dark">{{ $item['price'] }} AED</strong></p>
        </div>
        <button class="btn btn-danger btn-sm ms-auto remove-from-cart" data-id="{{ $key }}">
            <i class="fa fa-trash"></i>
        </button>
    </div>
    @endforeach
</li>
<li class="p-2 mx-0">
    <div class="d-flex gap-2">
        <a href="{{ route('cart.view') }}" class="btn btn-primary btn-sm flex-grow-1">View Cart</a>
        <button class="btn btn-danger btn-sm flex-grow-1 clear-cart">Clear Cart</button>
    </div>
</li>
@else
<li>
    <p class="text-center product-cart-empty text-muted">Your shopping cart is empty!</p>
</li>
@endif