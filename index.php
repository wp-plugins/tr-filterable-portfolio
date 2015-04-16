<?php

/*
Plugin Name: TR Filterable Portfolio
Plugin URI: http://themeroad.net/
Description: Aweosome Plugin for filterable portfolio
Author: Theme Road
Version: 1.0
Author URI: http://themeroad.net/
*/

/**
 * Enqueue scripts and styles
 */
function tr_filterable_portfolio_scripts() {

    // load  wp js
    wp_enqueue_script( 'jquery' );

 wp_enqueue_script( 'tr-isotop-js', plugins_url('/js/isotope.pkgd.min.js', __FILE__) ,array('jquery'));
    

}
add_action( 'wp_enqueue_scripts', 'tr_filterable_portfolio_scripts' );


require_once('tr-custom-post.php');
require_once('tr-shortcodes.php');
//require_once('single-tr_portfolio.php');



function tr_portfolio_css(){
    ?>

    <style type="text/css">
        ul#projects-filter {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul#projects-filter li a {
            float: left;
            padding: 10px 20px;
            background: red;
        }

        /*.thumb {*/
            /*margin-top: 57px;*/
        /*}*/

        div#project-wrapper {
            margin-top: 70px;
        }

        ul#projects-filter {
            margin: 0;
            padding: 0;
            list-style: none;
            display: inline-flex;
        }

        ul#projects-filter li a {
            float: left;
            padding: 10px 20px;
            background: rgb(250, 250, 250);
            font-size: 18px;
            font-weight: 700;
            color: #000;
            border: 1px solid #ddd;
        }

        .project-item{
            margin-right: 10px;
        }

        .project-title{
            
        }


        .project-item {
            /* margin-right: 12em; */
            padding: 10px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            overflow: hidden;
            margin-right: 5px;
            width: 24%;
            max-height: 251px;

        }

        .thumb {
            max-width: 300px;
            height: 150px;
        }
        .thumb img{
            width: 100%;
            height: 200px;
        }

        .more-details{
            padding: 5px 15px;
            background: #3498db;
            color: #fff;
        }

        .more-details {
            padding: 8px 15px;
            background: #3498db;
            color: #fff;
            top: 100%;
            position: absolute;
            right: 25%;
        }
        .project-item:hover
        .more-details{
            top: 40%;
            transition:all .5s;
        }

        .more-details:hover{
            background: #fff;
            color:#3498db;
            transition: all .4s;
        }

    </style>
<?php
}

add_action('wp_head','tr_portfolio_css');



