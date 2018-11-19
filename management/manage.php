<?php 
session_start();
require_once('../includes/config/db.php');

$userdata = '';

if (!isset($_SESSION['login_session'])) {
    header('location: index.php');
}
else {
    $userdata = $_SESSION['login_session'];
}
?>
<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Reservations</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "../css/reservationManage.css" />
        <link rel='stylesheet' href='css/nprogress.css'/>
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a href = "index.php">
                    <div>
                        Rooms
                    </div>
                </a>
                <a id = "active">
                    <div>
                        Reservations
                    </div>
                </a>
            </div>
            <div class = "userOptions">
                <span>Welcome, <?php echo $userdata[0]['firstname']."." ?></span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "../includes/action/logout.php">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class = "tableContain">
            <table id="room-reserved">
                <tr>
                    <th>Room number</th>
                    <th>Room type</th>
                    <th>Guest name</th>
                </tr>
            </table>
        </div>
        
        <script src="../scripts/jquery.js"></script>
        <script src='js/nprogress.js'></script>
        <script>
            function load() {
                NProgress.start();
                $.ajax({
                    method: 'POST',
                    url: '../includes/api/load-reserved.php',
                    success: function (data) {
                        NProgress.done();
                        $('#room-reserved').html(data);
                    }
                });
            }
            
            $(document).ready(function() {
                load();    
            })
        </script>
        <script>
            $(document).ready(function() {
                setInterval(() => {
                    NProgress.start();
                    $.ajax({
                        method: 'POST',
                        url: '../includes/api/load-reserved.php',
                        success: function (data) {
                            NProgress.done();
                            $('#room-reserved').html(data);
                        }
                    });
                }, 10000);
            })
        </script>
        <script>
            $(document).on('click', '#trigger', function(e) {
                var roomNo = this.value;
                $.ajax({
                    method: 'POST',
                    url: '../includes/action/occupy.php',
                    data: {
                        roomNo: roomNo
                    },
                    dataType: 'text',
                    success: function(data) {
                        load();
                    }
                })
            }) 
        </script>
    </body>
</html>