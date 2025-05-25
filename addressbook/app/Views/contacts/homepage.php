<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addresio - Your Digital Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #003344;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            background-color: #003344; 
            padding: 3rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            max-width: 800px;
            margin: 0 20px;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #20c997;
        }

        .hero-subtitle {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            color: #e0e0e0;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .feature-item {
            text-align: center;
            padding: 1rem;
        }

        .feature-item i {
            font-size: 2.5rem;
            color: #20c997;
            margin-bottom: 1rem;
        }

        .cta-button {
            background-color: #20c997;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
        }

        .cta-button:hover {
            background-color: #17a689;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(32, 200, 151, 0.3);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.2rem;
            }
            .features {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Addresio</h1>
            <p class="hero-subtitle">Your Smart Digital Address Book Solution</p>
            
            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-address-book"></i>
                    <h3>Organize Contacts</h3>
                    <p>Keep all your contacts organized and accessible</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-tags"></i>
                    <h3>Smart Tags</h3>
                    <p>Categorize contacts with custom tags</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-cloud"></i>
                    <h3>Always Available</h3>
                    <p>Access your contacts anywhere, anytime</p>
                </div>
            </div>

            <a href="/contacts" class="cta-button">
                <i class="fas fa-arrow-right me-2"></i>
                Open Address Book
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
