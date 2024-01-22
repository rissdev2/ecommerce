<section id="slider"><!--slider-->
    <!-- <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free E-Commerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                  <img src="images/home/pricing.png"  class="pricing" alt="" />
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>100% Responsive Design</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                  <img src="images/home/pricing.png"  class="pricing" alt="" />
                </div>
              </div>
              
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free Ecommerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                  <img src="images/home/pricing.png" class="pricing" alt="" />
                </div>
              </div>
              
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div> -->
  </section><!--/slider-->
<section>
<div class="container hero-sec">
  <div class="row">
    <div class="col-md-6">
      <h3>Gadget Galaxy</h3>
      <h1>From sleek gadgets to smart solutions</h1>
      <p>Our curated collection features high-quality products designed to enhance your lifestyle and make your tech dreams a reality.</p>
      <div class="hover-section"><a class="hbtn">S<span class="txt-type" data-wait="3000" data-words="[&quot;hop now!&quot;, &quot;hop now!&quot;, &quot; hop now!  &quot;]"></span></a></div>
      <!-- <div class="hero-btn">
        <a href="">Shop now!</a>
      </div> -->
    </div>
    <div class="col-md-6" style="padding-right:0px;">
      <img  src="./images/home/hero.png" class ="img-responsive" alt="">
    </div>
  </div>
</div>
</section>







  <section class="feat-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
            <?php include 'sidebar.php'; ?>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title">Features Items</h2>

            <?php

            $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
               <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                      <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                      <p><?php  echo    $result->PRODESC; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart">Add to cart</button>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                        <p><?php  echo    $result->PRODESC; ?></p>
                       <button type="submit" name="btnorder" class="btn btn-default add-to-cart">Add to cart</button>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li>
                              <?php     
                            if (isset($_SESSION['CUSID'])){  

                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                             }else{
                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                            }  
                            ?>

                    </li> 
                  </ul>
                </div>
              </div>
            </div>
          </form>
       <?php  } ?>
            
          </div><!--features_items--> 
          
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title">recommended items</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active"> 
                         <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3 ";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->PRODESC; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart">Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
                <div class="item">  
                  <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3,6";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->PRODESC; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart">Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->
          
        </div>
      </div>
    </div>
  </section>


  <section class="galaxy-sec">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h2>At Gadget Galaxy, We're Your Tech Partners</h2>
          <p>When it comes to electronics gadgets, we stand out as your ultimate destination. Here's why you should choose us for all your tech needs</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 text-center">
          <div class="servc-crd">
            <div class="justify-content-center">
              <img src="./images/home/quality.png" class="img-responsive" alt="">
            </div>
              <h3>Unmatched Quality</h3>
              <p>We handpick every product in our collection to ensure top-notch quality and cutting-edge technology. You deserve the best, and we deliver nothing less.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="servc-crd">
            <div class="justify-content-center">
              <img src="./images/home/customer.png" class="img-responsive" alt="">
            </div>
              <h3>Customer Care</h3>
              <p>Your satisfaction is our priority. Our dedicated support team is ready to assist you at every step, whether you need advice, assistance, or a solution to a tech challenge.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="servc-crd">
            <div class="justify-content-center">
              <img src="./images/home/secure.png" class="img-responsive" alt="">
            </div>
              <h3>Secure Shopping</h3>
              <p>Your online safety matters. We employ state-of-the-art security measures to protect your personal information and provide you with a worry-free shopping experience.</p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section>
    <div class="container testimonial-sec">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">Hear what our customers have to say</h2>
        <div id="craouselContainer" class="swiper-container">
        <div class="swiper-wrapper" id="slideHolder">
            <!-- Slides -->

        </div>
        <div class="swiper-pagination"></div>
        
    </div>
        </div>
      </div>
    </div>
  </section>



  