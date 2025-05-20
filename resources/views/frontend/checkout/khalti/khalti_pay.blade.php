<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pay with Khalti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .khalti-box {
      max-width: 400px;
      margin: 100px auto;
      text-align: center;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .khalti-img {
      max-width: 200px;
      margin-bottom: 20px;
    }
    .btn-khalti {
      background-color: #5d2e8c;
      color: #fff;
      font-weight: 500;
    }
    .btn-khalti:hover {
      background-color: #4a2570;
    }
  </style>
</head>
<body>

    {{-- {{ $name }} --}}

    {{-- <form action="{{ route('khalti.payment.initiate') }}" method="POST">
    @csrf
    <input type="hidden" name="amount" value="{{ $totalAmount }}">
    <input type="hidden" name="order_id" value="{{ $orderId }}">
  <div class="khalti-box">
    <img src="{{ asset('frontend/images/khalti-logo.png') }}" alt="Khalti Logo" class="khalti-img">
    <button type="submit" id="pay-buttons"v class="btn btn-khalti">Pay with Khalti</button>
  </div>
  </form> --}}

  <form action="{{ route('khalti.payment.initiate') }}" method="POST">
    @csrf
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="order_id" value="{{ $order_id }}">
  <div class="khalti-box">
    <img src="{{ asset('frontend/images/khalti-logo.png') }}" alt="Khalti Logo" class="khalti-img">
    <button type="submit" id="pay-buttons"v class="btn btn-khalti">Pay with Khalti</button>
  </div>
  </form>

  <!-- Khalti Script -->
  <script src="https://khalti.com/static/khalti-checkout.js"></script>
  <script>
    const khaltiConfig = {
      publicKey: "test_public_key_dc74d7f2b43e4edc8aa96bc17b72a971", // Replace with your actual public key
      productIdentity: "1234567890",
      productName: "Sample Product",
      productUrl: "http://example.com",
      eventHandler: {
        onSuccess(payload) {
          alert("Payment Successful: " + payload.idx);
          console.log(payload);
        },
        onError(error) {
          console.log(error);
        },
        onClose() {
          console.log("Khalti popup closed");
        }
      }
    };

    const checkout = new KhaltiCheckout(khaltiConfig);

    document.getElementById("pay-button").addEventListener("click", function () {
      checkout.show({ amount: 1000 }); // 1000 paisa = NPR 10
    });
  </script>

</body>
</html>
