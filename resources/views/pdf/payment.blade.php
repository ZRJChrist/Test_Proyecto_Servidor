<!DOCTYPE html>
<html>

<head>
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 24rem;
            background-color: #ffffff;
            border: 1px solid #000000;
            border-radius: 0.5rem;
            padding: 1.5rem;
            font-family: monospace;
        }

        .card-header {
            margin-bottom: 1.5rem;
            padding: 0.5rem;
            border: 1px solid #000000;
            background-color: #f0f0f0;
            border-radius: 0.5rem;
        }

        .card-header h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body {
            margin-bottom: 1.5rem;
        }

        .card-body h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body p {
            color: #666666;
            margin: 0.5rem 0;
        }

        .card-footer h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-footer p {
            color: #666666;
            margin: 0.5rem 0;
        }

        /* Estilos específicos */
        @media (max-width: 600px) {
            .card {
                width: 100%;
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-xl font-bold">Invoice ID: #{{ $invoice['payment']->id }}</h3>
                <p class="text-gray-600">Date of issue:
                    {{ \Carbon\Carbon::parse($invoice['payment']->created_at)->format('d-M-Y H:i') }}</p>
            </div>
            <div class="card-body">
                <h3 class="text-xl font-bold">Invoice to:</h3>
                <p class="text-gray-600">{{ $invoice['customer']->name }}</p>
                <p class="text-gray-600">{{ $invoice['customer']->phone }}</p>
                <p class="text-gray-600">{{ $invoice['customer']->email }}</p>
            </div>
            <div class="card-footer">
                <h1 class="text-xl font-bold">Concept: <span
                        class="text-gray-600">{{ $invoice['payment']->concept }}</span></h1>
                <p class="text-gray-600">Amount: <span
                        class="text-red-500">{{ $invoice['amountLocal'] }}${{ $invoice['payment']->currency }}</span>
                </p>
                <p class="text-gray-600">Notes:{{ $invoice['payment']->notes }} </p>
            </div>
        </div>
    </div>
</body>

</html>
