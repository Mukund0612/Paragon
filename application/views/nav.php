
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
    	<button id ="button" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/user/images/logo.png" title="Paragon Accessories Pvt. Ltd" alt="Paragon Accessories Pvt. Ltd" ></a>
	</div>
	<div class="top-search">
        <form action="<?php echo base_url('search'); ?>" method="POST">
            <input name="s" type="text" placeholder="Search for product..." >
            <input type="submit" class="btn" value=""/>
        </form>   
    </div>	   
	</div>
  <div class="navigation-main">
    <div class="container">
       <div class="collapse navbar-collapse js-navbar-collapse target mobile-menu" id="close">
            <a href="#" class="close-menu" onclick="hide('close')"><i class="fa fa-closet"></i></a>
                <ul class="nav navbar-nav">
                  <li class="dropdown mega-dropdown">
                        <a href="<?php echo base_url('brands'); ?>" class="dropdown-toggle" data-toggle="dropdown">Brands <span class="caret"></span></a><span class="caret"></span>				
                        <div class="dropdown-menu">
                            <ul>
                              <?php
                              $wh['status'] = '1';
                              $brand = $this->Paramodel->select_setord('brand','',$wh,'ASC');
                              foreach ( $brand as $brands ) 
                              {
                              ?>
                                <li>
                                    <a href="<?php echo base_url('brand').'/'.$brands->slug; ?>"><?php echo $brands->brand_name; ?></a>
                                        <ul>
                                          <?php
                                          $model = $this->Paramodel->query("SELECT * FROM `models` WHERE `brand_id` = '".$brands->id."' AND `status` = 'Y' ORDER BY setord ASC");
                                          foreach ( $model as $models ) 
                                          {
                                          ?>
                                            <li><a href="<?php echo base_url('model_new').'/'.$models->slug; ?>"><i class="fa fa-caret-right"><?php echo $models->model_name; ?></i></a>
                                                <ul>
                                                  <?php
                                                  $access = $this->Paramodel->query("SELECT `access-model`.a_id, access.a_name, access.slug FROM `access-model` LEFT JOIN access ON access.id = `access-model`.a_id WHERE `access-model`.m_id = '".$models->id."' AND access.brand_id = '".$brands->id."' AND access.status = 'Y' ORDER BY setord ASC");  
                                                  foreach ($access as $acc ) 
                                                  {
                                                  ?>
                                                    <li><a href="<?php echo base_url('product').'/'.$acc->slug; ?>"><i class="fa fa-caret-right"><?php echo $acc->a_name; ?></i></a>
                                                        </li>
                                                  <?php } ?>
                                                    </ul>
                                                </li>
                                          <?php } ?>
                                        </ul>
                                </li>
                              <?php } ?>
                            </ul>				
                        </div>
                    </li>            
                    <li><a href="<?php echo base_url('about-us'); ?>">About us</a></li>
                    <?php /* ?><li class="dropdown mega-dropdown">
                        <a href="<?php echo base_url() ?>products/" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a><span class="caret"></span>				
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="container">
                            <ul>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Scooter Accessories</li>                            
                                    </ul>
                                </li>
                                 <li class="col-sm-3">
                                    <ul>    
                                        <?php
                                           $qry_scooter_nav = "SELECT * FROM access WHERE a_type = '1' GROUP BY a_name ORDER BY setord ASC ";
                                            $res_scooter_nav = mysqli_query($db, $qry_scooter_nav);
                                            $i=1;
                                            while($row_scooter_nav = mysqli_fetch_assoc($res_scooter_nav)){
                                                
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url()."product/".$row_scooter_nav['slug']?>/"><i class="fa fa-angle-right"></i>
                                                     <?php echo  $row_scooter_nav['a_name'];?>
                                                    </a>
                                                </li>
                                             <?php 
                                                    if($i%4==0)
                                                    {
                                                        echo '</ul></li><li class="col-sm-3"><ul>';
                                                    }
                                                    $i++; 
                                                } ?>
                                    </ul>
                                 </li>            
                            </ul>
                            <div class="saprator"></div>
                            <ul>					
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Bike Accessories</li>
                                </ul>
                            </li>                    
                            <li class="col-sm-3">
                                          <ul>    
                                            <?php
                                               $qry_scooter_nav = "SELECT * FROM access WHERE a_type = '2' GROUP BY a_name ORDER BY setord ASC ";
                                                $res_scooter_nav = mysqli_query($db, $qry_scooter_nav);
                                                $i=1;
                                                while($row_scooter_nav = mysqli_fetch_assoc($res_scooter_nav)){
                                                    
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo base_url()?>product/<?php echo  $row_scooter_nav['slug']?>/"><i class="fa fa-angle-right"></i>
                                                            <?php echo  $row_scooter_nav['a_name'];?>
                                                        </a>
                                                    </li>
                                            <?php 
                                                if($i%6==0)
                                                    {
                                                        echo '</ul></li><li class="col-sm-3"><ul>';
                                                    }$i++; 
                                                } ?>
                                        </ul>
                                   </li>
                               </ul>				
                            </div>
                        </div>				
                    </li><?php */ ?>
                    <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                                    
                     <?php /*if(isset($_SESSION['cart']) && count($_SESSION['cart']['item_id'])>0){ ?>
                     <li><a href="<?php echo base_url() ?>cart/" id = menu_cart><i class="fa fa-shopping-cart"></i> Cart (<?php echo count($_SESSION['cart']['item_id']) ?>)</a></li>
                     <?php }*/ ?>
    
                     <?php // if(isset($_SESSION['paragone_user']) && $_SESSION['paragone_user']['id']!='') {?>
                     <!--<li><a href="<?php //echo base_url() ?>profile/">Profile</a></li>
                     <li><a href="<?php //echo base_url() ?>logout/">Logout</a></li>-->
    
                   <?php /*?> <?php } else{ ?>
                    <li><a href="<?php echo base_url() ?>register/">Register</a></li>
                    <li><a href="<?php echo base_url() ?>login/">Login</a></li><?php */?>
                    
                    
                    <?php// } ?>
                    
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact us</a></li>
                </ul>
                <?php if(isset($_SESSION['cart']['item_id']) && count($_SESSION['cart']['item_id']) > 0 ) { ?>
                  <div class="nav-cart"><a href="<?php echo base_url('cart'); ?>" id ="menu_cart"><i class="fa fa-shopping-cart"></i> Cart (<?php if(isset($_SESSION['cart']['item_id'])) { echo count($_SESSION['cart']['item_id']); } else { echo '0'; } ?>)</a></div>
                <?php } else { ?>
                    <div class="nav-cart" id="cart"><i class="fa fa-shopping-cart"></i> Cart (<?php if(isset($_SESSION['cart']['item_id'])) { echo count($_SESSION['cart']['item_id']); } else { echo '0'; } ?>)</div>
                <?php } ?>
                <ul class="nav navbar-nav account-menu">
                	<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a><span class="caret"></span>				
                        <div class="dropdown-menu">
                        <ul>
                           <?php if($this->session->userdata('user') && $this->session->userdata('user')['user_id'] != '' ) {?>
                           	<li><a href="<?php echo base_url('profile'); ?>">Profile</a></li>
                     		<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                           <?php }else{ ?> 
                            <li><a href="<?php echo base_url('registration'); ?>">Register</a></li>
                            <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                            <?php } ?>
                        </ul>
                        </div>
                    </li>
                </ul>
               
                
           </div>
    </div>
  </div>
<!-- /.nav-collapse -->
 </nav>
