<?php



function usertypePlugin($link,$tableName,$isSelected='')
{
	///echo $isSelected;
	$usertype = "SELECT * FROM $tableName where status=1";
    $checkQuery = mysqli_query($link, $usertype);
    $option = '';
    
    
    $option = '<option value="">select usertype</option>';
    while($row = mysqli_fetch_array($checkQuery))
    {
    	$selected = '';
    	if($tableName=='imagetype')
    	{
    		//echo $isSelected;
    		if($isSelected==$row['id']) echo $selected = 'selected';
        	$option .= '<option value="'.$row['id'].'" '.$selected.'>'.$row['imageType'].'</option>';
    	}
    	else if($tableName=='usertype')
    	{
    		if($isSelected==$row['id'])  $selected = 'selected';
    		$option .= '<option value="'.$row['id'].'" '.$selected.'>'.$row['user_type'].'</option>';
    	}
    }
    return $option;
    //echo $sel ='<select name="usertype" id="usertype" class="form-control input-sm">'.$option.'</select>';
    
}