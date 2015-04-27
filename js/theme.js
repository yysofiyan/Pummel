jQuery( document ).ready( function( $ ) {
    
    var bg = $("body");
    $(window).resize("resizeBackground");
    function resizeBackground() {
        bg.height($(window).height() + 60);
    }
    resizeBackground();
    
    $('textarea, textarea.form-control, input[type="search"], input[type="text"], input[type="email"], input[type="url"]')
        .focus(function() { $(this).css("background-color", "#fff") })
        .blur(function() { if ($(this)[0].value == '') { $(this).css("background-color", "transparent") } });
    
    $( 'input.search-field' ).addClass( 'form-control' );

    // here for each comment reply link of wordpress
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );

    // here for the submit button of the comment reply form
    $( '#commentsubmit' ).addClass( 'btn btn-primary' );

    // The WordPress Default Widgets
    // Now we'll add some classes for the wordpress default widgets - let's go

    // the search widget
    $( 'input.search-submit' ).addClass( 'btn btn-default' );

    $( '.widget_rss ul' ).addClass( 'media-list' );

    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul' ).addClass( 'nav' );

    $( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');

    $( 'table#wp-calendar' ).addClass( 'table table-striped');
} );
