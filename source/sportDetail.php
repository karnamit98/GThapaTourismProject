<?php include_once 'header.php'; ?>


<?php 

    if(isset($_POST['btnProceedBooking'])) {
        //var_dump($_POST);
        //echo gettype($_POST['sport_detail_id']);

        $sport_detail_Id = $_POST['sport_detail_id'];
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

    <!--Booking Form--> 
    <div  class="bookingForm" >
            <h1>Reserve a slot and date </h1>
        <form action="sportDetail" method="GET" enctype="multipart/formdata">
            <!-- <span>&#128197;</span> -->
            <div class="formGroup">
                <i class="fas fa-calendar-alt"></i>
                <label for="bookingDate"> Pick a Date </label>
                <input type="date" name="bookingDate" min="<?php echo date('Y-m-d',strtotime('+1 day')) ; ?>" onkeydown="return false" max="<?php echo date('Y-m-d',strtotime('+14 day'));?>" />
            </div>

            <div class="formGroup">
            <i class="fas fa-layer-group"></i>
                <label for="slotQuantity"> Number of Slots </label>
                <select name="slotQuantity">
                    <option>1</option>
                    <option>1</option>
                    <option>1</option>
                </select>
            </div>

        </form>
    </div>

</div>

<?php } else { ?>

    <br><br>
    <h1 class="errorLoadingPage"><i class="fas fa-bug"></i>Error Loading Page!</h1>


<?php } include_once 'footer.php'; ?>