<html>

<body>
    <p>Dear Admin,</p>
    <p>A new order has been placed and is currently pending your approval.</p>
    @if($user)
    <p>The order was placed by "<strong>{{ $user->name }}</strong>" with ID "<strong>ORD-{{ $order->id }}</strong>".</p>
    @else
    <p>The order was placed by a guest user with ID "<strong>ORD-{{ $order->id }}</strong>".</p>
    @endif
    <p>Please review the order and take appropriate action to approve or reject it. If you have any questions or need further information, feel free to contact the customer directly.</p>
    <p>Thank you for your attention to this matter.</p>
</body>

</html>