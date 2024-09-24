<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
          .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
    <div class="button-container">
            <a href="<?= site_url('apidetail') ?>" class="btn btn-secondary">Back</a>
            <a href="<?= site_url('security') ?>" class="btn btn-primary">Security Xss</a> 
        </div>
  
        <h2 class="text-center">Weather Information</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('weather/fetchWeather') ?>" method="post" class="mb-4">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="city">Enter City Name:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Weather</button>
        </form>

        <?php if (isset($weather)): ?>
            <h4>Weather in <?= htmlspecialchars($weather['name']) ?>:</h4>
            <p>Temperature: <?= htmlspecialchars($weather['main']['temp']) ?> °C</p>
            <p>Weather: <?= htmlspecialchars($weather['weather'][0]['description']) ?></p>
            <p>Humidity: <?= htmlspecialchars($weather['main']['humidity']) ?>%</p>
            <p>Wind Speed: <?= htmlspecialchars($weather['wind']['speed']) ?> m/s</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
