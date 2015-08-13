<?php
    function harrington_default_options() {
        // VARIABLES
        $themename = 'Harrington Theme';
        $options = array(
            array("name" => "General Settings",
                "type" => "heading"),
            array("name" => "Contact Number For Tap To Call Feature",
                "desc" => "Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",
                "id" => "inkthemes_contact_number",
                "std" => "",
                "type" => "text"),
            array("name" => "Mobile Navigation Menu",
                "desc" => "Enter your mobile navigation menu text",
                "id" => "inkthemes_nav",
                "std" => "",
                "type" => "textarea"),
            //Home Page Slider Setting
            array("name" => "Featured Area",
                "type" => "heading"),
            //Slider Speed Setting	
            array("name" => "Featured Image",
                "desc" => "The optimal size of the image is 1600px wide x 750px height, but it can be varied as per your requirement.",
                "id" => "inkthemes_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => "Heading",
                "desc" => "Mention the heading.",
                "id" => "inkthemes_sliderheading1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Link",
                "desc" => "Mention the URL.",
                "id" => "inkthemes_Sliderlink1",
                "std" => "",
                "type" => "text"),
            array("name" => "Link Text",
                "desc" => "Mention the link text.",
                "id" => "inkthemes_slider_button1",
                "std" => "",
                "type" => "text"),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//		
            array("name" => "Styling Options",
                "type" => "heading"),
            array("name" => "Custom CSS",
                "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
                "id" => "inkthemes_customcss",
                "std" => "",
                "type" => "textarea"));
        return apply_filters('inkthemes_option_defaults', array('theme_option' => $options, 'theme_name' => $themename));
    }
?>
