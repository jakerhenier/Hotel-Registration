<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Room Management</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/roomManage.css" />
    </head>
    <body>
        <div class = "top">
            <div class = "hamburgerBox">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <span>Room management</span>
            <div class = "userOptions">
                <span>Welcome, user.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>
        <div class = "underlay">
        </div>
        <div class = "tableContain">
            <div class = "toggles"> <!-- Dropdown for showing specific room type -->
                <span>Show room type</span>
                <select>
                    <option value = "standard">Standard</option>
                    <option value = "deluxe">Deluxe</option>
                    <option value = "joint">Joint</option>
                    <option value = "suite">Suite</option>
                    <option value = "apartment">Apartment style</option>
                </select>
            </div>
            <table>
                <tr>
                    <th>Room number</th>
                    <th>State</th>
                </tr>
                <!-- Use as basis for outputing data -->
                <tr>
                    <td>0001</td>
                    <td>Reserved</td>
                </tr>
                <tr>
                    <td>0002</td>
                    <td>Available</td>
                </tr>
                <tr>
                    <td>0003</td>
                    <td>Occupied</td>
                </tr>
            </table>
        </div>
    </body>
</html>