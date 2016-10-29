<?php

/*
* Title                   : Booking Calendar PRO (jQuery Plugin)
* Version                 : 2.0
* File                    : load.php
* File Version            : 2.0
* Created / Last Modified : 29 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2011 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Load booking data from a file.
*/

    if (isset($_POST['dopbcp_calendar_id'])){ // If calendar ID is received.
// Show file content.        

        $booktype = $_POST['booktype'];
        if($booktype == "bookcar")
        {
            $file = 'data/CalendarCar/Car'.$_POST['dopbcp_calendar_id'].'.txt';
        }else
        {
            $file = 'data/CalendarRoom/Room'.$_POST['dopbcp_calendar_id'].'.txt';

        }
        if (file_exists($file)){
            echo file_get_contents($file);
        }
        else{
            echo '';
        }

    }
    
?>