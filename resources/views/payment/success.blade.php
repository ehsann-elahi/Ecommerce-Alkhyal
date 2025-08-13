<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            padding: 30px;
        }
        .icon-success {
            font-size: 80px;
            color: #28a745; /* Green color */
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #2B2F7B;
            border-color: #2B2F7B;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e215a;
            border-color: #1e215a;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <i class="bi bi-check-circle-fill icon-success"></i>
            <h1 class="card-title">Payment Successful!</h1>
            <p class="card-text">
                Thank you for your purchase. Your order has been placed successfully.
                @if(isset($message))
                    <br>{{ $message }}
                @endif
            </p>
            <a href="/" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</body>
</html>
