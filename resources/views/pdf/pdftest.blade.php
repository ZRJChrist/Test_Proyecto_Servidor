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
                <h3>Invoice ID: #12345</h3>
                <p>Date of issue: 28-Feb-2024 14:30</p>
            </div>
            <div class="card-body">
                <h3>Invoice to:</h3>
                <p>Jane Doe</p>
                <p>123-456-7890</p>
                <p>jane@example.com</p>
            </div>
            <div class="card-footer">
                <h1>Concept: <span>Payment for Services</span></h1>
                <p>Amount: <span>$500 USD</span></p>
                <p>Notes: Payment received for services rendered.</p>
            </div>
        </div>
    </div>
</body>

</html>
