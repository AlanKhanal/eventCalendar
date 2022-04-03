<!--<?php
     //require ('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>myEvent calendar</title>
    <link rel="stylesheet" href="cal.css">
    <link rel="stylesheet" href="calbody.css">
    <link rel="stylesheet" href="cal_main_body.css">

    
</head>
<body>
    <div class="nav">
        <div></div>
        <ul type="none">
            <div><li><a href="home.php">Home</a></li></div>
            <div><li><a href="events.php">Events</a></li></div>
            <div><li><a href="aboutus.php">About Us</a></li></div>
            <div><li><a href="login.php">Login</a></li></div>
        </ul>
    </div>
    <div class="cal-body">
        <div class="cal-body-display">
            <u>TIME</u> 
            <div class="cal-body-display-up" id="time">
                <script src="displayTime.js"></script>
            </div>
            
            <div class="cal-body-display-down">
                
            </div>
        </div>

        <div class="cal-body-main" id="calendar">
            <div class="cal-body-main-year">
                <div><button><</button></div>
                <div id="theYear">
                    <div></div>
                </div>
                <div><button>></button></div>
            </div>
            
            <div class="cal-body-main-month">
                <div><button><</button></div>
                <div id="theMonth">
                    <div></div>
                </div>
                <div><button>></button></div>
            </div>
            <div id="theDates">
                <table align=center border=2px>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td colspan=4></td>
                    </tr>
                </table>
            </div>
            <div class=foot><b>!! Login to manage events !!</b></div>
        </div>
       
       <div class="cal-body-event">
           <u>EVENT</u>
               <ul class="event-list" type=none>
                   <li>Events are displayed here</li>
               </ul>
        </div>
    </div>
</body>
</html>

<?php
    require ('footer.php');
?>

<script src="calendar.js"></script>
