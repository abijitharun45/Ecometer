<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Carbon Footprint Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
       

        header {
            background-color:#4EA685;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        nav {
            background-color:#4EA685;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }
         
       


        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            margin-top: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        section {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 20px;
        }

        .carousel {
            overflow: hidden;
            position: relative;
            width: 100%;
            margin-top: 20px;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            width: 100%;
            margin-right: 20px;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        .arrow.left {
            left: 10px;
        }

        .arrow.right {
            right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carbon Footprint Tracker</h1>
    </header>
    
    <nav>
        <a href="#index">Home</a>
        <a href="#solution">Solution</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        
        <div id="logout-container" style="display: flex; align-items: center;">
            <form action="/logout" method="post">
                <button type="submit">Log out</button>
            </form>
        </div>
    </nav>

    <main>
        <form id="carbonForm">
            <label for="electricity">Electricity Usage (kWh):</label>
            <input type="number" id="electricity" placeholder="Enter your monthly electricity usage" required>

            <label for="gas">Natural Gas Usage (Litres):</label>
            <input type="number" id="gas" placeholder="Enter your monthly natural gas usage" required>

            <label for="fuel">Car Fuel Usage (Litres):</label>
            <input type="number" id="fuel" placeholder="Enter your monthly car fuel usage" required>

            <label for="flight">Flights taken monthly (less than 4 hours) :</label>
            <input type="number" id="flight" placeholder="Enter number of flights taken monthly" required>

            <label for="connection">Flights taken monthly (more than 4 hours) :</label>
            <input type="number" id="connection" placeholder="Enter number of flights taken monthly" required>

            <label for="recycle">Recycle :</label>
            <input type="number" id="recycle" placeholder="Do you recycle monthly" required>

            

            <button type="button" onclick="calculateFootprint()">Calculate Carbon Footprint</button>
        </form>

        <div id="result"></div>
    </main>

    <section>
        <h2>Why Track Your Carbon Footprint?</h2>
        <p>Reducing your carbon footprint helps combat climate change and promotes a sustainable future.</p>
        <div class="carousel" id="carousel1">
            <div class="carousel-inner">
                <div class="carousel-item"><img src="smoke.jpg" alt="Sustainable Living"></div>
                <div class="carousel-item"><img src="mask.jpg" alt="Eco-friendly Practices"></div>
                <div class="carousel-item"><img src="dro.jpg" alt="Renewable Energy"></div>
                <!-- Add more images as needed -->
            </div>
            <div class="arrow left" onclick="prevSlide('carousel1')">&#10094;</div>
            <div class="arrow right" onclick="nextSlide('carousel1')">&#10095;</div>
        </div>
    </section>

    <section id="solution">
        <h2><button onclick="location.href='solution.html'">Solution</button></h2>
        <p>Explore sustainable products and services to reduce your environmental impact.</p>
        <img src="buysell.png" alt="Solution">
    </section>

   

    <section id="about">
        <h2><button onclick="location.href='about-us.html'">About Us</button></h2>
        <p>Learn more about our mission to promote sustainable living and reduce carbon footprints.</p>
        <img src="about.png" alt="About Us">
    </section>

    <section id="contact">
        <h2><button onclick="location.href='contact.html'">Contact Us</button></h2>
        <p>Reach out to us for any inquiries or collaborations.</p>
        <img src="contactus.png" alt="Contact Us">
    </section>

    
    <script>
        function calculateFootprint() {
            // Get values from the form
            var electricity = parseFloat(document.getElementById('electricity').value);
            var gas = parseFloat(document.getElementById('gas').value);
            var fuel = parseFloat(document.getElementById('fuel').value);
            var flight = parseFloat(document.getElementById('flight').value);
            var connection = parseFloat(document.getElementById('connection').value);
            var recycle = parseFloat(document.getElementById('recycle').value);


            // Calculate total carbon footprint (a simplified example, not based on real emissions factors)
            var result = electricity * 105 + gas * 105 + fuel * 113.79 + flight * 1100 + connection * 4400 + recycle * 350;
            
            // Display the result
            document.getElementById('result').innerHTML = "<p>Your estimated monthly carbon footprint is: " + result + " kgCO2e</p>";
        }

        function nextSlide(carouselId) {
            var carousel = document.getElementById(carouselId);
            var inner = carousel.querySelector('.carousel-inner');
            var itemWidth = carousel.querySelector('.carousel-item').offsetWidth;
            var currentTransform = parseInt(inner.style.transform.replace('px', ''), 10) || 0;
            var newTransform = currentTransform - itemWidth;
            inner.style.transform = 'translateX(' + newTransform + 'px)';
        }

        function prevSlide(carouselId) {
            var carousel = document.getElementById(carouselId);
            var inner = carousel.querySelector('.carousel-inner');
            var itemWidth = carousel.querySelector('.carousel-item').offsetWidth;
            var currentTransform = parseInt(inner.style.transform.replace('px', ''), 10) || 0;
            var newTransform = currentTransform + itemWidth;
            inner.style.transform = 'translateX(' + newTransform + 'px)';
        }
    </script>
</body>
</html>