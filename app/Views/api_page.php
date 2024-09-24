<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Testing Documentation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        h2, h3 {
            margin-top: 20px;
        }
        pre {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="button-container">
            <a href="<?= site_url('upload') ?>" class="btn btn-secondary">Back</a>
            <a href="<?= site_url('weather') ?>" class="btn btn-primary">Third-Party API Integration</a> 
        </div>

        <h1 class="text-center">API Testing Documentation</h1>
        <h2>Base URL</h2>
        <p><strong>http://localhost:8000/index.php/api</strong></p>

        <h2>Endpoints</h2>

        <h3>1. Get All Products</h3>
        <p><strong>Method:</strong> GET</p>
        <p><strong>Endpoint:</strong> <code>/products</code></p>
        <p><strong>Example Request:</strong></p>
        <pre>
GET http://localhost:8000/index.php/api/products
        </pre>
        <p><strong>Example Response:</strong></p>
        <pre>
HTTP/1.1 200 OK
Content-Type: application/json

[
    {
        "id": 1,
        "name": "Product 1",
        "price": 100
    },
    {
        "id": 2,
        "name": "Product 2",
        "price": 150
    }
]
        </pre>

        <h3>2. Create a Product</h3>
        <p><strong>Method:</strong> POST</p>
        <p><strong>Endpoint:</strong> <code>/products</code></p>
        <p><strong>Example Request:</strong></p>
        <pre>
POST http://localhost:8000/index.php/api/products
Content-Type: application/json

{
    "name": "New Product",
    "price": 200
}
        </pre>
        <p><strong>Example Response:</strong></p>
        <pre>
HTTP/1.1 201 Created
Content-Type: application/json

{
    "id": 3,
    "name": "New Product",
    "price": 200
}
        </pre>

        <h3>3. Update a Product</h3>
        <p><strong>Method:</strong> PUT</p>
        <p><strong>Endpoint:</strong> <code>/products/update/{id}</code></p>
        <p><strong>Example Request:</strong></p>
        <pre>
PUT http://localhost:8000/index.php/api/products/update/3
Content-Type: application/json

{
    "name": "Updated Product",
    "price": 250
}
        </pre>
        <p><strong>Example Response:</strong></p>
        <pre>
HTTP/1.1 200 OK
Content-Type: application/json

{
    "id": 3,
    "name": "Updated Product",
    "price": 250
}
        </pre>

        <h3>4. Delete a Product</h3>
        <p><strong>Method:</strong> DELETE</p>
        <p><strong>Endpoint:</strong> <code>/products/{id}</code></p>
        <p><strong>Example Request:</strong></p>
        <pre>
DELETE http://localhost:8000/index.php/api/products/3
        </pre>
        <p><strong>Example Response:</strong></p>
        <pre>
{
    "message": "Product deleted successfully"
}
        </pre>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
