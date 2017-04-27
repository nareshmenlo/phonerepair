<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('asset_url()')) {

    function asset_url() {
        return base_url() . 'assets/';
    }

}


if (!function_exists('is_loggedIn()')) {

    function is_loggedIn() {
        $ci= & get_instance();
        $is_logged_in=$ci->session->userdata('is_logged_in');
        if($is_logged_in){
            return true;
        }
        return false;        
    }

}

if (!function_exists('copyrights()')) {

    function copyrights() {
        echo "&copy Copy " . date('Y') . " repair All rights reserved Designed by BLM Tech Pvt Ltd.";
    }

}

if (!function_exists('time_elapsed_string()')) {

    function time_elapsed_string($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }
        if((24 * 60 * 60 *2) < $etime){
            return date("jS M Y", $ptime);
        }
        $a = array(
            365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {

            $d = $etime / $secs;
            //echo $d;exit;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

}if (!function_exists('time_elapsed_string1()')) {

    function time_elapsed_string1($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

}

if (!function_exists('active_link')) {

    function active_link($controller) {
        $CI = & get_instance();

        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }

}

?>