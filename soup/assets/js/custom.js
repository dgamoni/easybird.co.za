(function ($) {
    "use strict";
 
// pagination
$('nav.mt-5 ul').removeClass('page-numbers').addClass('pagination justify-content-center');
$('nav.mt-5 ul li').addClass('page-item');
$('nav.mt-5 ul li span').removeClass('page-numbers').addClass('page-link');
$('nav.mt-5 ul li a').removeClass('page-numbers').addClass('page-link');


//  widget search
$('.disp-review .blockquote:even .blockquote-content').addClass('dark');
$('.blockquotes.hom1 .blockquote:odd .blockquote-content').addClass('dark').attr('data-animation','fadeInRight');
$('.blockquotes.hom1 .blockquote:odd').attr('data-animation','fadeInRight');

//  widget search
$('.widget_search .search-form .search-field').addClass('form-control');
$('.widget_search .search-form .search-field').unwrap();
$('.screen-reader-text').remove(); 
$('.widget_search .search-form .search-submit').wrap( "<div class=\"btn btn-secondary btn-block\"></div>" );
$('.no-results .search-form .search-submit').wrap( "<div class=\"btn btn-secondary\"></div>" );

// widget recent post , recent comment , archive , categories , meta
$('.widget_recent_entries ul,.widget_recent_comments ul,.widget_archive ul,.widget_categories ul,.widget_meta ul,.widget_pages ul,.widget_rss ul,.widget_nav_menu ul').addClass('list-posts');
$('.widget_recent_entries ul li a,.widget_recent_comments ul li a,.widget_archive ul li a,.widget_categories ul li a,.widget_meta ul li a').addClass('title');
$('.widget_recent_entries ul li span').removeClass('post-date').addClass('date');

// post comment form
$('#add-comment p.form-submit').removeClass('form-submit').addClass('btn btn-primary sp-cmnt');
$('.comment-reply-link,#cancel-comment-reply-link').addClass('text-primary');

// product pop up
$('.popsoup .variations.panel-details:first-child .collapse').addClass('show');
$('.panel-details-container.popsoup form.cart button').addClass('modal-btn btn btn-secondary btn-block btn-lg');

// faq animation
if ($("section").hasClass("soupanimation")) {
    $("body").attr({
        "data-spy" : "scroll",
        "data-target" : "#side-navigation",
        "data-offset" : "70" 
    });
}

// woocommerce checkkout
$('.woocommerce-billing-fields input,.woocommerce-shipping-fields input[type="text"],.woocommerce-billing-fields select,.woocommerce-additional-fields textarea,.woocommerce-account-fields input[type="password"],.checkout_coupon input[type="text"],.soup-woo-checkout .woocommerce-form-login input[type="text"],.soup-woo-checkout .woocommerce-form-login input[type="password"]').addClass('form-control');
$('.woocommerce-billing-fields #billing_address_1_field,.woocommerce-shipping-fields #shipping_address_1_field').removeClass('form-row-wide').addClass('form-row-first');
$('.woocommerce-billing-fields #billing_city_field,.woocommerce-shipping-fields #shipping_city_field').removeClass('form-row-wide').addClass('form-row-last');
$('#soup_own_checkout_field select').addClass('form-control'); 
$('#soup_own_checkout_field h3').replaceWith(function() {
    return '<h4 class="border-bottom pb-4 mt-5"><i class="ti ti-package mr-3 text-primary"></i>' + $(this).text() + '</h4>';
});
 
 $( ".panel-details-container.popsoup form.cart button" ).wrapInner( "<span></span>");

$('.deliver-field-class select').wrap( "<div class=\"select-container\"></div>" );

// place order button 
$('.place-order #place_order').wrap( "<div class=\"btn btn-primary soup-order\"></div>" );


 $("form.cart").on("change", "input.qty", function() {
    if (this.value === "0")
        this.value = "1";
 
    $(this.form).find("button[data-quantity]").data("quantity", this.value);
});

$('.add_to_cart_button').on("click", function() {
    setTimeout(
        function() {
            $(".modal.fade.woocommerce").trigger('click.dismiss.bs.modal'); 
            $("a.added_to_cart").remove();
        },
    700);
});
$('.btn.ptom').on("click", function(e) {
    e.preventDefault();
    var checked,checked2,v1=0,v2=0;
    var m_id = $('.modal.fade.woocommerce').data('mid');
    var p_id = $(this).data('pid');
    var check = $('.modal.fade.woocommerce .required-product-addon .pdon-check').length;
    var radio = $('.modal.fade.woocommerce .required-product-addon .pdon-radio').length;

    if(m_id==p_id){
      if(check==1 && radio ==1){

        checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length;
        checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
        v1 = (checked) ? v1=1 : v1=0;
        v2 = (checked2) ? v2=1 : v2=0; 

        console.log(v1 +'-'+ v2);

        if(0!=v1 && 0!=v2 ) { 
          $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
        }else{
          $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
        } 
 
      
        jQuery( '.modal.fade.woocommerce .required-product-addon input[type="checkbox"],.modal.fade.woocommerce .required-product-addon input[type="radio"]' ).change(function(){  

          checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length; 
          checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
          v1 = (checked) ? v1=1 : v1=0;
          v2 = (checked2) ? v2=1 : v2=0; 
          console.log(v1 +'-'+ v2);

          if(0!=v1 && 0!=v2 ) { 
            $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
          }else{
            $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
          } 

        });
 

      }else if(check==1 && radio !=1){

        checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length;
        //checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
        v1 = (checked) ? v1=1 : v1=0;
        //v2 = (checked2) ? v2=1 : v2=0; 

        console.log(v1 +'-'+ v2);

        if(0!=v1 ) { 
          $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
        }else{
          $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
        } 
 
      
        jQuery( '.modal.fade.woocommerce .required-product-addon input[type="checkbox"],.modal.fade.woocommerce .required-product-addon input[type="radio"]' ).change(function(){  

          checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length; 
          //checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
          v1 = (checked) ? v1=1 : v1=0;
          //v2 = (checked2) ? v2=1 : v2=0; 
          console.log(v1 +'-'+ v2);

          if(0!=v1 ) { 
            $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
          }else{
            $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
          } 

        });

      }else if(check!=1 && radio ==1){

        //checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length;
        checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
        //v1 = (checked) ? v1=1 : v1=0;
        v2 = (checked2) ? v2=1 : v2=0; 

        console.log(v1 +'-'+ v2);

        if(0!=v2 ) { 
          $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
        }else{
          $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
        } 
 
      
        jQuery( '.modal.fade.woocommerce .required-product-addon input[type="checkbox"],.modal.fade.woocommerce .required-product-addon input[type="radio"]' ).change(function(){  

          //checked = $(".modal.fade.woocommerce .required-product-addon input[type='checkbox']:checked").length; 
          checked2 = $(".modal.fade.woocommerce .required-product-addon input[type='radio']:checked").length; 
          //v1 = (checked) ? v1=1 : v1=0;
          v2 = (checked2) ? v2=1 : v2=0; 
          console.log(v1 +'-'+ v2);

          if(0!=v2 ) { 
            $('.modal.fade.woocommerce .add_to_cart_button').removeClass('disabled').prop("disabled",false); 
          }else{
            $('.modal.fade.woocommerce .add_to_cart_button').addClass('disabled').prop("disabled",true);
          } 

        });

      }
    }
 
});
 
})(jQuery); 

