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
                    <form action = "includes/action/reserve.php" method="POST"> <!-- Enter form action here, PHP file directory -->
                        <div class = "inputBox">
                            <p>Last name<span class = "required">*</span></p>
                            <input type = "text" name = "lastname" required> <!-- Text field for last name -->
                        </div>
                        <div class = "inputBox">
                            <p>First name<span class = "required">*</span></p>
                            <input type = "text" name = "firstname" required> <!-- Text field first name -->
                        </div>
                        <div class = "inputBox">
                            <p>Contact number (+63)<span class = "required">*</span></p>
                            <input type = "number" name = "contactno" required> <!-- Text field for contact number -->
                        </div>
                        <div class = "inputBox" id = "numContain">
                            <div class = "numInput">
                                <p>Number of adults</p>
                                <input type = "number" name = "noofadults" min = "1" max = "4" value = "1"> <!-- Field for no of adults -->
                            </div>
                            <div class = "numInput">
                                <p>Number of children</p>
                                <input type = "number" name = "noofkids" min = "0" max = "4"> <!-- Field for no of kids -->
                            </div>
                        </div>
                        <div class = "inputBox" id = "numContain">
                            <div class = "dateInput">
                                <p>Check-in date<span class = "required">*</span></p>
                                <input type = "date" name="check_in" required>
                            </div>
                            <div class = "dateInput">
                                <p>Check-out date<span class = "required">*</span></p>
                                <input type = "date" name="check_out" required>
                            </div>
                        </div>
                        <!-- Expandable list for room type -->
                        <div class = "inputBox">
                            <p>Select room type</p>
                            <select id="room-select">
                                <option selected disabled>Select...</option>
                                <option value = "standard">Standard</option>
                                <option value = "deluxe">Deluxe</option>
                                <option value = "joint">Joint</option>
                                <option value = "suite">Suite</option>
                                <option value = "apartment">Apartment style</option>
                            </select>
                            <p>Choose a room</p>
                            <div class = "roomList">
                                <table id="rooms">
                                    <!-- Table data to be filled during AJAX. -->
                                </table>
                            </div>
                        </div>
                        <div class = "inputBox">
                            <p>Select payment type</p>
                            <div class = "radioContain">
                                <label>
                                    <input type = "radio" name = "paymenttype" value = "onsite" required checked />Pay onsite
                                    <span class = "customRadio"></span>
                                </label>
                                <label>
                                    <input type = "radio" name = "paymenttype" value = "online" required />Pay online
                                    <span class = "customRadio"></span>
                                </label>
                            </div>
                        </div>
                        <div class = "inputBox"> <!-- Button for submit and cancel -->
                            <div class = "buttonBox">
                                <input type = "submit" name="reserve" value="Confirm" />
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

        <script src="scripts/jquery.js"></script>
        <script>
            $(document).ready(() => {
                $('#room-select').on('change', function (e) {
                    var optionSelected = $("option:selected", this);
                    var roomSelect = optionSelected.val();
                    console.log(roomSelect);
                    $.ajax({
                        method: 'POST',
                        url: 'includes/api/load-rooms.php',
                        data: {
                            roomSelect: roomSelect
                        },
                        dataType: 'text',
                        success: function (data) {
                            $('#rooms').html(data);
                        } 
                    });
                });
            })
        </script>
    </body>
</html>