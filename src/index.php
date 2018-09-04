<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Calendar</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <h1 style="color:#337ab7">Calendar</h1>
         </div>
         <div class="row">
            <div class="col-md-6 ">
               <?php
                  include "Calendar.php";
                  
                  if(isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])){
                         $my_date = $_GET['day'].",". $_GET['month'].",".$_GET['year'];
                     }else{
                          $my_date = "22,7,2017";
                          $time_arry = explode(",",$my_date);
                        }
                  
                  
                  if($_GET['year']<0){
                  //$year = $_GET['year'];
                   
                   // header('Location: http://{path}/CalendarTest-master/src/index.php');
                   echo "<a href='http://{path}/CalendarTest-master/src/index.php?year=2017&&month=1&&day=15'>Click here to go to the homepage</a>";
                    exit();
                     }
                  
                  if($_GET['year']>9999){
                  
                  echo "<a href='http://{path}/CalendarTest-master/src/index.php?year=2017&&month=1&&day=15'>Click here to go to the homepage</a>";
                  
                  exit();
                     }
                  
                   $test = new Calendar($my_date);
                   $test->getDay();
                   echo "<h2>".$test->getWeekDay()." is the DAY name for today</h2>";
                   $test->getFirstWeekDay();
                   $test->getFirstWeek();
                   $test->getNumberOfDaysInThisMonth();
                   $test->getNumberOfDaysInPreviousMonth();
                  
                    ?>
            </div>
            <div class="col-md-6"><?php echo $test->getCalendar(); ?>
               <a  href="http://{path}/CalendarTest-master/src/index.php?year=<?php if($_GET['month']<2){ echo $_GET['year']-1;}else{echo $_GET['year'];}?>&&month=<?php if($_GET['month']<2){ echo 12;}else{echo $_GET['month']-1;}?>&&day=21" class="btn btn-primary btn-lg  click_dec " data-pre="1">Prev</a>
               <a  href="http://{path}/CalendarTest-master/src/index.php?year=<?php if($_GET['month']>11){ echo $_GET['year']+1;}else{echo $_GET['year'];}?>&&month=<?php if($_GET['month']>11){ echo 1;}else{echo $_GET['month']+1;}?>&&day=21" class="btn btn-primary btn-lg  click_inc mov_left" data-next="1">Next</a>
            </div>
         </div>
      </div>
   </body>
</html>
