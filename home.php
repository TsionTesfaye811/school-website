<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High School Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .background {
            background-image: url('class.jpg'); /* Set the background image */
            background-size: cover; /* Ensure the image covers the entire page */
            background-position: center; /* Center the image */
            height: 100vh; /* Set the height of the viewport */
            position: relative; /* Ensure relative positioning for absolute positioning */
        }
        header {
            background-color: rgba(51, 51, 51, 0.8); /* Add a semi-transparent background to the header */
            color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 50px; /* Set a smaller height for the header */
            padding: 0 10px; /* Reduce the padding */
            width: 100%; /* Full width */
            margin: 0; /* No margin needed */
            position: fixed; /* Keep the header fixed at the top */
            top: 0; /* Position the header at the top */
            z-index: 1; /* Ensure the header stays above other content */
        }
        .spacer {
            height: 100vh; /* Set the height of the spacer to match viewport height */
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding-top: 20px; /* Adjust padding for spacing within the container */
            background-color: beige; /* Background color for the container */
            padding: 20px; /* Add padding inside the container */
            position: absolute; /* Position the container relative to the .background */
            top: 100vh; /* Position the container just below the .background */
            left: 50%; /* Center the container horizontally */
            transform: translateX(-50%); /* Adjust for center alignment */
            background-size: cover;
            height: 100%;
            font-size:20px;
            padding-right:15px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            display: inline;
            margin-left: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            transition: background-color 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        .signin a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }
        .signin a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="background">
        <header>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="admissions.html">Admission</a></li>
                    <li class="signin"><a href="signin.html">Signin</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="spacer"></div> <!-- Spacer to push the content below the initial viewport -->
    <div class="container">
        <h2>Latest News</h2>
        <p>Stay updated with the latest happenings at our school. From academic achievements to extracurricular activities, our students are constantly making strides in their learning journey.</p>
        <h2>About Us</h2>
        <p>At Phase Academy school, we pride ourselves on providing a nurturing environment where students can excel academically and personally. Our dedicated faculty and staff are committed to fostering a love for learning and preparing students for success in their future endeavors. With a rich history of academic excellence and a focus on holistic development, we aim to empower our students to become confident, responsible, and compassionate individuals.</p>
        <h2>Admission Information</h2>
        <p>Discover the steps to becoming a part of our vibrant community. Learn about our admission process, explore our curriculum offerings, and find out why Phase Academy is the right choice for your child's education journey. We welcome prospective students and their families to visit our campus, meet our faculty, and experience firsthand what makes our school unique.</p>
    </div>
</body>
</html>
