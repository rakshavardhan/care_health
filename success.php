<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #4cae4c;
        }
    </style>
    <script>
        // Redirect to olduser.html after 5 seconds
        setTimeout(() => {
            window.location.href = 'olduser.html';
        }, 5000);
    </script>
</head>
<body>
    <div class="container">
        <h1>Submission Successful!</h1>
        <p>Thank you for your submission. You will be redirected shortly.</p>
        <p>If you are not redirected, <a href="olduser.html">click here</a>.</p>
    </div>
</body>
</html>
