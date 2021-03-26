<?php include_once 'header.php'; ?>
    <br><br>
    <div class="sportDisplay">
        <!-- <div class="wrapper">
            <div class="product-img">
                <img src="http://bit.ly/2tMBBTd" height="420" width="327">
            </div>
            <div class="product-info">
                <div class="product-text">
                    <h1>Harvest Vase</h1>
                    <h2>by studio and friends</h2>
                    <p>Harvest Vases are a reinterpretation<br> of peeled fruits and vegetables as<br> functional objects. The surfaces<br> appear to be sliced and pulled aside,<br> allowing room for growth. </p>
                </div>
                <div class="product-price-btn">
                    <p><span>78</span>$</p>
                    <button type="button">buy now</button>
                </div>
            </div>
        </div> -->

        <?php 
            $sports = $crud->fetch_all_table_data('sport');

            foreach($sports as $sport) {
                ?>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="dbImages/sports/<?php echo $sport['thumbnail1'] ?>" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <img class="responsiveImage" src="dbImages/sports/<?php echo $sport['thumbnail1'] ?>" >
                            <h1><?php echo strtoupper($sport['name']); ?></h1>
                            <h2>Opens <?php echo strtoupper($sport['opening_season']); ?></h2>
                            <p><?php echo substr($sport['description'],0,200); ?>.... 
                                <a href="#" >Read More</a>    
                            </p>
                        </div>
                        <div class="product-price-btn">
                            <p><span>NRS. <?php echo strtoupper($sport['price']); ?></span></p>
                            <button type="button">Book Now</button>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

    </div>
   


<?php include_once 'footer.php'; ?>