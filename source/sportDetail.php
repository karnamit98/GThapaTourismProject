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
        </div>

        <div  class="bookingForm" id="bookingForm">
                    <h1>Reserve a slot and date </h1>
                <form method="POST" name = form1 action='paymentConfirmation.php' enctype="multipart/formdata">

                    <div class="formGroup">
                        <i class="fas fa-calendar-alt"></i>
                        <label for="bookingDate"> Pick a Date </label>
                        <input id="bookingDate"type="date" onchange="dateform(<?php echo $sport_detail_Id;?>)" name="bookingDate" min="<?php echo date('Y-m-d',strtotime('+1 day')) ; ?>" onkeydown="return false" max="<?php echo date('Y-m-d',strtotime('+14 day'));?>" required/>
                        <!-- <button  name="submit_date" >Submit</button> -->
                    </div>

                    <div class="formGroup sheduleSelect displayNone" id="sheduleSelect">
                    <i class="far fa-clock"></i>
                        <label for="slotSchedule">Select Your Schedules/Slots</label>
                        <div id="sportBookingForm" class="sheduleSelection"> </div>
                    </div>


                    <button type="submit" name="bookingConfirmation" class=" displayNone btnSheduleSubmit" id="btnSheduleSubmit">Proceed to Payment</button>

                </form>
            </div>



        <?php
        // if(isset($_POST["submit_date"])) {
            ?>
            <!--Booking Form--> 

        </div>
            <?php
        }

    // }        ?>


<script type="text/javascript">

function dateform(sport_detail_id) {
    // var bookingForm = document.getElementById('bookingForm');
    var bookingDate = document.getElementById('bookingDate');
    var sheduleSelect = document.getElementById('sheduleSelect');
    var btnSheduleSubmit = document.getElementById('btnSheduleSubmit');
    var current_date = new Date();
    var selected_date = new Date(bookingDate.value);

    if(current_date < selected_date){
        sheduleSelect.classList.remove('displayNone');
        btnSheduleSubmit.classList.remove('displayNone');
        // bookingForm.classList.remove("displayNone");
        showSchedule(bookingDate.value, sport_detail_id);

       // window.scroll(0, 400);
    }


    console.log(bookingDate.value);
    console.log("hlw");
}

function chkcontrol(j, max) {
    console.log(document.form1.ckb[j].value);
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

function showSchedule(date, id) {
  var xhttp;  

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sportBookingForm").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getSchedule.php?date=" + date + "&id=" + id, true);
  xhttp.send();
}

function showNumberOFPeople(id, start_time, date) {
    var xhttp;  

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("sportBookingForm").innerHTML = this.responseText;
    }
    };
    xhttp.open("GET", "getSchedule.php?date=" + date + "&id=" + id, true);
    xhttp.send();
}
</script>

<?php include_once 'footer.php'; ?>