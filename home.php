<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USIU Computer Lab Feedback System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            overflow-y: auto;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        header {
            position: relative;
            height: 20vh;
            background: url('https://images.pexels.com/photos/3184404/pexels-photo-3184404.jpeg?auto=compress&cs=tinysrgb&w=1200') center/cover no-repeat;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        header h1 {
            margin: 0;
            font-size: 2.8em;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            position: relative; 
            z-index: 2;
        }
        header p {
            font-size: 1.4em;
            margin: 5px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 2;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .intro {
            text-align: center;
            margin-bottom: 30px;
        }
        .intro h2 {
            font-size: 2em;
            color: #0078D7;
            margin-bottom: 10px;
        }
        .intro p {
            font-size: 1.2em;
            color: #555;
            margin: 0 20px;
        }
        .feedback-btn {
            display: inline-block;
            padding: 15px 30px;
            background: #0078D7;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            transition: background 0.3s, transform 0.3s;
            margin: 20px 0;
        }
        .feedback-btn:hover {
            background: #0056a0;
            transform: scale(1.05);
        }
        .testimonials {
            margin-top: 40px;
            text-align: center;
            width: 100%;
        }
        .testimonials h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #0078D7;
        }
        .testimonial {
            background: #f9f9f9;
            padding: 20px;
            margin: 10px 0;
            border-left: 5px solid #0078D7;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .testimonial:hover {
            transform: translateY(-5px);
        }
        .testimonial p {
            font-style: italic;
            margin: 0;
            font-size: 1.1em;
        }
        .testimonial strong {
            display: block;
            margin-top: 10px;
            color: #0078D7;
        }
        footer {
            margin-top: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            text-align: center;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the USIU Computer Lab Feedback System</h1>
        <p>Supporting You Through ICT Assistance</p>
    </header>
    
    <div class="container">
        <div class="intro">
            <h2>Report Computer Lab Issues</h2>
            <p>If you experience any issues in our computer labs, we're here to help. Whether you're a professor or student, submit your feedback, and our ICT department will address it promptly.</p>
            <a href="register.php" class="feedback-btn">Submit Your Feedback</a>
        </div>

        <div class="testimonials">
            <h2>Hear From Your Peers</h2>
            <div class="testimonial">
                <p>"I had a network issue, and the ICT team resolved it quickly. Thank you for this platform!"</p>
                <strong>- Jane Doe, Student</strong>
            </div>
            <div class="testimonial">
                <p>"The ICT team is always on top of things. This feedback system has been very efficient."</p>
                <strong>- Dr. Smith, Professor</strong>
            </div>
            <div class="testimonial">
                <p>"Thanks to the prompt responses, our classes run smoothly without technical hiccups."</p>
                <strong>- Emily Johnson, Student</strong>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 USIU. All Rights Reserved.</p>
    </footer>
</body>
</html>
