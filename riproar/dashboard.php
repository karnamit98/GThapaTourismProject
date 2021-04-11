<?php include_once 'header.php';

if(isset($_SESSION['user'])) {
    $userInfo = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);


    if($userInfo['role'] == 3) {
        if($msg != null) {
            echo $msg;
            $msg = null;
        }
        $activeUsers = $crud->fetch_datas_with_column('users', 'status', '1');
        ?>
        <h3>Active users</h3>
        <?php

        foreach($activeUsers as $user){
            echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3)
            echo "<a href='dashboard.php?deactivate=1&user=".$user['user_id']."'>deactivate</a><br>";

        };
        $deactiveUsers = $crud->fetch_datas_with_column('users', 'status', '0');
        ?>
        <h3>Deactive users</h3>
        <?php
        foreach($deactiveUsers as $user){
            echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3) 
            echo "<a href='dashboard.php?activate=1&user=".$user['user_id']."'>activate</a><br>";

        };

        ?>
        <h3>All Booking Details</h3>
        <?php
        $bookingDetails = $crud->fetch_all_table_data('booking_detail');
        foreach($bookingDetails as $booking) {
            echo $booking['sport_name']. " by user ".$booking['name']." at date ".$booking['slot_date']. " and quantity ".$booking['quantity']."</br>";
        }
    }
    else {
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
}

?>


<?php include_once 'footer.php'; ?>