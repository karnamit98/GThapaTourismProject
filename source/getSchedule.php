<?php include_once 'includes/crud.php';



$date = new DateTime($_GET['date']);
$id = $_GET['id'];


$datas = $crud->fetch_datas_with_column('booking_detail', 'sport_detail_id', $id);
$sport_detail = $crud->fetch_data_with_id('sport_view', 'sport_detail_id', $id);



$total_schedule = $sport_detail['total_slots'];
$starting_time = new DateTime($sport_detail['opening_time']);
$closing_time = new DateTime($sport_detail['closing_time']);
$duration = $sport_detail['slot_duration'];
$max = 3;





for($i = 0; $i < $total_schedule; $i++) {
    $is_booked = false;
    foreach($datas as $data) {
        $slot_start = new DateTime($data['start_time']);
        $slot_date = new DateTime($data['slot_date']);

        // echo $date->format('y-m-d'). " == ". $slot_date->format('y-m-d'). "<br>";

        if($slot_start->format('h:i') == $starting_time->format('h:i') && $date->format('y-m-d') == $slot_date->format('y-m-d')) $is_booked = true;

    }

    if(!$is_booked)
       echo "<input type='checkbox' name=ckb onclick='chkcontrol(".$i.", ".$max.")'style='padding:5px 10px;'/>".$starting_time->format('h:i')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i')."<br>";
    else 
    echo "<input type='checkbox' name=ckb onclick='chkcontrol(".$i.", ".$max.")'style='padding:20px 40px;color:red' disabled/>".$starting_time->format('h:i')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i')."<br>";

}


?>