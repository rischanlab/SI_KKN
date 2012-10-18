<?php
/***************************************************************************
*                            MediaTutorial ( Codeigniter )
*                              -------------------
*     begin                 : Wednesday Jun 15 2011
*     copyright             : (C) 2011 Okie Wardoyo
*     facebook              : http://facebook.com/okiewardoyo
*     email                 : okie_eko_wardoyo@yahoo.com
*     website		    : http://www.mediatutorial.web.id
* 
* this software is TUTORIAL
***************************************************************************/

class Mediatutorialutils extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // Generate Random Digit
    function genRndDgt($length = 8, $specialCharacters = true) {
        $digits = '';	
        $chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";

        if($specialCharacters === true)
                $chars .= "!?=/&+,.";


        for($i = 0; $i < $length; $i++) {
                $x = mt_rand(0, strlen($chars) -1);
                $digits .= $chars{$x};
        }

        return $digits;
    }
}