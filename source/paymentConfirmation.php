<?php include_once "header.php";
if(!isset($_SESSION['user'])) header('Location: login.php');

if(isset($_POST['bookingConfirmation'])) {
    $date = $_POST['bookingDate'];
    $checkedBox = $_POST['ckb'];
    echo nl2br(" date : ".$date . "\n quantity:  ". 
    count($checkedBox). "\n sport_detail_id:  ".
    $_SESSION["sport_detail_id"] . "\n user_id:  ". $_SESSION['user']);

    $user_details = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
    echo nl2br("\nUsername: ".$user_details['name']);
    echo nl2br("\nStart time and end time of all check boxes just add duration to get the end time");
    foreach($checkedBox as $checked) {
         echo "<br> start time : ".$checked;
    }


}
?>
<div class="paymentContainer">
    <div class="receipt">
    <h1 style="color:#669b7c">Your Payment was successful</h1>
    <div class="payments m-20">
        <table>
            <tr>
                <td><p><b>Sport</b></p></td>
                <td><p><b>Location</b></p></td>
                <td><p><b>Schedule</b></p></td>
                <td><p><b>Price</b></p></td>
            </tr>
            <tr>
            <td><p>Wall Climbing</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p>Bungee Jumping</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="background-color: black;font-weight:600;text-align:center;color: white"><p>Total Amount:</p></td>
            <td></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="font-weight:600;text-align:center"><p>$50</p></td>
            <td></td>
            </tr>
        </table>
        <a class="pay">
            <div style="background:#537791">
            <p><i class="fas fa-print" style="fontsize:2rem"></i> &nbsp; &nbsp; Print Reciept</p>
            </div>
        </a>
    </div>
    </div>
</div>

    <?php include_once "footer.php"; ?>