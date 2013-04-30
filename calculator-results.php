<?php 

// variables $_GET from calculate.php
$sex = $_GET["sex"];
$hours =  $_GET["hours"]; 
$minutes =  $_GET["minutes"]; 
$seconds =  $_GET["seconds"];
$weight =  $_GET["weight"];
$mph =  $_GET["mph"];
$effort =  $_GET["effort"];
$age = $_GET["age"];


// gender variables 
$male = 1.6;
$female = 1.1;
$maleCalories = 2300;
$femaleCalories = 1950;


// gender if else to decide output
if ($sex == "Male") {
     $sex = $male;
     $calorieValue = $maleCalories;    
}
else {
     $sex = $female;
     $calorieValue = $femaleCalories;
}


// if/else to determine if user inputed mph or effort - goes into $runnerSpeed
if ($mph == 0){
    $runnerSpeed = $effort;  
}
else {
    $runnerSpeed = $mph;
}


// putting time values into a single number with decimal
$totaltime = $hours * 60 + $minutes + $seconds/60;


// THE CALORIE FORMULA, pretty average based on the calculators I tried
$calorieCalc = $weight * .0120 * $totaltime * $sex * $runnerSpeed + $age;

        
// variables to calculate after calories
$skittles = $calorieCalc / 4.3;
$pepsi = $calorieCalc / 12.5;
$bluemoon = $calorieCalc / 14.5;
$chocomilk = $calorieCalc / 23.5;
$oreos = $calorieCalc / 70;
$pizza = $calorieCalc / 210;
$mandms = $calorieCalc / 240;
$donut = $calorieCalc / 260;
$icecream = $calorieCalc / 300;


// percentage bar variables
$max = 2150;
$scale = 4.0;


// get Percentage out of 100 $calVal is based on gender input
if ( !empty($max) ) { 
    $percent = ($calorieCalc * 100) / $calorieValue;    
} 
else { 
    $percent = 0;     
}


// limit to 100 percent (if more than the max is inputed)
if ( $percent > 100 ) { 
    $percent = 100;   
}

// omg it's so messy I can't even look.
// if else to display the results, cannot submit blank form
if ($hours + $minutes + $seconds > 0 && $runnerSpeed > 0) {
    // header
    echo '<h1>', "Results",'</h1>';
    
    // was going to show minutes but it's not really revelant since you entered the info
   // echo '<h2>',"You ran for a total of: ", number_format($totaltime,2) . " minutes","<br><br />";
    /* "<strong>". ($hours * 60 + $minutes) . " minutes and " , ($seconds) . "</strong>", */
    
    // shows calories
    echo "<h2>", "You burned about ", "<strong>", '<span style="color:#fb933a">' . number_format($calorieCalc, 0) . 
            "</strong>", '</span>', " calories!" ,'</h2>';
    
    
    // if/else to give text for the number of calories burned
     echo '<div id="col1-2">';
    
    // displays stars and text based on $caloriesCalc
    switch ($calorieCalc) {
        
     case $calorieCalc <= 100:
          echo '<h3 style="text-align:center">',"Not bad for a walk, for a run.. well..",'<br>','</h3>'; 
          echo '<img class="stars" src="images/1star.png" alt="1star"/>';  
          break;
        
     case $calorieCalc <= 150:
          echo '<h3 style="text-align:center">',"Try to workout a little longer next time!",'<br>','</h3>'; 
          echo '<img class="stars" src="images/1star.png" alt="1star"/>';  
          break;
      
       case $calorieCalc <= 250:
          echo '<h3 style="text-align:center">',"Way to go, next time try 15 more minutes!",'<br>','</h3>'; 
          echo '<img class="stars" src="images/2star.png" alt="2star"/>';  
          break;
     
     case $calorieCalc <= 300:
          echo '<h3 style="text-align:center">',"Great start, maybe go for 10 more minutes!",'<br>','</h3>'; 
          echo '<img class="stars" src="images/2star.png" alt="2star"/>';  
          break;
      
        case $calorieCalc <= 400:
          echo '<h3 style="text-align:center">',"Not too bad!  Keep it up!",'<br>','</h3>'; 
          echo '<img class="stars" src="images/3star.png" alt="3star"/>';  
          break; 
      
       case $calorieCalc <= 550:
          echo '<h3 style="text-align:center">',"Wow, that was an amazing workout!",'<br>','</h3>';
          echo '<img class="stars" src="images/4star.png" alt="4star"/>';  
          break; 
      
      case $calorieCalc <= 700:
          echo '<h3 style="text-align:center">',"You just burned some serious calories!",'<br>','</h3>';
          echo '<img class="stars" src="images/4star.png" alt="4star"/>';  
          break; 
      
      case $calorieCalc <= 850:
          echo '<h3 style="text-align:center">',"Do your friends call you rocky?",'<br>','</h3>';
          echo '<img class="stars" src="images/4star.png" alt="4star"/>';  
          break; 
     
       case $calorieCalc > 851:
          echo '<h3 style="text-align:center">',"YOU ARE AN ANIMAL!",'<br>','</h3>';
          echo '<img class="stars" src="images/5star.png" alt="5star"/>';  
          break;      
  } 
     // end of column 1 - going into HTML percentage bar
    echo '</div>';
   
    ?>
            
            
    <div id="col2-2" style="padding-bottom:40px;">        
    <h4 style="text-align:center">Approx. <strong>
    <?php echo number_format($percent); ?>%</strong> of your avg. daily caloric intake.</h4>    
    
    <div class="percentbar" style="width:<?php echo round(100 * $scale); ?>px;">
    <div style="width:<?php echo round($percent * $scale); ?>px;"></div>
    </div>
    </div>          
     
           <img src="images/line.png" alt="blackseparator" />       
                  
        <?php 
        
    // burned off
    echo '<h3 style="text-align:center;">', "<strong>","Since you burned off those calories,
            let's put them back on! <br />","</strong>","Here is what you can choose from:</h3>";
        
    // div for first column
    echo '<div id="col1">';
    echo '<h2 style="text-align:left;">', "Drinks", '</h2><hr />';
    echo '<h3 style="text-align:left;">', "", number_format($pepsi, 0) . " oz. of Pepsi. </h3>";
    echo '<h3 style="text-align:left;">', "", number_format($bluemoon, 0) . " oz. of Blue Moon. </h3>";
    echo '<h3 style="text-align:left;">', "", number_format($chocomilk, 0) . " oz. of 1% Chocolate Milk. </h3>",'</div>';
    
    // div for second column
    echo '<div id="col2">';
    echo '<h2 style="text-align:left;">', "Goodies", '</h2><hr />';
    echo '<h3 style="text-align:left;">', "", number_format($skittles, 0) . " Skittles. </h3>";
    echo '<h3 style="text-align:left;">', "", number_format($oreos, 1) . " double stuffed Oreos.", '</h3>';
    echo '<h3 style="text-align:left;">', "", number_format($mandms, 1) . " packets of plain M&M's.", '</h3>', '</div>';
    
    // div for third column
    echo '<div id="col3">';
    echo '<h2 style="text-align:left;">', "Junk Food", '</h2><hr />';
    echo '<h3 style="text-align:left;">', "", number_format($pizza, 1) . " pieces of cheese pizza. </h3>";
    echo '<h3 style="text-align:left;">', "", number_format($donut, 1) . " glazed donuts. </h3>";
    echo '<h3 style="text-align:left;">', "", number_format($icecream, 1) . " bowls of ice cream.", '</h3>','</div>';  
    }         
  
    // final else statement
 else {
     
    // page header for error
    echo '<h1>', "You broke it!",'</h1> ';
    
    // error message
    echo '<h3 style=text-align:center;>',"Silly Rabbit! Make sure you fill out all the fields!", "<br>",
             "<a href=EK_calculate.php>Try again.</a>",'</h3>';
 }
 
?>   
