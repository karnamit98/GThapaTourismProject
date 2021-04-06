<?php include_once 'header.php'; ?>


<?php 
    
    if(isset($_POST['btnProceedBooking'])) {

        $_SESSION["sport_detail_id"] = $_POST['sport_detail_id'];


    }

    if(isset($_SESSION["sport_detail_id"])) {
    //var_dump($_POST);
            //echo gettype($_POST['sport_detail_id']);
            /**
             * fetch data from sport_view instead of tables later!
             */



            $sport_detail_Id = $_SESSION["sport_detail_id"];
            $sport_detail = $crud->fetch_data_with_id('sport_view', 'sport_detail_id', $sport_detail_Id);


            $sport_details =$crud->fetch_data_with_id('sport_detail', 'sport_detail_id', $sport_detail_Id) ; 
            $sport = $crud->fetch_data_with_id('sport','sport_id',$sport_details['sport_id']);
            $location =  $crud->fetch_data_with_id('location', 'location_id', $sport_details['location_id']) ; ?>

    <!-- <section class="bgProductDisplay" ></section> -->
    <h1 class="titleMain"> <?php echo strtoupper($sport_details['name']); ?> </h1>
    <div class="sportDetailPageContainer" style="background: white !important;">
        <div class="header">
        <div class="imageGallery">
        <!-- <h1 class="titleMain"> <?php echo strtoupper($sport_details['name']); ?> </h1> -->
            <div class="carousel carousel-main " data-flickity>
            
            <?php 
            ?>
                <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail1'] ?>');background-position:center;background-size: cover" ></div>
                <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail2'] ?>');background-position:center;background-size: cover" ></div>
                <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail3'] ?>');background-position:center;background-size: cover" ></div>
            </div>

            <div class="carousel carousel-nav"
            data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                <div class="carousel-cell" style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail1'] ?>');background-position:center;background-size: cover" ></div>
                <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail2'] ?>');background-position:center;background-size: cover" ></div>
                <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail3'] ?>');background-position:center;background-size: cover" ></div>
            </div>
        </div>

        <div class="productInfoSection">
            <div class="productInfo">
                <h1 class="title"> About <?php echo strtoupper($sport_details['name']); ?>, <?php echo strtoupper($location['location']); ?> </h1>

                <span class="description"> <?php echo $sport_details['description']; ?></span>

                <hr />
                <div class="productInfoGrid">
                    <span class="time"><i class="fas fa-tree"></i>  Available Seasons: <b> <?php echo $sport['available_season']; ?></b></span>
                    <span class="time"><i class="fas fa-bell"></i>  Opens from <b><?php echo $sport['opening_time']; ?> till <?php echo $sport['closing_time']; ?></b></span>
                    <span class="time"><i class="fas fa-layer-group"></i>  Total Slots Available: <b><?php echo $sport['total_slots']; ?></b></span>
                    <span class="time"><i class="fas fa-clock"></i>  Slot Duration: <b><?php echo $sport['slot_duration']; ?> minutes</b></span>
                    <span class="time"><i class="fas fa-warehouse"></i>  Maximum Capacity: <b><?php echo $sport['max_slot_capacity']; ?> persons per slot</b></span>

                </div>



                <hr />

                <span class="price"><i class="fas fa-tag"></i>  <b>NPR. <?php echo $sport['price']; ?></b></span>
            
            </div>

            
        </div>
        </div><!--Header--> 
        <form   onsubmit="event.preventDefault();" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" enctype="multipart/formdata">
            <div class="formGroup">
                <i class="fas fa-calendar-alt"></i>
                <label for="bookingDate"> Pick a Date </label>
                <input id="bookingDate"type="date" name="bookingDate" min="<?php echo date('Y-m-d',strtotime('+1 day')) ; ?>" onkeydown="return false" max="<?php echo date('Y-m-d',strtotime('+14 day'));?>" required/>
                <button  name="submit_date" onclick="dateform()">Submit</button>
            </div>

        </form>

        <?php
        // if(isset($_POST["submit_date"])) {
            ?>
            <!--Booking Form--> 
            <div  class="bookingForm displayNone" id="bookingForm">
                    <h1>Reserve a slot and date </h1>
                <form name = form1 action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET" enctype="multipart/formdata">
                    <!-- <span>&#128197;</span> -->
                    <div class="formGroup">
                        <i class="fas fa-calendar-alt"></i>
                        <label for="bookingDate"> Pick a Date </label>
                        <input type="date" name="bookingDate" min="<?php echo date('Y-m-d',strtotime('+1 day')) ; ?>" onkeydown="return false" max="<?php echo date('Y-m-d',strtotime('+14 day'));?>" />
                    </div>

                    <div class="formGroup">
                    <i class="fas fa-layer-group"></i>
                        <label for="slotSchedule">Select Your Schedule</label>

                            <?php
                            $total_schedule = $sport_detail['total_slots'];
                            $starting_time = new DateTime($sport_detail['opening_time']);
                            $closing_time = new DateTime($sport_detail['closing_time']);
                            $duration = $sport_detail['slot_duration'];
                            $max = 3;

                            for($i = 0; $i < $total_schedule; $i++) {

                                ?>
                            
                            <input type="checkbox" name=ckb onclick='chkcontrol(<?php echo $i;?>, <?php echo $max; ?>)'style="padding:5px 10px;"/><?php echo $starting_time->format('h:i') . ' - '. $starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i'); ?><br>
                                <?php
                                if($starting_time->format('h:i') == $closing_time->format('h:i')) break;
                            }
                            ?>

                    </div>
                    <button type="submit" name="booking_checkout">Submit</button>

                </form>
            </div>
        </div>
            <?php
        }

    // }        ?>


<script type="text/javascript">

function dateform() {
    var bookingForm = document.getElementById('bookingForm');
    var bookingDate = document.getElementById('bookingDate');
    var current_date = new Date();
    var selected_date = new Date(bookingDate.value);

    if(current_date < selected_date){

        bookingForm.classList.remove("displayNone");
    }


    console.log(bookingDate.value);
    console.log("hlw");
}

function chkcontrol(j, max) {
    console.log("hello");
    var total=0;
    for(var i=0; i < document.form1.ckb.length; i++){
        if(document.form1.ckb[i].checked){
            total =total +1;
        }
        if(total > max){
        alert("Please Select only three") 
            document.form1.ckb[j].checked = false ;
            return false;
        }
    }
} 
</script>

<?php include_once 'footer.php'; ?>