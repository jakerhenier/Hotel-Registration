<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Reserve a room</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/reservation.css" />
    </head>
    <body>
        <div class = "banner" id = "reservationBanner">
            <div id = "darkOverlay"></div>
            <div class = "intro"> <!-- Main div -->
                <p>Save yourself some luxury for when you need it... right in the comforts of your own home.</p>
            </div>
            <div class = "container"> <!-- Main div -->
                <p>Room reservation</p>
                <div class = "formContain">
                    <form action = ""> <!-- Enter form action here, PHP file directory -->
                        <div class = "inputBox">
                            <p>Last name<span class = "required">*</span></p>
                            <input type = "text" name = "lastName" required> <!-- Text field for last name -->
                        </div>
                        <div class = "inputBox">
                            <p>First name<span class = "required">*</span></p>
                            <input type = "text" name = "firstName" required> <!-- Text field first name -->
                        </div>
                        <div class = "inputBox">
                            <p>Contact number (+63)<span class = "required">*</span></p>
                            <input type = "text" name = "contactNo" required> <!-- Text field for contact number -->
                        </div>
                        <div class = "inputBox" id = "numContain">
                            <div class = "numInput">
                                <p>Number of adults</p>
                                <input type = "number" name = "noOfAdults" min = "1" max = "4" value = "1"> <!-- Field for no of adults -->
                            </div>
                            <div class = "numInput">
                                <p>Number of children</p>
                                <input type = "number" name = "noOfKids" min = "0" max = "4"> <!-- Field for no of kids -->
                            </div>
                        </div>
                        <div class = "inputBox" id = "numContain">
                            <div class = "dateInput">
                                <p>Check-in date<span class = "required">*</span></p>
                                <input type = "date" required>
                            </div>
                            <div class = "dateInput">
                                <p>Check-out date<span class = "required">*</span></p>
                                <input type = "date" required>
                            </div>
                        </div>
                        <!-- Expandable list for room type -->
                        <div class = "inputBox">
                            <p>Select room type</p>
                            <select>
                                <option selected disabled>Select...</option>
                                <option value = "standard">Standard</option>
                                <option value = "deluxe">Deluxe</option>
                                <option value = "joint">Joint</option>
                                <option value = "suite">Suite</option>
                                <option value = "apartment">Apartment style</option>
                            </select>
                            <p>Choose a room</p>
                            <div class = "roomList">
                                <table>
                                    <!-- Enter PHP code here for available room based on selected room type -->
                                    <tr>
                                        <td>Room 0001</td>
                                        <td>₱2,045</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0004</td>
                                        <td>₱2,000</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0006</td>
                                        <td>₱3,050</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0007</td>
                                        <td>₱2,000</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0008</td>
                                        <td>₱2,500</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0011</td>
                                        <td>₱2,045</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0012</td>
                                        <td>₱2,005</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0015</td>
                                        <td>₱2,750</td>
                                    </tr>
                                    <tr>
                                        <td>Room 0019</td>
                                        <td>₱3,300</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class = "inputBox">
                            <p>Select payment type</p>
                            <div class = "radioContain">
                                <label>
                                    <input type = "radio" name = "payment" value = "onsite" checked />Pay onsite
                                    <span class = "customRadio"></span>
                                </label>
                                <label>
                                    <input type = "radio" name = "payment" value = "online" />Pay online
                                    <span class = "customRadio"></span>

                                    <!--
                                    <div id = "onlinePayment">
                                        <div id="paypal-button"></div>
                                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                                        <script>
                                        paypal.Button.render({
                                        // Configure environment
                                        env: 'sandbox',
                                        client: {
                                        sandbox: 'demo_sandbox_client_id',
                                        production: 'demo_production_client_id'
                                        },
                                        // Customize button (optional)
                                        locale: 'en_PH',
                                        style: {
                                        size: 'small',
                                        color: 'gold',
                                        shape: 'pill',
                                        },
                                        // Set up a payment
                                        payment: function (data, actions) {
                                        return actions.payment.create({
                                        transactions: [{
                                        amount: {
                                        total: '0.01',
                                        currency: 'PHP'
                                        }
                                        }]
                                        });
                                        },
                                        // Execute the payment
                                        onAuthorize: function (data, actions) {
                                        return actions.payment.execute()
                                        .then(function () {
                                        // Show a confirmation message to the buyer
                                        window.alert('Thank you for your purchase!');
                                        });
                                        }
                                        }, '#paypal-button');
                                        </script>
                                    </div> -->
                                </label>
                            </div>
                        </div>
                        <div class = "inputBox"> <!-- Button for submit and cancel -->
                            <div class = "buttonBox">
                                <button type = "submit">Confirm</button>
                            </div>
                            <div class = "buttonBox">
                                <a href = "index.php">
                                    <div id = "cancelButton">
                                        <p>Cancel</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--
        <script>
            var radios = document.form["paymentMethod"].element["onlinePay"];
            for (radio in radios) {
                radios[radio].onclick = function() {
                    document.getElementById("paypal-button").style.display = "block";
                }
            }
        </script> -->
    </body>
</html>