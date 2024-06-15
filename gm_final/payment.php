<?php 
    session_start();  
    if(!isset($_SESSION['log']))
    {
      header('Location: homepagewoil.html');
    }
    if ($_SESSION['payment'] == false)
    {
        header('Location: homepagewl.php');
    }
    if (isset($_SESSION['u']))
    {
        $username=$_SESSION['u'];
    }
    setcookie("fufu","true",time()+(86400 * 30),"/");
?>
<!DOCTYPE html>
<?php
    if(isset($_GET['totalfair'])) 
    {
        $totalfair = $_GET['totalfair'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
    <title>Payment</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");

        :root 
        {
            --primary-color: #8E2157;
            --primary-color-dark: #6b0f3d;
            --text-dark: #0b0f18;
            --text-light: #503744;
            --extra-light: #f1f5f9;
            --white: #ffffff;
            --max-width: 1400px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body 
        {
            background-color: #f1f5f9;
        }

        header 
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 10px 20px 0 30px;
            z-index: 10;
            background-color: var(--white);
        }

        header .logo 
        {
            font-weight: 700;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.6s;
        }

        header ul 
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header ul li 
        {
            margin-right: 15px;
            list-style: none;
        }

        header ul li:last-child 
        {
            margin-right: 0;
        }

        header ul li a 
        {
            margin: 0 15px;
            text-decoration: none;
            color: var(--primary-color);
            letter-spacing: 2px;
            font-weight: 700;
            transition: 0.6s;
            background: #fff;
        }

        .nav__logo img 
        {
            height: 50px;
            width: 150px;
            margin-right: 10px;
        }

        .nav__links 
        {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav__links li 
        {
            list-style: none;
            display: inline-block;
            padding: 8px 12px;
            position: relative;
            font-family: 'Poppins', sans-serif;
        }

        .nav__links li a 
        {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .nav__links li::after 
        {
            content: '';
            width: 0%;
            height: 3px;
            background: var(--primary-color);
            display: block;
            margin: auto;
            transition: 0.5s;
        }

        .nav__links li:hover::after 
        {
            width: 80%;
        }

        .login 
        {
            display: flex;
            align-items: center;
        }

        .login i 
        {
            position: relative;
            right: 40px;
            top: 0px;
        }

        .login div 
        {
            position: relative;
            right: 35px;
        }

        .user-log 
        {
            position: relative;
            margin-top: -12px;

            color: var(--primary-color);
            text-decoration: none;
        }

        .user-log::after,
        .user-log:hover 
        {
            text-decoration: none;
            color: var(--primary-color);
            cursor: pointer;
        }

        .btn 
        {
            padding: 0.75rem 2rem;
            outline: none;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            color: var(--white);
            background-color: var(--primary-color);
            border-radius: 2rem;
            cursor: pointer;
            margin-top: -10px;
            transition: 0.3s;
        }

        .btn a 
        {
            color: var(--extra-light);
            text-decoration: none;
        }

        .btn:hover 
        {
            background-color: var(--primary-color-dark);
        }

        .footer 
        {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: var(--primary-color);
            padding: 20px 0;
            margin-top: 30px;
        }

        .footer__bar1 
        {
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .footer__bar1 p 
        {
            font-size: 0.9rem;
            color: white;
            padding: 0 80px;
        }

        .footer__container 
        {
            display: grid;
            grid-template-columns: 2fr repeat(2, 1fr);
            gap: 5rem;
            padding: 18px 8px;
        }

        .social
        {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .social span 
        {
            font-size: 1.4rem;
            color: var(--extra-light);
        }

        .social span a 
        {
            text-decoration: none;
            color: var(--extra-light)
        }

        .n_logo 
        {
            display: flex;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .n_logo img 
        {
            height: 40px;
            width: 120px;
            margin-right: 10px;
        }

        /* -----------------Payment CSS---------------------------- */
        body 
        {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container 
        {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        label 
        {
            display: block;
            margin-bottom: 5px;
        }

        .month,
        .year,
        .card_no 
        {
            display: flex;
            align-items: center;
            padding: 5px;
            margin-bottom: 10px;
        }

        input:focus 
        {
            border-color: #8e2157;

        }

        .month select,
        .year select 
        {
            width: 100%;
            padding: 10px;
            margin-right: 5%;
        }


        .cvv input[type="password"] 
        {
            width: 150px;
            padding: 10px;
            margin-left: 5px;
        }

        .cvv input[type="password"]:focus 
        {
            width: 150px;
            padding: 10px;
        }

        .nav-tabs 
        {
            display: flex;
            border-bottom: 1px solid transparent;
        }

        .nav-tab 
        {
            flex: 1;
            text-align: center;
            padding: 15px;
            cursor: pointer;
            background-color: #f0f0f0;
            border-right: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-tab:last-child 
        {
            border-right: none;
        }

        .nav-tab.active 
        {
            background-color: #fff;
            border-bottom: 3px solid #8e2157;
            ;
        }

        .payment-form 
        {
            padding: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        input[type="password"] 
        {
            background-color: #f4f4f4;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        select:focus,
        input[type="password"]:focus 
        {
            outline: none;
            border-color: #8e2157;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 2px solid #8e2157;
            border-radius: 4px;
        }

        .submit-button 
        {
            background-color: #8e2157;
            color: #fff;
            padding: 10px;
            border: rgba(0, 0, 0, 0.1);
            border-radius: 2rem;
            cursor: pointer;
            width: 30%;
            font-size: 15px;
            margin: 0 auto;
            /* Center horizontally */
            display: block;
            /* Ensure it takes up the full width */
            transition: background-color 0.3s ease;
            align-items: center;
            /* This only works for flex containers */
            text-align: center;
            /* Center the text within the button */
        }

        .submit-button1:hover 
        {
            background-color: #731544;
        }

        .nav__logo img 
        {
            height: 50px;
            width: 150px;
            margin-right: 10px;
        }

        h1 
        {
            text-align: center;
            color: #36373a;
        }

        h2 
        {
            font-weight: 500;
        }

        /* ---------------Payment-success box-------------- */
        /* Popup box styles */
        .popup 
        {
            display: none;
            position: fixed;
            height: 450px;
            width: 450px;
            border-radius: 30px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            z-index: 9999;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .wrapper 
        {
            height: 35vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff
        }

        .checkmark__circle 
        {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: white;
            fill: green;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark 
        {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check 
        {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke 
        {
            100% 
            {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale 
        {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill 
        {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142
            }
        }

        .para 
        {
            text-align: center;
            font-size: xx-large;
        }

        .btn-ok 
        {
            position: relative;
            top: 12%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Overlay styles */
        .overlay 
        {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }
        .fare
        {
            text-align: left;
            font-weight: 500;
            font-family: none;
        }
    </style>
</head>
<body>
    <header>
        <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
        <ul class="nav__links">
            <li class="link"><a href="homepagewl.php">HOME</a></li>
            <li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
            <li class="link"><a href="About">ABOUT</a></li>
            <li class="link"><a href="feedback.php">FEEDBACK</a></li>
        </ul>
        <a class="user-log"><i class="fa fa-user" style="font-size:24px"></i> <?php echo "$username" ; ?></a>
        <a href="logout.php"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></button></a>
    </header>
    <br><br><br><br><br>
    <h1 class="text">PAYMENT</h1>
    <section class="payment">
        <div class="container">
            <div id="overlay" class="overlay" onclick="hideoverlay()"></div>
            <div class="nav-tabs">
                <div class="nav-tab active" onclick="showPaymentForm('debit')">Credit/Debit Card Payment</div>
                <div class="nav-tab" onclick="showPaymentForm('upi')">UPI Payment</div>
            </div>

            <div id="debitPaymentForm" class="payment-form">
                <h1 class="fare">Total Fare :<strong style="color: var(--primary-color-dark);"> INR <?php echo $totalfair;?> </strong></h1><br>
                <h2>Credit/Debit Card Payment</h2>
                <form>
                    <div class="card_no">
                        <input type="text" name="card_number" placeholder="Card Number"
                            title="Card number must be 16 digits" pattern="[0-9]{16}" required>
                    </div>
                    <div class="month">
                        <select name="expiry_month" required>
                            <option value="" disabled selected>Expiry Month</option>
                            <option value="01">01 - January</option>
                            <option value="02">02 - February</option>
                            <option value="03">03 - March</option>
                            <option value="04">04 - April</option>
                            <option value="05">05 - May</option>
                            <option value="06">06 - June</option>
                            <option value="07">07 - July</option>
                            <option value="08">08 - August</option>
                            <option value="09">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                        </select>
                        <select name="expiry_year" required>
                            <option value="" disabled selected>Expiry Year</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                            <option value="2034">2034</option>
                            <option value="2035">2035</option>
                            <option value="2036">2036</option>
                            <option value="2037">2037</option>
                            <option value="2038">2038</option>
                            <option value="2039">2039</option>
                            <option value="2040">2040</option>
                            <option value="2041">2041</option>
                            <option value="2042">2042</option>
                            <option value="2043">2043</option>
                            <option value="2044">2044</option>
                            <option value="2045">2045</option>
                            <option value="2046">2046</option>
                            <option value="2047">2047</option>
                            <option value="2048">2048</option>
                            <option value="2049">2049</option>
                            <option value="2050">2050</option>
                        </select>
                        <div class="cvv">
                            <input type="password" name="cvv" placeholder="CVV" pattern="[0-9]{3,4}"
                                title="CVV must be 3 or 4 digits" required>
                        </div>
                    </div>
                    <div id="debitPopup" class="popup">
                        <div id="popup-content"></div>
                        <button class="btn btn-ok" onclick="hidePopup()">OK</button>
                    </div>
                    <div>
                        <button type="submit" class="submit-button submit-button1" >Pay with Card</button>
                    </div>
                </form>
            </div>
            <div id="popup" class="popup">
                <div id="popup-content">
                    <p class='para'>Payment successful. <br> Thank you!</p><div class='wrapper'> <svg class='checkmark' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 52 52'> <circle class='checkmark__circle' cx='26' cy='26' r='25' fill='none'/> <path class='checkmark__check' fill='none' d='M14.1 27.2l7.1 7.2 16.7-16.8'/></svg></div>
                </div>
                <button class="btn btn-ok" onclick="hidePopup()">OK</button>
            </div>
            <div id="upiPaymentForm" class="payment-form" style="display: none;">
                <h1 class="fare">Total Fare :<strong style="color: var(--primary-color-dark);"> INR <?php echo $totalfair;?> </strong></h1><br>

                <h2>UPI Payment</h2>
                <form>
                    <div>
                        <input type="text" name="upi_id_first" placeholder="Enter UPI ID" pattern="[a-zA-Z0-9]+@(ybl|okaxis)$" title="Please enter a valid UPI ID in the format username@bank" minlength="6" maxlength="30" required>
                        <small>( Example: username@bank )</small>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="submit-button submit-button1">Pay with UPI</button>
                    </div>
                </form>
            </div>
            <!-- Popup box -->
            <div id="popup" class="popup">
                <div id="popup-content">
                    <p class='para'>Payment successful. <br> Thank you!</p><div class='wrapper'> <svg class='checkmark' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 52 52'> <circle class='checkmark__circle' cx='26' cy='26' r='25' fill='none'/> <path class='checkmark__check' fill='none' d='M14.1 27.2l7.1 7.2 16.7-16.8'/></svg></div>
                </div>
                <button class="btn btn-ok" onclick="hidePopup()">OK</button>
            </div>
        </div>
    </section>
    <br>
    <!-- <footer class="footer">
        <div class="section__container footer__bar1">
            <p>Copyright © 2024 Team GMADS. All rights reserved.</p>
            <div class="social">
                <span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
                <span><a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted"
                        target="_blank"><i class="ri-youtube-fill"></i></a></span>
                <div class="n_logo"><img src="assets/w.png"></div>
            </div>
        </div>
    </footer> -->
    <script>
        var flagVariable = 0;
        function showPaymentForm(type) 
        {
            if (type === 'debit') 
            {
                document.getElementById('debitPaymentForm').style.display = 'block';
                document.getElementById('upiPaymentForm').style.display = 'none';
                document.querySelector('.nav-tab.active').classList.remove('active');
                document.querySelector('.nav-tab:nth-child(1)').classList.add('active');
            } 
            else if (type === 'upi') 
            {
                document.getElementById('debitPaymentForm').style.display = 'none';
                document.getElementById('upiPaymentForm').style.display = 'block';
                document.querySelector('.nav-tab.active').classList.remove('active');
                document.querySelector('.nav-tab:nth-child(2)').classList.add('active');
            }
        }

        function validateCardPaymentForm(event) 
        {
            event.preventDefault();
            var cardNumber = document.getElementsByName("card_number")[0];
            var expiryMonth = document.getElementsByName("expiry_month")[0];
            var expiryYear = document.getElementsByName("expiry_year")[0];
            var cvv = document.getElementsByName("cvv")[0];

            if (cardNumber.checkValidity() && expiryMonth.checkValidity() && expiryYear.checkValidity() && cvv.checkValidity()) 
            { 
                flagVariable=1;
                showPopup();
            } 
            else 
            {
                alert("Please fill out all required fields correctly for credit/debit card payment.");
            }
        }

        function validateUpiPaymentForm(event) 
        {
            event.preventDefault();
            var upiId = document.getElementsByName("upi_id_first")[0];

            if (upiId.checkValidity()) 
            {
                flagVariable=2;
                showPopup();
            } 
            else 
            {  
                alert("Please enter a valid UPI ID for UPI payment.");
            }
        }

        document.getElementById("debitPaymentForm").addEventListener("submit", validateCardPaymentForm);
        document.getElementById("upiPaymentForm").addEventListener("submit", validateUpiPaymentForm);

        function showPopup() 
        {
            var popup = document.getElementById("popup");
            var overlay = document.getElementById("overlay");
            var popupContent = document.getElementById("popup-content");
            overlay.style.display = "block";
            popup.style.display = "block";
            popupContent.style.display='block';
        }

    
        function hidePopup() 
        {
            var popup = document.getElementById("popup");
            var overlay = document.getElementById("overlay");
            popup.style.display = "none";
            overlay.style.display = "none";
            var flagValue = flagVariable; // Accessing the global flag variable
    
    // Construct the URL with the flag variable as a query parameter
            var url = "eticket.php?flag=" + encodeURIComponent(flagValue);
            
            // Redirect to the eticket.php with the flag variable in the URL
            window.location.href = url;
            // window.location.href = "eticket.php";
        }

        function hideoverlay()
        {
            var overlay = document.getElementById("overlay");
            overlay.style.display = "none";
        }
    </script>
</body>
</html>