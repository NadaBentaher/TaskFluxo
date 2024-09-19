<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFluxo Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
        body {
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        /* Welcome Section with Background Image and Overlay */
        .welcome-section {
            position: relative;
            background: url('public/images/company.png') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 80px 0; /* Adjust padding as needed */
            text-align: center;
        }

        .welcome-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
            z-index: 1;
        }

        .welcome-section .container {
            position: relative;
            z-index: 2;
        }

        .welcome-section h1, .welcome-section p {
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .features {
            padding: 50px 0;
            text-align: center;
        }

        .card {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            color: #f0f0f0;
        }

        .card-text {
            color: #dcdcdc;
        }

        .card-container {
            margin: 0 auto;
            max-width: 1200px;
        }

        .floating-card {
            transform: translateY(-10px);
            transition: transform 0.3s ease-in-out;
        }

        .floating-card:hover {
            transform: translateY(-15px);
        }

        .cta {
            background: #007bff;
            color: #fff;
            padding: 50px 0;
        }

        .cta h2, .cta p {
            margin: 0;
        }

        .cta .btn-primary {
            margin-top: 10px;
        }
      
    
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .bouncing {
            animation: bouncing 1s ease infinite;
        }

        @keyframes bouncing {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>
<body>
    <?= $this->include('common/header'); ?>

    <div id="content">
        <?= $this->renderSection('content'); ?>
    </div>

    <?= $this->include('common/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

