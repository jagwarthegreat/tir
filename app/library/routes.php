<?php

// Main routes
function pages($view){

    switch ($view) {
        case 'profile':
            require_once "app/modules/profile.php";
            break;

        case 'feed':
            require_once "app/modules/news_feed.php";
            break;

        case 'map':
            require_once "app/modules/map.php";
            break;

        case 'dashboard':
            require_once "app/modules/admin_dashboard.php";
            break;

        case 'master-data':
            require_once "app/modules/master_data.php";
            break;

        case 'roles':
            require_once "app/modules/roles.php";
            break;

        case 'info-tips':
            require_once "app/modules/info_tips.php";
            break;

        case 'tips-details':
            require_once "app/modules/tips_detail.php";
            break;

        case 'edit-profile':
            require_once "app/modules/edit_profile.php";
            break;

        case 'embed-map':
            require_once "app/modules/embedmap_display.php";
            break;

        case 'review-posts':
            require_once "app/modules/review_post.php";
            break;

        case 'tips-content':
            require_once "app/modules/tips_content.php";
            break;

        case 'about':
            require_once "app/modules/about.php";
            break;
        
        default:
            if(!empty($view) || $view != $view){
                // require_once "app/modules/error/error.php";
                echo "<script>alert('Aw snap! No file directory.');window.location.href='index.php';</script>";

            }else{
                require_once "app/modules/news_feed.php";
            }
            break;
    }
    
} // end routes


