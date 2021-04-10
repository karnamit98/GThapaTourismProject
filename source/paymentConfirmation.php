<?php include_once "header.php";
if(!isset($_SESSION['user'])) header('Location: login.php');

if(isset($_POST['bookingConfirmation'])) {
    $date = $_POST['bookingDate'];
    $checkedBox = $_POST['ckb'];
   // echo nl2br("<br><br><br> date : ".$date . "\n quantity:  ". 
  //  count($checkedBox). "\n sport_detail_id:  ".
   // $_SESSION["sport_detail_id"] . "\n user_id:  ". $_SESSION['user']);

    $user_details = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
   // echo nl2br("\nUsername: ".$user_details['name']);
   // echo nl2br("\nStart time and end time of all check boxes just add duration to get the end time");
    foreach($checkedBox as $checked) {
       //  echo "<br> start time : ".$checked;
    }

    $sport_details = $crud->fetch_data_with_id('sport_detail', 'sport_detail_id', $_SESSION['sport_detail_id']);
    $sport = $crud->fetch_data_with_id('sport','sport_id',$sport_details['sport_id']);
    
}
?>





    <!--Payment Confirmation--> 

    <section class="confirmationPage">

        

        <div class="confirmationDetails">
        <h1><i class="fas fa-handshake"></i> Thank You for Booking!</h1>
            <div class="detailsInner">

                <div class="middleContainer">
                    <div class="middleContainerChild1">
                        <h2><b>Date booked for: <span class="colorRed"><?php echo $date; ?></span></b></h2>
                        <h2>Booked by <?php echo $user_details['name']; ?> for <span style="color:#206a5d"><?php echo $sport_details['name']; ?></span></h2>
                    </div>
                    <div class="middleContainerChild2">
                <h2>Number Of Slots: <b><?php echo count($checkedBox); ?></b> </h2>
               <?php foreach($checkedBox as $checked) {
                   $startTime = strtotime($checked);
                   $durationSeconds = $sport['slot_duration'] * 60;
                //    $endTime = date("H:i", time() + $durationSeconds ) ;
                $endTime = date("H:i", $startTime + $durationSeconds ) ;
                        echo "<span>( ".$checked." - ".$endTime ." )</span> ";
                    } ?>
                <?php if(isset($_POST['number_of_people'])) { ?><h2>Number Of People: <b><?php echo $_POST['number_of_people']; ?></b> </h2> <?php } ?>  
                    </div>

                </div>

                <div class="bottomContainer">
                    <div class="priceContainer">
                        <div class="left"></div>
                        <div class="right">
                            <div class="label">Total: &nbsp;</div>
                            <div class="price"><b><?php $price=($sport['price'] * count($checkedBox)); echo " NPR.".$price; ?></b></div>
                        </div>
                    </div>
                        <?php $_SESSION['totalPrice'] = $price; ?>
                    <form class="paypalContainer" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">

                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="upload" value="1">
                        <input type="hidden" name="business" value="riproar12@gmail.com">
                        <input type="hidden" name="return" value="http://localhost/GTTourismProject/GThapaTourismProject/source/payment.php?payment=<?php echo $_SESSION['totalPrice']; ?>">
                        <input type="hidden" name="cancel_return" value="http://localhost/GTTourismProject/GThapaTourismProject/source/paymentConfirmation.php">

                        <!-- <input type="hidden" name="bookingDate" value="<?php echo $date; ?>"> -->
                        <input type="hidden" name="item_name_1" value="<?php echo $sport_details['name']; ?>">
                        <?php
                        if(isset($_POST['number_of_people'])) {
                            ?>
                                <input type="hidden" name="quantity_1" value="<?php echo  $_POST['number_of_people']; ?>">
                            <?php
                        }?>

                        <input type="hidden" name="amount_1" value="<?php echo $_SESSION['totalPrice']/119; ?>">

                        <button name="checkout" type="paypal" value="PayPal" ><i class="fab fa-paypal"></i> Pay with Paypal</button>
                    </form>
                </div>


</div>
        </div>
                

        
    </section>

<!--div class="paymentContainer">
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
</div-->

    <?php include_once "footer.php"; ?>