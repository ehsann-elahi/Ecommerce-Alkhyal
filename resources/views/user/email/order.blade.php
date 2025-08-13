<html>

<body>
    @if($user)
    <p>Dear {{ $user->name }},</p>
    @else
    <p>Dear Guest Customer,</p>
    @endif

    <p>Thank you for your order. Your Order Number is "ORD-{{ $order->id }}". Your request has been successfully placed and is currently pending approval. Please wait while we process your order. You will receive a notification once the approval process is complete. If you have any questions or need further assistance, do not hesitate to contact our customer support team.</p>
    <p>Thank you for your business!</p>
</body>

</html>