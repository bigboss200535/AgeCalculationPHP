<?php 
	
	    function get_age($birth_date){
	    	$today = date('Y-m-d');
	    	//Remove all space from date of birth
	    	$birth_year = substr($birth_date, 0,4);
	    	$birth_month = substr($birth_date, 5,2);
	    	$birth_day = substr($birth_date, 8,2);

	    	$year_today = substr($today, 0,4);
	    	$month_today = substr($today, 5,2);
	    	$day_today = substr($today, 8,2);
	        	
    		if($birth_year === $year_today){
    			$age_in_years = 0;
    			if($birth_month > $month_today){
    				$msg = "Birth Month Cannot be greater than Today's Date.";
    			}
    			elseif ($birth_month === $month_today){
    				$age_in_months = 0;

    				//Getting the Age in Days if Months are equal
    				if($birth_day > $day_today){
		    				$msg = "Birth Day Cannot be greater than Today's Date.";
		    			}
		    			elseif ($birth_day === $day_today){
		    				$age_in_days = 1;
		    			}
		    			else{
		    				$age_in_days = $day_today - $birth_day;
		    			}
    			}
    			//If Birth Month is Less than the Month of Today's Date.
    			else{
    				$age_in_months =  $month_today - $birth_month;
    				$age_in_days = $day_today - $birth_day;
    				if($age_in_days < 0){
    					$age_in_days *= -1;
    				}
    				else{
    					$age_in_days = $age_in_days;
    				}
    			}
    			
    		}
    		elseif($birth_year < $year_today)//If Birth Year is Less than the Year of Today's Date
    		{

    			if($birth_month > $month_today)
    			{
    				$age_in_years = $year_today - $birth_year - 1;
    				$age_in_months = $month_today - $birth_month;
    				$age_in_days = $day_today - $birth_day;
    			}
    			elseif ($birth_month === $month_today) 
    			{
    				$age_in_years = $year_today - $birth_year - 1;
    				$age_in_months = 11; //$month_today - $birth_month;
    				if($day_today === $birth_day)
    				{
    					$age_in_years += 1; //$year_today - $birth_year;
    					$age_in_months = 0;
    					$age_in_days = 0;
    				}
    				elseif($day_today > $birth_day)
    				{
    					$age_in_years += 1;// $year_today - $birth_year;
    					$age_in_months = 0;
    					$age_in_days = $day_today - $birth_day;
    				}
    				else
    				{
    					$age_in_years = $year_today - $birth_year;
    					$age_in_months = 11;
    					$age_in_days = $day_today - $birth_day;
    				}
    				//$age_in_days = $day_today - $birth_day;
    			}
    			else
    			{
    				$age_in_years = $year_today - $birth_year;
    				$age_in_months = $month_today - $birth_month;
    				$age_in_days = $day_today - $birth_day;
    			}
    			
    			if($age_in_months < 0)
    				{
    					$age_in_months = 12 + $age_in_months;
    				}
    				else
    				{
    					$age_in_months = $age_in_months;
    				}

    			if($age_in_days < 0)
    				{
    					$age_in_days *= -1;
    				}
    				else
    				{
    					$age_in_days = $age_in_days;
    				}
    		}
    		else

	    	{
	    		$msg = "Date of Birth(Year) Cannot be greater than Today's Date.";
	    		$final_age = "Wrong Date Provided";
	    		return $final_age; exit;
	    	}

    	if($age_in_days >= 27)	
    	{
    		$age_in_months += 1;
    	}
    	else
    	{
    		$age_in_months = $age_in_months;
    	}

    	if($age_in_months == 12)
    	{
    		$age_in_years += 1;
    	}
    	
    	if($age_in_years == 0)
    	{
    		$age_in_years = null;
    	}
    	elseif($age_in_years == 1)
    	{
    		$age_in_years = $age_in_years." Year";
    	}
    	else
    	{
    		$age_in_years = $age_in_years." Years";
    	}

    	if($age_in_months == 0)
    	{
    		$age_in_months = null;
    	}
    	elseif($age_in_months == 1)
    	{
    		$age_in_months = $age_in_months." Month";
    	}
    	else
    	{
    		$age_in_months = $age_in_months." Months";
    	}

    	if($age_in_days == 0){
    		$age_in_days = null;
    	}
    	elseif($age_in_days == 1){
    		$age_in_days = $age_in_days." Day";
    	}
    	else{
    		$age_in_days = $age_in_days." Days";
    	}

    	//$final_age = $age_in_years.' '.$age_in_months. ' '.$age_in_days;
        if($age_in_years=== null)
        {
            if($age_in_months === null)
            {
                $final_age = $age_in_days;
            }
            else
            {
                $final_age = $age_in_months;
            }
          
        }
        else
        {
            $final_age = $age_in_years;
        }
    	//echo "Year of Birth: $year_today";
    	return $final_age;
    }
    		////
            ///			
			$my_age = get_age('2020-04-02');
        // if($age_in_years==0){
        //     echo $age_in_months;
        // }elseif ($age_in_months==0) {
        //     echo $age_in_days;
        // }
        echo "Your Age is: $my_age";
?>
							
				
