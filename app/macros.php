<?php
HTML::macro('activeLink',function($url, $label, $segment, $icon, $attr = NULL){
  if($segment == Request::segment(1)){
    return '<li class="active"><a href='. $url .'><i class="fa '.$icon.'"></i>'. $label .'</a></li>';
  }else{
    return '<li><a href='. $url .'><i class="fa '.$icon.'"></i>'. $label .'</a></li>';
  }
});

Form::macro('selectedUser',function($name, $value = null, $userId, $projectId, $attribute){
  $selectedUser = DB::table('project_user')
                    ->where('project_id', $projectId)
                    ->where('user_id', $userId)
                    ->count();
  $attribute = HTML::attributes($attribute);
  if ($selectedUser == 1) {
    return '<input type="checkbox" name="'. $name .'" value="'. $value .'"'. $attribute .'checked>';
  }else{
    return '<input type="checkbox" name="'. $name .'" value="'. $value .'"'. $attribute .'>';
  }
});
