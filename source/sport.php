<?php include_once 'header.php'; ?>
    <br><br>
    <div class="pop-up-wrapper " id="pop-up">
        <div class="go-back" onclick="closeModal();"><i class="fa fa-arrow-left"></i>
        </div>
        <div class="product-details">
          <div class="product-left">
            <div class="product-info">
              <div class="product-manufacturer" id="p-title">NOOK
              </div>
              <div class="product-title" >
                [LOUNGE CHAIR]
              </div>
              <div class="product-price" id="p-price">
                $320<span class="product-price-cents">03</span>
              </div>
            </div>
            <div class="product-image">
              <img src="https://via.placeholder.com/300" id="p-img"/>
            </div>
          </div>
          <div class="product-right">
            <div class="product-description">
              Designer Karim Rashid continues to put his signature spin on all genres of design through various collaborations with top-notch companies. Another one to add to the win column is his work with Italian manufacturer Chateau d’Ax.
            </div>
            <div class="product-available">
              In stock. <span class="product-extended"><a href="#">Buy Extended Warranty</a></span>
            </div>
            <div class="product-rating">
              <i class="fa fa-star rating" star-data="1"></i>
              <i class="fa fa-star rating" star-data="2"></i>
              <i class="fa fa-star rating" star-data="3"></i>
              <i class="fa fa-star" star-data="4"></i>
              <i class="fa fa-star" star-data="5"></i>
              <div class="product-rating-details">(3.1 - <span class="rating-count">1203</span> reviews)
              </div>

            </div>
            <div class="product-quantity">
              <label for="product-quantity-input" class="product-quantity-label">Quantity</label>
              <div class="product-quantity-subtract">
                <i class="fa fa-chevron-left"></i>
              </div>
              <div>
                <input type="text" id="product-quantity-input" placeholder="0" value="0" />
              </div>
              <div class="product-quantity-add">
                <i class="fa fa-chevron-right"></i>
              </div>
            </div>
          </div>
          <div class="product-bottom">
            <div class="product-checkout">
              Total Price
              <div class="product-checkout-total">
                <i class="fa fa-usd"></i>
                <div class="product-checkout-total-amount">
                  0.00
                </div>
              </div>
            </div>
            <div class="product-checkout-actions">
              <a class="add-to-cart" href="#" onclick="AddToCart(event);">Add to Cart</a>
              
            </div>
          </div>
        </div>
      </div>
    <div class="sportDisplay">

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
                            <button type="button" onclick="openModal(<?php echo "'".$sport['name'] ."' , '". $sport['price']."' , '". $sport['thumbnail1']."'"; ?>);">Book Now</button>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

    </div>

<script>
    function openModal(p_name, p_price, p_img) {
        var modal = document.getElementById('pop-up');
        var title = document.getElementById('p-title');
        var img = document.getElementById('p-img');
        var price = document.getElementById('p-price');
        modal.classList.add("active");
        console.log(p_name + " " + p_price + " " + p_img);
        title.innerHTML = p_name;
        price.innerHTML = "NPR " + p_price;
        img.src = "dbImages/sports/" + p_img;
    }

    function closeModal() {
        var modal = document.getElementById('pop-up');
        modal.classList.remove("active");
    }
</script>

   


<?php include_once 'footer.php'; ?>