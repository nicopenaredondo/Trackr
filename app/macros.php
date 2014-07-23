<?php
HTML::macro('activeLink',function($url, $label, $segment, $icon, $attr = NULL){
	if($segment == Request::segment(1)){
		return '<li class="active"><a href='. $url .'><i class="fa '.$icon.'"></i>'. $label .'</a></li>';
	}else{
		return '<li><a href='. $url .'><i class="fa '.$icon.'"></i>'. $label .'</a></li>';
	}
});