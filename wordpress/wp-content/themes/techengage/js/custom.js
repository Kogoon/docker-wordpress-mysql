jQuery(document).ready(function($) {
//------------------------------------------
    //Scroll-Top
//------------------------------------------
  $(".ti_scroll").hide();   
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.ti_scroll').fadeIn();
            } else {
                $('.ti_scroll').fadeOut();
            }
        });     
        $('a.ti_scroll').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

//------------------------------------------
    //Load-More Function
//------------------------------------------
    
    $('#load-more-btn').click(function() {
        
        var paged, next_page, ajax_url, this_element, post_query, max_pages; // Variables to use in this function

        this_element= $(this);
        paged       = this_element.data('paged'); // Get data-paged value
        next_page   = paged + 1;
        ajax_url    = techengage_loadmore_params.ajaxurl;  // Get url value from localize script
        post_query  = techengage_loadmore_params.posts;  // Get query vars value from localize script
        max_pages    = techengage_loadmore_params.max_page;

        this_element.find("span").addClass('itsloading');

        $.ajax({
            url  : ajax_url,
            type : 'post',
            data : {
                action          : 'techengage_load_more_fun',
                page            : paged,
                post_query_vars : post_query
            },
            
            error : function(response) {
                this_element.find("span").removeClass('itsloading');
            },
            success : function(response) {
                if( (paged == max_pages-1) || (paged >= max_pages) ) {
                    this_element.remove();
                    $('.te_ajax_button center').append('<h3>All posts loaded</h3>');
                }

                this_element.data('paged', next_page); // Increase data-paged value
                $('.ajax-posts-container .posts-container').append(response);

                this_element.find("span").removeClass('itsloading');
            }

        })

    });

  }); 