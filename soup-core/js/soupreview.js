(function ($) {

    "use strict";
 $( document ).ready(function() {

    var $soupreviewform  = $('#soupreviewform');

    if($soupreviewform.length>0) {
        
        $soupreviewform.submit(function(e){
            e.preventDefault(); 
            var $btn = $(this).find('.btn-submit');
            var star = $(this).find(".star:checked").val();
            var name = $(this).find('.name').val();
            var email = $(this).find('.email').val();
            var company = $(this).find('.company').val();
            var coment = $(this).find('.coment').val(); 
            if(name !='' || email != '' || company !='' || coment != ''){
                if ($soupreviewform.valid()){
                    $btn.addClass('loading');
                    $.ajax({
                        type: 'post',
                        url: soupajax.ajaxurl,
                        data:  {
                            action: 'soup_addreviews',
                            pstar: star,
                            pname: name, 
                            pemail: email, 
                            pcompany: company, 
                            pcoment: coment 
                        }
                    }).done(function(response){
                        if(response){
                            $btn.addClass('success');
                        } else {
                            $btn.addClass('error');
                        }
                    }).fail(function(data){
                        setTimeout(function(){ $btn.addClass('error'); }, 1200); 

                    }).complete(function(data){
                        setTimeout(function(){
                            $btn.removeClass('loading error success');
                        },6000);

                    });
                    return false;
                } 
            }
        });

    }

});

})(jQuery);

 