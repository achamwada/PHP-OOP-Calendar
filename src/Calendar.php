	<?php

include "CalendarInterface.php";

class Calendar implements Calendar\CalendarInterface
{
    private $month;
    private $year;
    private $day;
    
    public function __construct($date_time)
    {
        
        $time_arry = explode(",", $date_time);
        $this->setVar("year", $time_arry[2]);
        $this->setVar("month", $time_arry[1]);
        $this->setVar("day", $time_arry[0]);
        $this->getVar("year");
        $this->getVar("month");
        $this->getVar("day");
        
    }
    
    public function setVar($key, $value)
    {
        
        switch ($key) {
            case "month":
                $this->month = $value;
                break;
            
            case "year":
                $this->year = $value;
                break;
            
            case "day":
                $this->day = $value;
                break;
        }
    }
    
    public function getVar($key)
    {
        switch ($key) {
            
            case "month":
                return $this->month;
                break;
            
            case "year":
                return $this->year;
                break;
            
            case "day":
                return $this->day;
                break;
                
        }
    }
    
    public function getDay()
    {
        
        echo "<h2>Today is " . date("l jS \of F Y h:i:s A</h2>");
        
    }
    
    public function getWeekDay()
    {
        $myday = date("l");
        return $myday;
        
    }
    
    public function getFirstWeek()
    {
        $ddate = "$this->day-$this->month-$this->year";
        $date  = new DateTime($ddate);
        $week  = $date->format("W");
        echo "<h2>The week number is: $week </h2>";
    }
    
    public function getFirstWeekDay()
    {
        $first_day    = 1;
        $FirstWeekDay = date("l", mktime(0, 0, 0, $this->month, $first_day, $this->year));
        echo "<h2>" . $FirstWeekDay . " is the First WeekDay of the month $this->month and year is $this->year </h2>";
    }
    
    public function getNumberOfDaysInThisMonth()
    {
        $myday        = 15;
        $number       = date("t", mktime(0, 0, 0, $this->month, $myday, $this->year));
        $actual_month = date("F", mktime(0, 0, 0, $this->month, $myday, $this->year));
        echo "<h2>There are $number days in $actual_month $this->year </h2>";
        
    }
    
    public function getNumberOfDaysInPreviousMonth()
    {
        $myMonth        = $this->month - 1;
        $myday          = 1;
        $number         = date("t", mktime(0, 0, 0, $myMonth, 15, $this->year));
        $previous_month = date("F", mktime(0, 0, 0, $myMonth, 15, $this->year));
        $actual_month   = date("F", mktime(0, 0, 0, $myMonth + 1, 15, $this->year));
        echo "<h2>There are $number days in $previous_month $this->year which is the previous month from $actual_month $this->year</h2>";
    }
    
    public function getCalendar()
    {
        
        $month = $this->month;
        $year  = $this->year;
        
        $my_cal_period     = date("F", mktime(0, 0, 0, $month, 15, $year));
        
        $headings = ['Sun','Mon','Tue','Wed','Thur','Fri', 'Sat'];
        $week_days         = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month     = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter       = 0;
        $dates_array       = [];
        
        $calendar = '<h1>Calendar for ' . $my_cal_period . '  ' . $year . '<h1><table cellpadding="0" cellspacing="0" class="calendar table">';
        $calendar .= '<tr class="cal_row"><td class="day_names">' . implode('</td><td class="day_names">', $headings) . '</td></tr>';
        $calendar .= '<tr class="cal_row">';
        for ($x = 0; $x < $week_days; $x++) {
            $calendar .= '<td class="day_section-np"> </td>';
            $days_in_this_week++;
        }
        
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++) {
            $calendar .= '<td class="day_section">';
            $calendar .= '<div class="cal_actual_day">' . $list_day . '</div>';
            $calendar .= str_repeat('<p> </p>', 2);
            $calendar .= '</td>';
            if ($week_days == 6) {
                $calendar .= '</tr>';
                if (($day_counter + 1) != $days_in_month) {
                    $calendar .= '<tr class="cal_row">';
                }
                $week_days         = -1;
                $days_in_this_week = 0;
            }
            $days_in_this_week++;
            $week_days++;
            $day_counter++;
        }
        if ($days_in_this_week < 8) {
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++) {
                $calendar .= '<td class="day_section-np"> </td>';
            }
            
        }
        
        $calendar .= '</tr>';
        $calendar .= '</table>';
        return $calendar;
    }
    
    
    
}

?>
