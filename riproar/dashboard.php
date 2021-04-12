<?php include_once 'header.php';
?>
<div class="dashboard"> <h1 class="dashboardTitle"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</h1><?php

if(isset($_SESSION['user'])) {
    $userInfo = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);

    //dashboard boxes
    $users = $crud->fetch_all_table_data('users');
    $sports = $crud->fetch_all_table_data('sport');
    $bookings = $crud->fetch_all_table_data('booking');
    
    $totalEarnings=0;
    foreach($bookings as $booking){$totalEarnings+=$booking['price'];}


    ?>
        <div class="dashboardContainer1">
            <div class="box box1">Total Users 
                <span class="totalNum"><?php echo count($users); ?></total> 
            </div>
            <div class="box box2">Total Sports 
                <span class="totalNum"><?php echo count($sports); ?></total> 
            </div>
            <div class="box box3">Total Bookings 
                <span class="totalNum"><?php echo count($bookings); ?></total> 
            </div>
            <div class="box box4">Total Earnings 
                <span class="totalNum">NPR. <?php echo $totalEarnings; ?></total>
            </div>

        </div>
        <div class="dashboardContainer2">
    <?php

    if($userInfo['role'] == 3) {
        if($msg != null) {
            echo $msg;
            $msg = null;
        }
        $activeUsers = $crud->fetch_datas_with_column('users', 'status', '1');
        ?>
        <div class="userStatusContainer">
        <!-- <div class="activeUsersContainer"> -->
        <h3>Registered users</h3><table><tr><th>Name</th><th>Change Status</tr>
        <?php

        foreach($activeUsers as $user){
           // echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3)
            echo  "<tr><td>".$user['name'] ." </td><td><a class='deactivate' href='dashboard.php?deactivate=1&user=".$user['user_id']."'>DEACTIVATE</a></td></tr>";

        };
        $deactiveUsers = $crud->fetch_datas_with_column('users', 'status', '0');
        ?>
        <!-- </div><div class="activeUsersContainer">
        <h3>Deactive users</h3> -->
        <?php
        foreach($deactiveUsers as $user){
          //  echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3) 
          {  echo "<tr><td>".$user['name']. " </td><td><a class='activate' href='dashboard.php?activate=1&user=".$user['user_id']."'>ACTIVATE</a></td></tr>"; }

        };

        ?></table></div>
        <div class="bookingDetails">
        <h3>All Booking Details</h3>
        <?php
        $bookingDetails = $crud->fetch_all_table_data('booking_detail');
        foreach($bookingDetails as $booking) {
            echo "<div class='detail'>".$booking['sport_name']. " by user ".$booking['name']." at date ".$booking['slot_date']. " and quantity ".$booking['quantity']."</div>";
        }
        ?></div><?php
    }
    else {
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
}

?>
    </div> <!--dashboard container 2-->
</div>

<?php include_once 'footer.php'; ?>