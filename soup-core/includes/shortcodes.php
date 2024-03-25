<?php 
 
function soup_services_item_text($atts){
	extract(shortcode_atts(array(
	    'sit_title' =>'', 
	    'sit_text' =>'', 
	    'sit_bttl' =>'Get a quote', 
	    'sit_bturl' =>'#' 
	), $atts));
	ob_start(); ?>
	<section class="section section-double">
	    <div class="row no-gutters">
	        <div class="content">
	            <h2><?php echo esc_html($sit_title); ?></h2>
	            <p class="lead text-muted"><?php echo esc_html($sit_text); ?></p>
	            <a href="<?php echo esc_url($sit_bturl); ?>" class="btn btn-outline-primary btn-lg"><span><?php echo esc_html($sit_bttl); ?></span></a>
	        </div> 
	    </div>
	</section>
<?php return ob_get_clean();
}
add_shortcode('services_item_text','soup_services_item_text');
 
function soup_like_to_visit_us($atts){
	extract(shortcode_atts(array(
	    'tvu_bgimg' =>'',  
	    'tvu_ttl' =>'',  
	    'tvu_subttl' =>'',  
	    'tvu_lftttl' =>'Order Online',  
	    'tvu_lfturl' =>'#',  
	    'tvu_rftttl' =>'Book a table',  
	    'tvu_rfturl' =>'#' 
	), $atts));
        $visit_image = wp_get_attachment_image_src($tvu_bgimg,'visit-img');
        $visit_img = $visit_image[0]; 
	ob_start(); ?>
    <section class="section section-lg dark bg-dark"> 
        <div class="bg-image bg-parallax"><img src="<?php echo esc_url($visit_img); ?>" alt="Visit Us"></div> 
        <div class="container text-center">
            <div class="col-lg-8 push-lg-2">
                <h2 class="mb-3"><?php echo esc_html($tvu_ttl); ?></h2>
                <h5 class="text-muted"><?php echo esc_html($tvu_subttl); ?></h5> 
                <?php if($tvu_lfturl!=''): ?>
	                <a href="<?php echo esc_url($tvu_lfturl); ?>" class="btn btn-primary"><span><?php echo esc_html($tvu_lftttl); ?></span></a>
	            <?php endif; ?>
                <?php if($tvu_rfturl!=''): ?>
                	<a href="<?php echo esc_url($tvu_rfturl); ?>" class="btn btn-outline-primary"><span><?php echo esc_html($tvu_rftttl); ?></span></a>
	            <?php endif; ?>
            </div>
        </div> 
    </section>
<?php return ob_get_clean();
}
add_shortcode('like_to_visit_us','soup_like_to_visit_us');
 
function soup_gallery_slider($atts){
	extract(shortcode_atts(array(
	    'glr_sldr_img' =>''  
	), $atts)); 
	$gallery_slider = explode(",",$glr_sldr_img); 
	ob_start(); ?>
    <section id="gallery" class="section section-gallery cover"> 
        <div class="gallery-carousel inner-controls">
        	<?php 
        	foreach ($gallery_slider as $key => $value) {
		        $glr_image = wp_get_attachment_image_src($value,'visit-img');
		        $glr_img = $glr_image[0]; ?>
            	<div class="slide"><div class="bg-image bg-parallax"><img src="<?php echo esc_url($glr_img); ?>" alt="Gallery Slider"></div></div>
        	<?php } ?>  
        </div>

        <!-- Gallery Carousel Nav -->
        <div class="gallery-nav">
        	<?php 
        	foreach ($gallery_slider as $key => $value) {
		        $glr_image = wp_get_attachment_image_src($value,'visit-img');
		        $glr_img = $glr_image[0]; ?>
            	<img src="<?php echo esc_url($glr_img); ?>" alt="Gallery Slider">
        	<?php } ?>  
        </div>
 
        <div class="set-fullscreen">
            <a href="#gallery"><i class="ti ti-fullscreen"></i></a>
        </div> 
    </section>
<?php return ob_get_clean();
}
add_shortcode('s_gallery_slider','soup_gallery_slider');
 

function soup_faq_page($atts){
	extract(shortcode_atts(array(
	    'faq_sub_secttl' =>''  
	), $atts));   
	ob_start(); ?>
    <section class="section soupanimation">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Side Navigation -->
                    <nav id="side-navigation" class="stick-to-content pt-4" data-local-scroll>
                        <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i><?php echo esc_html($faq_sub_secttl); ?></h5>
                        <ul class="nav nav-vertical">
			            <?php 
			              $soup_pbar_items = vc_param_group_parse_atts( $atts['faq_main']);  
			              //var_dump($soup_pbar_items);
			              $soup_pbar_num = count($soup_pbar_items); 
			              if($soup_pbar_num > 0){
			                  for($i=0; $i<$soup_pbar_num; $i++){
			                    $soup_pbar_mnu_ttl = (isset($soup_pbar_items[$i]['faq_menuttl'])) ? $soup_pbar_items[$i]['faq_menuttl'] : '';  
			                    $soup_pbar_sibitm = (isset($soup_pbar_items[$i]['faq_sub'])) ? $soup_pbar_items[$i]['faq_sub'] : '';  
			                    ?>   
	                            <li class="nav-item">
	                                <a href="#faq<?php echo esc_attr($i); ?>" class="nav-link"><?php echo esc_html($soup_pbar_mnu_ttl); ?></a>
	                                <ul>
						            <?php 
							            $soup_spbar_items = vc_param_group_parse_atts( $soup_pbar_sibitm);  
							            $soup_spbar_num = count($soup_spbar_items); 
							            if($soup_spbar_num > 0){
						                   for($k=0; $k<$soup_spbar_num; $k++){
						                     $soup_spbar_mnu_ttl = (isset($soup_spbar_items[$k]['faq_submnu_ttl'])) ? $soup_spbar_items[$k]['faq_submnu_ttl'] : '';  
						                     $soup_spbar_itm_prcntg = (isset($soup_spbar_items[$k]['pbar_skill_prcntg'])) ? $soup_spbar_items[$k]['pbar_skill_prcntg'] : '';  
						                     ?>  
	                                    	<li class="nav-item"><a href="#faq<?php echo esc_attr($i); ?>_<?php echo esc_attr($k); ?>" class="nav-link"><?php echo esc_html($soup_spbar_mnu_ttl); ?></a></li> 
							                  <?php 
							                }
							            }
						            ?>  
	                                </ul>
	                            </li>
			                    <?php 
			                  }
			              }
			            ?>   
                        </ul>
                    </nav>
                </div>
                <div class="col-md-8 push-md-1">
		            <?php 
		              $soup_pbar_items = vc_param_group_parse_atts( $atts['faq_main']);  
		              $soup_pbar_num = count($soup_pbar_items); 
		              if($soup_pbar_num > 0){
		                  for($i=0; $i<$soup_pbar_num; $i++){
		                    $soup_pbar_mnu_ttl = (isset($soup_pbar_items[$i]['faq_menuttl'])) ? $soup_pbar_items[$i]['faq_menuttl'] : '';       
					        $soup_spbar_icon = (isset($soup_pbar_items[$i]['faq_sec_ico'])) ? $soup_pbar_items[$i]['faq_sec_ico'] : '';    
			                $soup_pbar_sibitm = (isset($soup_pbar_items[$i]['faq_sub'])) ? $soup_pbar_items[$i]['faq_sub'] : '';   
		                    ?>   
		                    <div id="faq<?php echo esc_attr($i); ?>">
		                        <h3><i class="<?php echo $soup_spbar_icon; ?> mr-4 text-primary"></i><?php echo esc_html($soup_pbar_mnu_ttl); ?></h3>
		                        <hr>
					            <?php 
						            $soup_spbar_items = vc_param_group_parse_atts( $soup_pbar_sibitm);  
						            $soup_spbar_num = count($soup_spbar_items); 
						            if($soup_spbar_num > 0){
					                   for($k=0; $k<$soup_spbar_num; $k++){
					                     $soup_spbar_mnu_ttl = (isset($soup_spbar_items[$k]['faq_submnu_ttl'])) ? $soup_spbar_items[$k]['faq_submnu_ttl'] : '';   
					                     $soup_spbar_submnu_txt = (isset($soup_spbar_items[$k]['faq_sec_subtxt'])) ? $soup_spbar_items[$k]['faq_sec_subtxt'] : '';     
					                     ?>   
				                        <div id="faq<?php echo esc_attr($i); ?>_<?php echo esc_attr($k); ?>" class="pb-5">
				                            <h4><?php echo esc_html($soup_spbar_mnu_ttl); ?></h4>
				                            <?php echo $soup_spbar_submnu_txt; ?> 
				                        </div>
						                  <?php 
						                }
						            }
					            ?>  
		                    </div>
		                    <?php 
		                  }
		              }
		            ?>   
                </div>
            </div>
        </div>
    </section>
<?php return ob_get_clean();
}
add_shortcode('faq_page','soup_faq_page');
 

function soup_about_us_page($atts,$content=null){
	extract(shortcode_atts(array(
	    'abtus_sec_ttl' =>'', 
	    'abtus_sec_nmdg' =>'',  
	    'abtus_star_rat' =>'',  
	    'abtus_sec_abtus' =>'',  
	    'abtus_sec_btnlbl' =>'',  
	    'abtus_sec_btnlnk' =>'',  
	    'abtus_prof_img' =>'',  
	    'abtus_prof_sign' =>''  
	), $atts));   
    $abtus_image = wp_get_attachment_image_src($abtus_prof_img,'abtus-img');
    $abtus_sign_image = wp_get_attachment_image_src($abtus_prof_sign,'abtus-img');
    $abtus_img = $abtus_image[0]; 
    $abtus_sign_ima = $abtus_sign_image[0]; 
	ob_start(); ?>
    <section class="section section-bg-edge"> 
        <div class="image left bottom col-md-7">
            <div class="bg-image"><img src="<?php echo esc_url($abtus_img); ?>" alt="About"></div>
        </div>
    
        <div class="container">
            <div class="col-lg-5 push-lg-5 col-md-9 push-md-3">
                <div class="rate mb-5 rate-lg">
                	<?php 
					$star = 5;
					$rating = $abtus_star_rat;
					for ($i=1; $i <= $star; $i++) { ?> 
					    <i class="fa fa-star <?php echo ($rating>=$i) ? 'active' : ''; ?>"></i>
					<?php } ?>
				</div>
                <h2><?php echo $abtus_sec_ttl; ?></h2>
                <?php echo $content; ?>
                <h6><?php echo $abtus_sec_nmdg; ?></h6>
                <img src="<?php echo esc_url($abtus_sign_ima); ?>" alt="Sign" class="mb-5">
                <h4><?php echo $abtus_sec_abtus; ?></h4>
                <a href="<?php echo esc_url($abtus_sec_btnlnk); ?>" class="btn btn-outline-primary"><span><?php echo $abtus_sec_btnlbl; ?></span></a>
            </div>
        </div> 
    </section>
<?php return ob_get_clean();
}
add_shortcode('about_us_page','soup_about_us_page');
 

function soup_contact_info($atts,$content=null){
	extract(shortcode_atts(array(
	    'cinfo_logo' =>'',  
	    'cinfo_title' =>'',  
	    'cinfo_addres' =>'',  
	    'cinfo_social' =>'',  
	    'cinfo_scl_fb' =>'',  
	    'cinfo_scl_gp' =>'',  
	    'cinfo_scl_tw' =>'',  
	    'cinfo_scl_yt' =>'',  
	    'cinfo_scl_in' =>'',  
	), $atts));   
    $cinfo_image = wp_get_attachment_image_src($cinfo_logo,'abtus-img'); 
    $cinfo_img = $cinfo_image[0];  
	ob_start(); ?>
    <div class="align-items-center"> 
        <img src="<?php echo esc_url($cinfo_img); ?>" alt="Logo" class="mb-5" width="130">
        <h4 class="mb-0"><?php echo $cinfo_title; ?></h4>
        <span class="text-muted"><?php echo $cinfo_addres; ?></span>
        <hr class="hr-md">
        <?php 
            $soup_adrs_items = vc_param_group_parse_atts( $atts['cinfo_mailing']);  
            $soup_adrs_num = count($soup_adrs_items); 
            if($soup_adrs_num > 0){
            	echo '<div class="row">';
                for($k=0; $k<$soup_adrs_num; $k++){
                 $soup_adrs_mnu_ttl = (isset($soup_adrs_items[$k]['cinfo_ml_ttl'])) ? $soup_adrs_items[$k]['cinfo_ml_ttl'] : '';  
                 $soup_adrs_itm_prcntg = (isset($soup_adrs_items[$k]['cinfo_ml_txt'])) ? $soup_adrs_items[$k]['cinfo_ml_txt'] : '';  
                 ?>  
	            <div class="col-sm-6 mb-3 mb-sm-0">
	                <h6 class="mb-1 text-muted"><?php echo $soup_adrs_mnu_ttl; ?></h6>
	                <?php echo $soup_adrs_itm_prcntg; ?>
	            </div> 
                  <?php 
                }
                echo '</div><hr class="hr-md">';
            }
        ?>   
        <h6 class="mb-3 text-muted"><?php echo $cinfo_social; ?></h6>
		<?php if($cinfo_scl_fb): ?>
	        <a href="<?php echo esc_url($cinfo_scl_fb); ?>" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
	    <?php endif; ?>
        <?php if($cinfo_scl_gp): ?>
	        <a href="<?php echo esc_url($cinfo_scl_gp); ?>" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
	    <?php endif; ?>
        <?php if($cinfo_scl_tw): ?>
	        <a href="<?php echo esc_url($cinfo_scl_tw); ?>" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
	    <?php endif; ?>
        <?php if($cinfo_scl_yt): ?>
	        <a href="<?php echo esc_url($cinfo_scl_yt); ?>" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
	    <?php endif; ?>
        <?php if($cinfo_scl_in): ?>
	        <a href="<?php echo esc_url($cinfo_scl_in); ?>" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
	    <?php endif; ?> 
    </div>
<?php return ob_get_clean();
}
add_shortcode('contact_info','soup_contact_info');
 
function soup_contact_map($atts,$content=null){
	extract(shortcode_atts(array(
	    'abtus_sec_ttl' =>'', 
	    'abtus_sec_nmdg' =>''  
	), $atts));    
	ob_start(); ?>
    <div id="google-map" class="h-500 shadow"></div>
<?php return ob_get_clean();
}
add_shortcode('contact_map','soup_contact_map');
 
function soup_offers_page($atts,$content=null){
	extract(shortcode_atts(array(
	    'ofr_post_count' =>'-1'   
	), $atts));     
	ob_start(); ?> 
                <?php $offers_query = new WP_Query(array('post_type'=>'offers','posts_per_page'=> $ofr_post_count )); ?>
                <?php while($offers_query->have_posts()): $offers_query->the_post(); 
                $offers_subttl = get_post_meta(get_the_ID(),'_soup_ofrs_subttl',true); ?>
		            <div class="special-offer mb-5 animated" data-animation="fadeIn">
		                <?php the_post_thumbnail('',array('class'=>'special-offer-image')); ?> 
		                <div class="special-offer-content">
		                    <h2 class="mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                    <h5 class="text-muted mb-5"><?php echo $offers_subttl; ?></h5>
		                    <ul class="list-check text-lg mb-0">
								<?php 
								$entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true ); 
								foreach ( (array) $entries as $key => $entry ) {

									$title = $enable = '';

									if ( isset( $entry['fe_txt'] ) ) {
										$title = esc_html( $entry['fe_txt'] );
									}

									if ( isset( $entry['ft_enable'] ) ) {
										$enable = $entry['ft_enable'] ;
									}
									if($enable=='y'){
										echo '<li>';
									}else{
										echo '<li class="false">';
									}
									echo $title;
								?>  
								</li>
								<?php } ?> 
		                    </ul>
		                </div>
		            </div>
				<?php endwhile; wp_reset_postdata(); ?>  
<?php return ob_get_clean();
}
add_shortcode('offers_page','soup_offers_page');
 
function soup_list_navigation($atts,$content=null){
	extract(shortcode_atts(array(
	    'list_nvg' =>'',   
	), $atts));     
	global $post;
	ob_start(); ?>
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <!-- Menu Navigation -->
                        <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                            <ul class="nav nav-menu bg-dark dark">
					            <?php 
						            $soup_girdnvg_items = vc_param_group_parse_atts( $atts['list_nvg_cat']);  
						            $soup_girdnvg_num = count($soup_girdnvg_items); 
						            if($soup_girdnvg_num > 0){
					                   for($k=0; $k<$soup_girdnvg_num; $k++){
					                     $soup_girdnvg_mnu_ttl = (isset($soup_girdnvg_items[$k]['list_nvg_ttl'])) ? $soup_girdnvg_items[$k]['list_nvg_ttl'] : '';  
					                     $soup_menu_lnk = str_replace(" ","_",strtolower($soup_girdnvg_mnu_ttl));	     
					                     ?>   
	                            		<li><a href="#<?php echo $soup_menu_lnk; ?>"><?php echo esc_html($soup_girdnvg_mnu_ttl); ?></a></li> 
						                  <?php 
						                }
						            }
					            ?>  
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9"> 
			            <?php 
				            $soup_girdnvg_items = vc_param_group_parse_atts( $atts['list_nvg_cat']);  
				            $soup_girdnvg_num = count($soup_girdnvg_items); 
				            if($soup_girdnvg_num > 0){
			                   for($k=0; $k<$soup_girdnvg_num; $k++){
			                     $list_order = (isset($soup_girdnvg_items[$k]['list_order'])) ? $soup_girdnvg_items[$k]['list_order'] : 'desc';  
			                     $list_orderby = (isset($soup_girdnvg_items[$k]['list_orderby'])) ? $soup_girdnvg_items[$k]['list_orderby'] : 'id';  
			                     $soup_girdnvg_mnu_ttl = (isset($soup_girdnvg_items[$k]['list_nvg_ttl'])) ? $soup_girdnvg_items[$k]['list_nvg_ttl'] : '';  
			                     $soup_girdnvg_brnimg = (isset($soup_girdnvg_items[$k]['list_nvg_img'])) ? $soup_girdnvg_items[$k]['list_nvg_img'] : '';  
			                     $soup_girdnvg_ctslg = (isset($soup_girdnvg_items[$k]['list_nvg_catslug'])) ? $soup_girdnvg_items[$k]['list_nvg_catslug'] : '';  
			                     $soup_girdnvg_num_pro = (isset($soup_girdnvg_items[$k]['list_nvg_num_pro'])) ? $soup_girdnvg_items[$k]['list_nvg_num_pro'] : '4';  
							     $soup_bnrg_image = wp_get_attachment_image_src($soup_girdnvg_brnimg,'ofr-img');
							     $soup_bnrg_img = $soup_bnrg_image[0]; 
			                     $soup_menu_lnk = str_replace(" ","_",strtolower($soup_girdnvg_mnu_ttl));	     
			                     ?>     
			                        <div id="<?php echo $soup_menu_lnk; ?>" class="menu-category">
			                            <div class="menu-category-title">
			                                <div class="bg-image"><img src="<?php echo esc_url($soup_bnrg_img); ?>" alt="<?php echo esc_attr($soup_girdnvg_mnu_ttl); ?>"></div>
			                                <h2 class="title"><?php echo esc_html($soup_girdnvg_mnu_ttl); ?></h2>
			                            </div>
			                            <div class="menu-category-content"> 
							            	<?php   
            								$product_args = array(
            									'post_type'=>'product',
            									'product_cat' => $soup_girdnvg_ctslg,
            									'posts_per_page'=> $soup_girdnvg_num_pro, 
            									'order'=>$list_order, 
            									'orderby'=>$list_orderby 
            								);
							            	if($list_orderby=='meta_value_num'){
							            		$product_args['meta_key'] = '_price';
							            	} 
							            	$product_query = new WP_Query($product_args); ?>
							            	<?php while($product_query->have_posts()): $product_query->the_post(); ?>
				                                <div class="menu-item menu-list-item">
				                                    <div class="row align-items-center">
				                                        <div class="col-sm-6 mb-2 mb-sm-0">
				                                            <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				                                            <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
				                                        </div>
				                                        <div class="col-sm-6 text-sm-right">
				                                            <span class="text-md mr-4"><?php echo soup_variation_price_format(); ?></span>
				                                            <button class="btn btn-outline-secondary btn-sm ptom" data-target="#productModal_<?php echo get_the_ID(); ?>" data-pid="<?php echo get_the_ID(); ?>"  data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
				                                        </div>
				                                    </div>
				                                </div>  
											<!-- Modal / Product -->
											<div class="modal fade woocommerce" id="productModal_<?php echo get_the_ID(); ?>" data-mid="<?php echo get_the_ID(); ?>" role="dialog">
											    <div class="modal-dialog" role="document">
											        <div class="modal-content">
											            <div class="modal-header modal-header-lg dark bg-dark">
											            	<?php global $soup; 
											            		$popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : 'Specify your dish';
											            		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
											            	?>
											                <div class="bg-image"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt=""></div>
											                <h4 class="modal-title"><?php echo $popup_title; ?></h4>
											                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
											            </div>
											            <div class="modal-product-details">
											                <div class="row align-items-center">
											                    <div class="col-8">
											                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
											                        <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
											                    </div>
											                    <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
											                </div>
											            </div>
											            <div class="modal-body panel-details-container popsoup"> 
												        	<?php do_action( 'woocommerce_single_product_cart' ); ?>
											            </div> 
											        </div>
											    </div>
											</div>
											<?php endwhile; wp_reset_postdata(); ?>  
			                            </div>
			                        </div>
				                  <?php 
				                }
				            }
			            ?>   
                    </div>
                </div>
            </div>
        </div>

<?php return ob_get_clean();
}
add_shortcode('list_navigation','soup_list_navigation');
 
function soup_list_collapse($atts,$content=null){
	extract(shortcode_atts(array(
	    'list_collaps' =>1, 
	    'list_orderby' =>'id',  
	    'list_order' =>'desc',  
	    'list_bnrimg' =>'',  
	    'list_mnuttl' =>'',   
	    'list_colps_num_pro' =>'4',   
	    'list_fodcat' =>''   
	), $atts));    
    $list_image = wp_get_attachment_image_src($list_bnrimg,'list-img');
    $list_img = $list_image[0];  
	if($list_collaps==1){
		$list_bpn = 'true';
		$list_dpn = 'show';
	}else{ 
		$list_bpn = '';
		$list_dpn = '';
	} 
	$soup_menu_lnk = str_replace(" ","_",strtolower($list_mnuttl));
	$soup_menu_lnkM = str_replace(" ","__",strtolower($list_mnuttl))."_1";
	global $post;

	ob_start(); ?> 
	    <div id="<?php echo $soup_menu_lnkM; ?>" class="menu-category">
	        <div class="menu-category-title collapse-toggle" role="tab" data-target="#<?php echo $soup_menu_lnk; ?>" data-toggle="collapse" aria-expanded="<?php echo $list_bpn; ?>">
	            <div class="bg-image"><img src="<?php echo esc_url($list_img); ?>" alt="Food Menu"></div>
	            <h2 class="title"><?php echo $list_mnuttl; ?></h2>
	        </div>
	        <div id="<?php echo $soup_menu_lnk; ?>" class="menu-category-content collapse  <?php echo $list_dpn; ?>"> 
            	<?php   
				$product_args = array(
					'post_type'=>'product',
					'product_cat' => $list_fodcat,
					'posts_per_page'=> $soup_girdnvg_num_pro, 
					'order'=>$list_order, 
					'orderby'=>$list_orderby 
				);
            	if($list_orderby=='meta_value_num'){
            		$product_args['meta_key'] = '_price';
            	} 
            	$product_query = new WP_Query($product_args); ?>
	        	<?php while($product_query->have_posts()): $product_query->the_post(); ?>
	                <div class="menu-item menu-list-item">
	                    <div class="row align-items-center">
	                        <div class="col-sm-6 mb-2 mb-sm-0">
	                            <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
	                            <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
	                        </div>
	                        <div class="col-sm-6 text-sm-right">
	                            <span class="text-md mr-4"><?php echo soup_variation_price_format(); ?></span>
	                            <button class="btn btn-outline-secondary btn-sm" data-target="#productModal_<?php echo get_the_ID(); ?>" data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
	                        </div>
	                    </div>
	                </div>
				<!-- Modal / Product -->
				<div class="modal fade woocommerce" id="productModal_<?php echo get_the_ID(); ?>" role="dialog">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header modal-header-lg dark bg-dark">
				            	<?php global $soup; 
				            		$popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : 'Specify your dish';
				            		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
				            	?>
				                <div class="bg-image"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt=""></div>
				                <h4 class="modal-title"><?php echo $popup_title; ?></h4>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
				            </div>
				            <div class="modal-product-details">
				                <div class="row align-items-center">
				                    <div class="col-8">
				                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				                        <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
				                    </div>
				                    <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
				                </div>
				            </div>
				            <div class="modal-body panel-details-container popsoup"> 
					        	<?php do_action( 'woocommerce_single_product_cart' ); ?>
				            </div> 
				        </div>
				    </div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>  
	        </div>
	    </div> 
<?php return ob_get_clean();
}
add_shortcode('list_collapse','soup_list_collapse');
 
function soup_grid_navigation($atts,$content=null){
	extract(shortcode_atts(array(
	    'grd_nvg' =>'',  
	), $atts)); 
	global $post;     
	ob_start(); ?>
        <div class="page-content">
            <div class="container">
            	<div class="row">
	                <div class="row no-gutters">
	                    <div class="col-md-3">
	                        <!-- Menu Navigation -->
	                        <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
	                            <ul class="nav nav-menu bg-dark dark">
						            <?php 
							            $soup_girdnvg_items = vc_param_group_parse_atts( $atts['grid_nvg_cat']);  
							            $soup_girdnvg_num = count($soup_girdnvg_items); 
							            if($soup_girdnvg_num > 0){
						                   for($k=0; $k<$soup_girdnvg_num; $k++){
						                     $soup_girdnvg_mnu_ttl = (isset($soup_girdnvg_items[$k]['grid_nvg_ttl'])) ? $soup_girdnvg_items[$k]['grid_nvg_ttl'] : '';  
						                     $soup_menu_lnk = str_replace(" ","_",strtolower($soup_girdnvg_mnu_ttl));	     
						                     ?>   
	                                		<li><a href="#<?php echo $soup_menu_lnk; ?>"><?php echo esc_html($soup_girdnvg_mnu_ttl); ?></a></li> 
							                  <?php 
							                }
							            }
						            ?>   
	                            </ul>
	                        </nav>
	                    </div>
	                    <div class="col-md-9">
				            <?php 
					            $soup_girdnvg_items = vc_param_group_parse_atts( $atts['grid_nvg_cat']);  
					            $soup_girdnvg_num = count($soup_girdnvg_items); 
					            if($soup_girdnvg_num > 0){
				                   for($k=0; $k<$soup_girdnvg_num; $k++){
				                     $grid_orderby = (isset($soup_girdnvg_items[$k]['grid_orderby'])) ? $soup_girdnvg_items[$k]['grid_orderby'] : 'id';  
				                     $grid_order = (isset($soup_girdnvg_items[$k]['grid_order'])) ? $soup_girdnvg_items[$k]['grid_order'] : 'desc';  
				                     $soup_girdnvg_mnu_ttl = (isset($soup_girdnvg_items[$k]['grid_nvg_ttl'])) ? $soup_girdnvg_items[$k]['grid_nvg_ttl'] : '';  
				                     $soup_girdnvg_brnimg = (isset($soup_girdnvg_items[$k]['grid_nvg_img'])) ? $soup_girdnvg_items[$k]['grid_nvg_img'] : '';  
				                     $soup_girdnvg_catslug = (isset($soup_girdnvg_items[$k]['gridf_cat_slug'])) ? $soup_girdnvg_items[$k]['gridf_cat_slug'] : '';  
				                     $soup_girdnvg_num_pro = (isset($soup_girdnvg_items[$k]['gridf_nvg_num_pro'])) ? $soup_girdnvg_items[$k]['gridf_nvg_num_pro'] : '6';  
								     $soup_bnrg_image = wp_get_attachment_image_src($soup_girdnvg_brnimg,'ofr-img');
								     $soup_bnrg_img = $soup_bnrg_image[0]; 
				                     $soup_menu_lnk = str_replace(" ","_",strtolower($soup_girdnvg_mnu_ttl));	     
				                     ?>     
				                        <div id="<?php echo $soup_menu_lnk; ?>" class="menu-category">
				                            <div class="menu-category-title">
				                                <div class="bg-image"><img src="<?php echo esc_url($soup_bnrg_img); ?>" alt="<?php echo esc_attr($soup_girdnvg_mnu_ttl); ?>"></div>
				                                <h2 class="title"><?php echo esc_html($soup_girdnvg_mnu_ttl); ?></h2>
				                            </div>
				                            <div class="menu-category-content padded">
				                                <div class="row gutters-sm"> 
									            	<?php   
		            								$product_args = array(
		            									'post_type'=>'product',
		            									'product_cat' => $soup_girdnvg_catslug,
		            									'posts_per_page'=> $soup_girdnvg_num_pro, 
		            									'order'=>$grid_order, 
		            									'orderby'=>$grid_orderby 
		            								);
									            	if($grid_orderby=='meta_value_num'){
									            		$product_args['meta_key'] = '_price';
									            	} 
									            	$product_query = new WP_Query($product_args); ?>
									            	<?php while($product_query->have_posts()): $product_query->the_post(); ?>
					                                    <div class="col-lg-4 col-6">
					                                        <!-- Menu Item -->
					                                        <div class="menu-item menu-grid-item">
					                                        	<?php the_post_thumbnail('soup-product-grid',array('class'=>'mb-4')); ?> 
					                                            <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					                                            <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
					                                            <div class="row align-items-center mt-4">
					                                                <div class="col-sm-6"><span class="text-md mr-4"><?php echo soup_variation_price_format(); ?></span></div>
					                                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-target="#productModal_<?php echo get_the_ID(); ?>" data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button></div>
					                                            </div>
					                                        </div>
					                                    </div> 
				<!-- Modal / Product -->
				<div class="modal fade woocommerce" id="productModal_<?php echo get_the_ID(); ?>" role="dialog">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header modal-header-lg dark bg-dark">
				            	<?php global $soup; 
				            		$popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : 'Specify your dish';
				            		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
				            	?>
				                <div class="bg-image"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt=""></div>
				                <h4 class="modal-title"><?php echo $popup_title; ?></h4>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
				            </div>
				            <div class="modal-product-details">
				                <div class="row align-items-center">
				                    <div class="col-8">
				                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				                        <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
				                    </div>
				                    <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
				                </div>
				            </div>
				            <div class="modal-body panel-details-container popsoup"> 
					        	<?php do_action( 'woocommerce_single_product_cart' ); ?>
				            </div> 
				        </div>
				    </div>
				</div>
													<?php endwhile; wp_reset_postdata(); ?> 
				                                </div>
				                            </div>
				                        </div>
					                  <?php 
					                }
					            }
				            ?>  
	                    </div>
	                </div>
                </div>
            </div>
        </div>
<?php return ob_get_clean();
}
add_shortcode('grid_navigation','soup_grid_navigation');
 
function soup_grid_collapse($atts,$content=null){
	extract(shortcode_atts(array(
	    'gc_collaps' =>1, 
	    'gc_bnrimg' =>'',  
	    'gc_orderby' =>'id',  
	    'gc_order' =>'desc',  
	    'gc_mnuttl' =>'',   
	    'gc_colps_num_pro' =>'6',   
	    'gc_cat_slug' =>''   
	), $atts));    
    $gc_image = wp_get_attachment_image_src($gc_bnrimg,'ofr-img');
    $gc_img = $gc_image[0]; 
	if($gc_collaps==1){
		$gc_bpn = 'true';
		$gc_dpn = 'show';
	}else{ 
		$gc_bpn = '';
		$gc_dpn = '';
	} 
	$soup_menu_lnk = str_replace(" ","_",strtolower($gc_mnuttl));
	$soup_menu_lnkM = str_replace(" ","__",strtolower($gc_mnuttl))."_1";
	global $post;
	ob_start(); ?>  
	    <div id="<?php echo $soup_menu_lnkM; ?>" class="menu-category">
	        <div class="menu-category-title collapse-toggle" role="tab" data-target="#<?php echo $soup_menu_lnk; ?>" data-toggle="collapse" aria-expanded="<?php echo $gc_bpn; ?>">
	            <div class="bg-image"><img src="<?php echo esc_url($gc_img); ?>" alt="Food Menu"></div>
	            <h2 class="title"><?php echo $gc_mnuttl; ?></h2>
	        </div>
	        <div id="<?php echo $soup_menu_lnk; ?>" class="menu-category-content padded collapse <?php echo $gc_dpn; ?>">
	            <div class="row gutters-sm"> 
		            	<?php   
						$product_args = array(
							'post_type'=>'product',
							'product_cat' => $gc_cat_slug,
							'posts_per_page'=> $gc_colps_num_pro, 
							'order'=>$gc_order, 
							'orderby'=>$gc_orderby 
						);
		            	if($gc_orderby=='meta_value_num'){
		            		$product_args['meta_key'] = '_price';
		            	} 
		            	$product_query = new WP_Query($product_args); ?>
	            	<?php while($product_query->have_posts()): $product_query->the_post(); ?>
		                <div class="col-lg-4 col-6">
		                    <!-- Menu Item -->
		                    <div class="menu-item menu-grid-item">
					            <?php the_post_thumbnail('soup-product-grid',array('class'=>'mb-4')); ?>  
		                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		                        <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
		                        <div class="row align-items-center mt-4">
		                            <div class="col-sm-6"><span class="text-md mr-4"> 
		                            	<span class="text-muted"><?php echo soup_variation_price_format(); ?></span></div>
		                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-target="#productModal_<?php echo get_the_ID(); ?>" data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button></div>
		                        </div>
		                    </div>
		                </div>


				<!-- Modal / Product -->
				<div class="modal fade woocommerce" id="productModal_<?php echo get_the_ID(); ?>" role="dialog">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header modal-header-lg dark bg-dark">
				            	<?php global $soup; 
				            		$popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : 'Specify your dish';
				            		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
				            	?>
				                <div class="bg-image"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt=""></div>
				                <h4 class="modal-title"><?php echo $popup_title; ?></h4>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
				            </div>
				            <div class="modal-product-details">
				                <div class="row align-items-center">
				                    <div class="col-8">
				                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				                        <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
				                    </div>
				                    <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
				                </div>
				            </div>
				            <div class="modal-body panel-details-container popsoup"> 
					        	<?php do_action( 'woocommerce_single_product_cart' ); ?>
				            </div> 
				        </div>
				    </div>
				</div>

					<?php endwhile; wp_reset_postdata(); ?> 
	            </div>
	        </div>
	    </div> 
<?php return ob_get_clean();
}
add_shortcode('grid_collapse','soup_grid_collapse');
 
function soup_page_review_display($atts,$content=null){
	extract(shortcode_atts(array(
	    'rvw_post_pag' => -1  
	), $atts));     
	ob_start(); ?>  
        <div class="page-content pt-0 pull-up-30 protrude disp-review">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-xl-8 push-xl-2"> 
                        <?php $soup_review = new WP_Query(array('post_type'=>'reviews','posts_per_page'=>$rvw_post_pag)); ?>
                        <?php while($soup_review->have_posts()): $soup_review->the_post(); 
                        $reviews_desig = get_post_meta(get_the_ID(),'_soup_revie_design',true);
                        $reviews_star = get_post_meta(get_the_ID(),'_soup_revie_rat',true);
                        $reviews_email = get_post_meta(get_the_ID(),'_soup_revie_email',true);
                        ?>
	                        <blockquote class="blockquote blockquote-lg light" data-center-top="filter: blur(0); transform: scale(1);" data-bottom-top="transform: scale(0.9);">
	                            <div class="blockquote-content">
	                                <div class="rate rate-sm mb-3">
	                                	<?php 
	                                	$rat = 5; 
	                                	for ($i=1; $i <=$rat ; $i++) { ?>
	                                		<i class="fa fa-star <?php echo ($i<=$reviews_star) ? 'active' : ''; ?>"></i>
	                                	<?php } ?> 
	                                </div>
	                                <?php the_content(); ?>
	                            </div>
	                            <footer>
	                            	<?php 
									$getuseremail = $reviews_email;
	                            	$usergravatar = 'http://www.gravatar.com/avatar/' . md5($getuseremail) . '?s=32';
									echo '<img src="' . $usergravatar . '" class="wpb_gravatar"  alt="'.esc_attr('Gravatar','soup').'"/>';
									?> 
	                                <span class="name"><?php the_title(); ?><span class="text-muted"><?php echo ($reviews_desig!='') ? ', '.$reviews_desig : ''; ?></span></span>
	                            </footer>
	                        </blockquote> 
                        <?php endwhile; wp_reset_postdata(); ?>  
                    </div>
                </div>
            </div>
        </div>
<?php return ob_get_clean();
}
add_shortcode('page_review_display','soup_page_review_display');
 
function soup_page_review_display_home($atts,$content=null){
	extract(shortcode_atts(array(
	    'h1_ttl' =>'',  
	    'h1_sbttl' =>'',  
	    'h1_rating' =>'',  
	    'h1_rating_prg' =>2 , 
	    'h1_img_pos' =>'' , 
	    'h1_rat_bgimg' =>'' 
	), $atts));     
        $rvw_image = wp_get_attachment_image_src($h1_rat_bgimg,'review-img');
        $rvw_img = $rvw_image[0]; 
	ob_start(); ?>  
        <section class="section section-bg-edge"> 
            <div class="image <?php echo ($h1_img_pos==1) ? 'left' : 'right'; ?> col-md-6 push-md-6">
                <div class="bg-image"><img src="<?php echo esc_url($rvw_img); ?>" alt="<?php esc_attr_e('Review Image'); ?>"></div>
            </div> 
            <div class="container">
                <div class="col-lg-5 col-md-9 <?php echo ($h1_img_pos==1) ? 'push-md-6' : ''; ?>">
                    <div class="rate mb-5 rate-lg">
	                	<?php 
						$star = 5;
						$rating = $h1_rating;
						for ($i=1; $i <= $star; $i++) { ?> 
						    <i class="fa fa-star <?php echo ($rating>=$i) ? 'active' : ''; ?>"></i>
						<?php } ?>
                    </div>
                    <h1><?php echo $h1_ttl; ?></h1>
                    <p class="lead text-muted mb-5"><?php echo $h1_sbttl; ?></p>
                    <div class="blockquotes hom1"> 
                        <?php query_posts(array('post_type'=>'reviews','posts_per_page'=> $h1_rating_prg,'orderby'=>'menu_order')); 
	                    while ( have_posts() ) : the_post(); 
                        $reviews_desig = get_post_meta(get_the_ID(),'_soup_revie_design',true);
                        $reviews_star = get_post_meta(get_the_ID(),'_soup_revie_rat',true);
                        $reviews_email = get_post_meta(get_the_ID(),'_soup_revie_email',true);?> 
	                        <blockquote class="blockquote light animated" data-animation="fadeInLeft">
	                            <div class="blockquote-content">
	                                <div class="rate rate-sm mb-3">
	                                	<?php 
	                                	$rat = 5; 
	                                	for ($i=1; $i <=$rat ; $i++) { ?>
	                                		<i class="fa fa-star <?php echo ($i<=$reviews_star) ? 'active' : ''; ?>"></i>
	                                	<?php } ?> 
	                                </div>
	                                <?php the_content(); ?>
	                            </div>
	                            <footer>
	                            	<?php 
									$getuseremail = $reviews_email;
	                            	$usergravatar = 'http://www.gravatar.com/avatar/' . md5($getuseremail) . '?s=32';
									echo '<img src="' . $usergravatar . '" class="wpb_gravatar"  alt="'.esc_attr('Gravatar','soup').'"/>';
									?> 
	                                <span class="name"><?php the_title(); ?><span class="text-muted"><?php echo ($reviews_desig!='') ? ', '.$reviews_desig : ''; ?></span></span>
	                            </footer>
	                        </blockquote> 
	                    <?php endwhile; wp_reset_query();?> 
                    </div>
                </div>
            </div> 
        </section>
<?php return ob_get_clean();
}
add_shortcode('home_review_display','soup_page_review_display_home');
 
function soup_page_promo_info($atts,$content=null){
	extract(shortcode_atts(array(
	    'prmo_pos' =>''  
	), $atts));     
	ob_start(); ?>  
        <section class="section section-extended <?php echo ($prmo_pos==1) ? 'left' : 'right'; ?> dark"> 
            <div class="container bg-dark">
                <div class="row">
	            <?php 
	              $prmo_team_items = vc_param_group_parse_atts( $atts['prmo_features']);  
	              $prmo_team_num = count($prmo_team_items); 
	              if($prmo_team_num > 0){
	                  for($i=0; $i<$prmo_team_num; $i++){
	                    $prmo_prm_ttl = (isset($prmo_team_items[$i]['prmo_f_ttl'])) ? $prmo_team_items[$i]['prmo_f_ttl'] : '';    
	                    $prmo_prm_sbtl = (isset($prmo_team_items[$i]['prmo_f_sbttl'])) ? $prmo_team_items[$i]['prmo_f_sbttl'] : '';    
	                    $prmo_prm_ico = (isset($prmo_team_items[$i]['prmo_f_ico'])) ? $prmo_team_items[$i]['prmo_f_ico'] : '';    
	                    $prmo_prm_link = (isset($prmo_team_items[$i]['prmo_f_link'])) ? $prmo_team_items[$i]['prmo_f_link'] : '#';    
	                    ?>  
		                    <div class="col-md-4">
		                        <!-- Step -->
		                        <div class="feature feature-1 mb-md-0">
		                            <div class="feature-icon icon icon-primary"><i class="<?php echo $prmo_prm_ico; ?>"></i></div>
		                            <div class="feature-content">
		                                <h4 class="mb-2"><a href="<?php echo $prmo_prm_link; ?>"><?php echo $prmo_prm_ttl; ?></a></h4>
		                                <p class="text-muted mb-0"><?php echo $prmo_prm_sbtl; ?></p>
		                            </div>
		                        </div>
		                    </div>
	                    <?php 
	                  }
	              }
	            ?>   
                </div>
            </div> 
        </section>
<?php return ob_get_clean();
}
add_shortcode('page_promo_info','soup_page_promo_info');
 
function soup_page_menu_slider($atts,$content=null){
	extract(shortcode_atts(array(
	    'pgmnu_sldr_ttl' => ''   
	), $atts));     
	ob_start(); ?>  
        <section class="section pb-0 protrude menu_slider">
		<?php if($pgmnu_sldr_ttl): ?>
            <div class="container">
                <h1 class="mb-6"><?php echo $pgmnu_sldr_ttl; ?></h1>
            </div>
        <?php endif; ?>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
	            <?php 
	              $pgmnu_sldr_items = vc_param_group_parse_atts( $atts['pg_mnu_slide']);  
	              $pgmnu_sldr_num = count($pgmnu_sldr_items); 
	              if($pgmnu_sldr_num > 0){
	                  for($i=0; $i<$pgmnu_sldr_num; $i++){
	                    $pgmnu_sldr_ttl = (isset($pgmnu_sldr_items[$i]['pg_mnu_sld_ttl'])) ? $pgmnu_sldr_items[$i]['pg_mnu_sld_ttl'] : '';     
	                    $pgmnu_sldr_imgid = (isset($pgmnu_sldr_items[$i]['pg_mnu_sld_img'])) ? $pgmnu_sldr_items[$i]['pg_mnu_sld_img'] : '';     
	                    $pgmnu_sldr_link = (isset($pgmnu_sldr_items[$i]['pg_mnu_sld_link'])) ? $pgmnu_sldr_items[$i]['pg_mnu_sld_link'] : '';  
					    $pgmnu_sldr_image = wp_get_attachment_image_src($pgmnu_sldr_imgid,'abtus-img'); 
					    $pgmnu_sldr_img = $pgmnu_sldr_image[0];     
	                    ?>  
		                <!-- Menu Sample -->
		                <div class="menu-sample">
		                    <a href="<?php echo $pgmnu_sldr_link; ?>">
		                        <img src="<?php echo esc_url($pgmnu_sldr_img); ?>" alt="Restaurant" class="image">
		                        <h3 class="title"><?php echo $pgmnu_sldr_ttl; ?></h3>
		                    </a>
		                </div>
	                    <?php 
	                  }
	              }
	            ?>   
            </div>

        </section>
<?php return ob_get_clean();
}
add_shortcode('page_menu_slider','soup_page_menu_slider');
 
function soup_page_offers_slider($atts,$content=null){
	extract(shortcode_atts(array(
	    'ofrs_ttl' => '',   
	    'ofrs_post_cnt' => '-1'   
	), $atts));     
	ob_start(); ?>  
        <section class="section bg-light">
            <div class="container">
                <h1 class="text-center mb-6"><?php echo $ofrs_ttl; ?></h1>
                <div class="carousel" data-slick='{"dots": true}'>
                    <?php $offers_query = new WP_Query(array('post_type'=>'offers','posts_per_page'=> $ofrs_post_cnt )); ?>
                    <?php while($offers_query->have_posts()): $offers_query->the_post(); 
                    $offers_subttl = get_post_meta(get_the_ID(),'_soup_ofrs_subttl',true); ?>
                    <div class="special-offer">
                    	<?php the_post_thumbnail('',array('class'=>'special-offer-image')); ?> 
                        <div class="special-offer-content">
                            <h2 class="mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <h5 class="text-muted mb-5"><?php echo $offers_subttl; ?></h5>
                            <ul class="list-check text-lg mb-0">
								<?php 
								$entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true ); 
								foreach ( (array) $entries as $key => $entry ) {

									$title = $enable = '';

									if ( isset( $entry['fe_txt'] ) ) {
										$title = esc_html( $entry['fe_txt'] );
									}

									if ( isset( $entry['ft_enable'] ) ) {
										$enable = $entry['ft_enable'] ;
									}
									if($enable=='y'){
										echo '<li>';
									}else{
										echo '<li class="false">';
									}
									echo $title;
								?>  
								</li>
								<?php } ?> 
                            </ul>
                        </div>
                    </div>
					<?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
<?php return ob_get_clean();
}
add_shortcode('page_offers_slider','soup_page_offers_slider');
 
function soup_page_promo_video($atts,$content=null){
	extract(shortcode_atts(array(
	    'prm_vdo_ttl' => '',  
	    'prm_vdo_sbttl' => '',  
	    'prm_vdo_ytblnk' => '',  
	    'prm_vdo_bgimg' => 'https://www.youtube.com/embed/uVju5--RqtY'  
	), $atts));  
	    $prm_vdo_image = wp_get_attachment_image_src($prm_vdo_bgimg,'prmo-img'); 
	    $prm_vdo_img = $prm_vdo_image[0];         
	ob_start(); ?>  
        <section class="section section-lg dark bg-dark"> 
            <div class="bg-image bg-parallax"><img src="<?php echo esc_url($prm_vdo_img); ?>" alt="Video Image"></div> 
            <div class="container text-center">
                <div class="col-lg-8 push-lg-2">
                    <h2 class="mb-3"><?php echo $prm_vdo_ttl; ?></h2>
                    <h5 class="text-muted"><?php echo $prm_vdo_sbttl; ?></h5>
                    <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="<?php echo $prm_vdo_ytblnk; ?>"></button>
                </div>
            </div> 
        </section>
        <!-- Video Modal / Demo -->
		<div class="modal modal-video fade" id="modalVideo" role="dialog">
		    <button class="close" data-dismiss="modal"><i class="ti-close"></i></button>
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">
		            <iframe height="500"></iframe>
		        </div>
		    </div>
		</div>
<?php return ob_get_clean();
}
add_shortcode('page_promo_video','soup_page_promo_video');
 
 
function soup_page_latest_post($atts,$content=null){
	extract(shortcode_atts(array(
	    'ltst_post' =>'', 
	    'ltst_post_num' =>'' 
	), $atts));     
	ob_start(); ?>  
        <section class="section section-lg bg-light">

            <div class="container">
                <h1 class="text-center mb-6"><?php echo $ltst_post; ?></h1>
                <div class="row">
                    <div class="col-lg-10 push-lg-1">
                        <div class="carousel" data-slick='{"dots": true, "infinite": true}'> 
                           	<?php $blog_post_sldr = new WP_Query(array('post_type'=>'post','posts_per_page'=>3));
                           	while($blog_post_sldr->have_posts()): $blog_post_sldr->the_post(); ?>
	                            <article class="post post-wide animated">
	                                <div class="post-image"><?php the_post_thumbnail(); ?></div>
	                                <div class="post-content">
	                                    <ul class="post-meta">
	                                        <li><?php soup_posted_on(); ?></li>
	                                        <li><?php esc_html_e('by','soup'); ?> <?php the_author(); ?></li>
	                                    </ul>
	                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                    <p><?php echo wp_trim_words(get_the_content(),11,''); ?></p>
	                                </div>
	                            </article>
	                        <?php endwhile; wp_reset_postdata(); ?> 
                        </div>
                    </div>
                </div>
            </div>

        </section>
<?php return ob_get_clean();
}
add_shortcode('page_latest_post','soup_page_latest_post');
  
function soup_page_write_review($atts,$content=null){
	extract(shortcode_atts(array(
	    'wr_bg_img' => '',   
	    'wr_sec_ttl' => '',   
	    'wr_sec_sbttl' => '',   
	    'wr_sec_btnttl' => ''
	), $atts));    
        $rvw_image = wp_get_attachment_image_src($wr_bg_img,'review-img');
        $rvw_img = $rvw_image[0]; 

	ob_start(); ?>  
        <!-- Section -->
        <section class="section section-lg dark bg-dark"> 
            <div class="bg-image bg-parallax"><img src="<?php echo esc_url($rvw_img); ?>" alt="Review"></div> 
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-8 push-lg-2">
                        <h2 class="mb-3"><?php echo $wr_sec_ttl; ?></h2>
                        <h5 class="text-muted"><?php echo $wr_sec_sbttl; ?></h5>
                        <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#reviewModal"><span><?php echo $wr_sec_btnttl; ?></span></button>
                    </div>
                </div>
            </div> 
        </section>
 
		<!-- Modal / Review -->
		<div class="modal fade" id="reviewModal" role="dialog">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header modal-header-lg dark bg-dark">
		                <div class="bg-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/photos/modal-review.jpg" alt=""></div>
		                <h4 class="modal-title">Write a review!</h4>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
		            </div>
		            <div class="modal-body">
		                <form id="soupreviewform" action="" method="POST">
		                    <div class="form-group">
		                        <textarea cols="30" rows="6" class="form-control coment" name="rvw_comment" placeholder="Write here your review..."></textarea>
		                    </div>
		                    <div class="form-group">
		                        <label>Your rate:</label>
		                        <div class="mb-2 stars">
								  <input class="star star-5 rvstar" id="star-5" type="radio" name="star" value="5"/>
								  <label class="star star-5" for="star-5"></label>
								  <input class="star star-4 rvstar" id="star-4" type="radio" name="star" value="4"/>
								  <label class="star star-4" for="star-4"></label>
								  <input class="star star-3 rvstar" id="star-3" type="radio" name="star" value="3"/>
								  <label class="star star-3" for="star-3"></label>
								  <input class="star star-2 rvstar" id="star-2" type="radio" name="star" value="2"/>
								  <label class="star star-2" for="star-2"></label>
								  <input class="star star-1 rvstar" id="star-1" type="radio" name="star" value="1"/>
								  <label class="star star-1" for="star-1"></label> 
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label>Your name:</label>
		                        <input type="text" class="form-control name" name="rvw_name" placeholder="Your name">
		                    </div>
		                    <div class="form-group">
		                        <label>Your email:</label>
		                        <input type="email" class="form-control email" name="rvw_email" placeholder="Your email">
		                    </div>
		                    <div class="form-group">
		                        <label>Your Company:</label>
		                        <input type="text" class="form-control company" name="rvw_desig" placeholder="Your company">
		                    </div> 
		                    <div class="text-center">
		                    	<input type="hidden" name="action" value="new_post" /> 
	                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
	                                <span class="description">Add review!</span> 
	                                <span class="success">
	                                    <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
	                                </span>
	                                <span class="error">Try again...</span>
	                            </button> 
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>

<?php return ob_get_clean();
}
add_shortcode('page_write_review','soup_page_write_review');
 
function soup_page_book_a_table($atts,$content=null){
	extract(shortcode_atts(array(
	    'bok_bg_img' => '',  
	    'bok_covr_img' => '',  
	    'bok_covr_ico' => '',  
	    'bok_covr_ico_ttl' => '',  
	    'bok_covr_ico_sbttl' => '',  
	    'bok_covr_sent_to' => '',  
	    'bok_covr_sent_sub' => '',  
	    'bok_covr_sent_from' => '',  
	    'bok_covr_vdourl' => ''  
	), $atts));    
        $bok_image = wp_get_attachment_image_src($bok_bg_img,'bg-img');
        $bokbg_img = $bok_image[0];  
        $bok_cvr_image = wp_get_attachment_image_src($bok_covr_img,'bg-img');
        $bokcvr_img = $bok_cvr_image[0];  
	ob_start(); 
	?>  
    <section class="section section-lg bg-dark"> 
        <!-- Video BG -->
        <div class="bg-video" data-property="{videoURL:'<?php echo $bok_covr_vdourl; ?>', showControls: false, containment:'self',startAt:1,stopAt:39,mute:true,autoPlay:true,loop:true,opacity:0.8,quality:'hd1080'}"></div>
        <?php if($bok_covr_vdourl==''): ?>
	        <div class="bg-image bg-video-placeholder zooming"><img src="<?php echo esc_url($bokbg_img); ?>" alt="<?php esc_attr_e('Restaurant','soup') ?>"></div> 
	    <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 push-lg-3">
                    <!-- Book a Table -->
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image"><img src="<?php echo esc_url($bokcvr_img); ?>" alt="<?php esc_attr_e('Restaurant','soup') ?>"></div>
                            <div>
                                <span class="icon icon-primary"><i class="<?php echo $bok_covr_ico; ?>"></i></span>
                                <h4 class="mb-0"><?php echo $bok_covr_ico_ttl; ?></h4>
                                <p class="lead text-muted mb-0"><?php echo $bok_covr_ico_sbttl; ?></p>
                            </div>
                        </div>
                        <form action="<?php echo plugin_dir_url( __FILE__ ); ?>form-submit.php" id="booking-form" data-validate>
                            <div class="utility-box-content">
                                <input type="hidden" name="senttomail" value="<?php echo $bok_covr_sent_to; ?>">
                                <input type="hidden" name="senttitle" value="<?php echo $bok_covr_sent_sub; ?>">
                                <input type="hidden" name="sentfrom" value="<?php echo $bok_covr_sent_from; ?>">
                                <div class="form-group">
                                    <label>Name and surename:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Attendens:</label>
                                            <input type="number" name="attendents" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Make reservation!</span> 
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                </span>
                                <span class="error">Try again...</span>
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div> 
    </section>
<?php return ob_get_clean();
}
add_shortcode('page_book_a_table','soup_page_book_a_table');
 
function soup_page_book_confirmation($atts,$content=null){
	extract(shortcode_atts(array(
	    'con_ico' => 'ti ti-check-box', 
	    'con_secttl' => '', 
	    'con_secsbttl' => '', 
	    'con_btnttl' => '', 
	    'con_btnurl' => '' 
	), $atts));     
	ob_start(); 
	?>  
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <span class="icon icon-xl icon-success"><i class="<?php echo $con_ico; ?>"></i></span>
                        <h1 class="mb-2"><?php echo $con_secttl; ?></h1>
                        <h4 class="text-muted mb-5"><?php echo $con_secsbttl; ?></h4>
                        <a href="<?php echo $con_btnurl; ?>" class="btn btn-outline-secondary"><span><?php echo $con_btnttl; ?></span></a>
                    </div>
                </div>
            </div>
        </section>
<?php return ob_get_clean();
}
add_shortcode('book_confirmation','soup_page_book_confirmation');
 