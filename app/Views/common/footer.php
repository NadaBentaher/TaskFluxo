<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        #content {
            flex: 1 0 auto;
            min-height: calc(30vh - 100px); /* Adjust this value to push the footer lower */
        }

        .footer {
            flex-shrink: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    

    <!-- Footer Section -->
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- Quick Links -->
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url();?>" class="text-white"><i class="fas fa-angle-right"></i> Home</a></li>
                        <!-- <li><a href="shop.php" class="text-white"><i class="fas fa-angle-right"></i> Shop</a></li> -->
                        <li><a href="<?= site_url('about');?>" class="text-white"><i class="fas fa-angle-right"></i> About</a></li>
                        <!-- <li><a href="contact.php" class="text-white"><i class="fas fa-angle-right"></i> Contact</a></li> -->
                    </ul>
                </div>
                <!-- Extra Links -->
                <div class="col-md-3">
                    <h5>Extra Links</h5>
                    <ul class="list-unstyled">
                    <li><a href="https://www.jira.com" class="text-white" target="_blank"><i class="fas fa-angle-right"></i> Jira</a></li>
        <li><a href="https://www.slack.com" class="text-white" target="_blank"><i class="fas fa-angle-right"></i> Slack</a></li>
        <li><a href="https://www.github.com" class="text-white" target="_blank"><i class="fas fa-angle-right"></i> GitHub</a></li>
        <li><a href="https://www.stackoverflow.com" class="text-white" target="_blank"><i class="fas fa-angle-right"></i> Stack Overflow</a></li>
                    </ul>
                </div>
                <!-- Contact Info -->
                <div class="col-md-3">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-phone"></i> (+216) 24 626 212</p>
                    <p><i class="fas fa-envelope"></i> TaskFluxo@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Tunis, Tunisie - 1000</p>
                </div>
                <!-- Follow Us -->
                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <a href="https://www.facebook.com" class="text-white d-block" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="https://twitter.com" class="text-white d-block" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="https://www.instagram.com" class="text-white d-block" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                    <a href="https://www.linkedin.com/in" class="text-white d-block" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
