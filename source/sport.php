<?php include_once 'header.php'; ?>


<?php  
    $sportId = $_GET['sportId'];
   // echo $sportId;
?>

<div class="productDisplayContainer">

    <div class="imageGallery">
        <div class="carousel carousel-main" data-flickity>
        
        <?php 
            $sport = $crud->fetch_data_with_id('sport','sport_id',$sportId);
            //Display thumbnail1 , 2, and 3
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
            <h1 class="title"> <?php echo strtoupper($sport['name']); ?> </h1>

            <span class="description"><?php echo $sport['description']; ?></span>

            <hr />
            <div class="productInfoGrid">
                <span class="time"><i class="fas fa-tree"></i>  Available Seasons: <b>All Seasons</b></span>
                <span class="time"><i class="fas fa-bell"></i>  Opens from <b>10am till 5pm</b></span>
                <span class="time"><i class="fas fa-layer-group"></i>  Total Slots Available: <b>40</b></span>
                <span class="time"><i class="fas fa-clock"></i>  Slot Duration: <b>15 minutes</b></span>
                <span class="time"><i class="fas fa-warehouse"></i>  Maximum Capacity: <b>6 persons per slot</b></span>

            </div>



            <hr />

            <span class="price"><i class="fas fa-tag"></i>  <b>NPR. <?php echo $sport['price']; ?></b></span>
           
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            
            <h2> BOOK SPORT </h2>

            <div class="form-group">
                <label for="location" >Select Location:</label>
                <select name="location" >
                    <option value="">location 1</option>
                    <option value="">location 1</option>
                    <option value="">location 1</option>
                </select>
            </div>

            <a href="#" >Proceed to Booking </a>

        </form>
    </div>

</div>


<?php include_once 'footer.php'; ?>