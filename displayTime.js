setInterval(displayTime,1000);
function displayTime(){
    vtime = new Date();
    year = vtime.getFullYear();
    month = vtime.getMonth();
    dat = vtime.getDate();
    day = vtime.getDay();
    hour = vtime.getHours();
    minutes = vtime.getMinutes();
    seconds = vtime.getSeconds();
    ap='AM';

    switch(month){
        case 0:
            month='January';
            break;
        case 1:
            month='February';
            break;
        case 2:
            month='March';
            break;
        case 3:
            month='April';
          break;
        case 4:
            month='May';
            break;
        case 5:
            month='June';
            break;
        case 6:
            month='July';
            break;
        case 7:
            month='August';
            break;
        case 8:
            month='September';
            break;
        case 9:
            month='October';
            break;
        case 10:
            month='November';
            break;
        case 11:
            month='December';
            break;
    }

    switch(day){
        case 0:
            day='Sunday';
            break;
        case 1:
            day='Monday';
            break;
        case 2:
            day='Tuesday';
            break;
        case 3:
            day='Wednesday';
            break;        
        case 4:
            day='Thursday';
            break;
        case 5:
            day='Friday';
            break;    
        case 6:
            day='Saturday';
            break;     
    }
    if(hour > 12){
        hour = hour-12;
        ap = 'PM';
    }
    if(hour == 0){
        hour = 12;
        ap = 'AM';
    }


    
    theTime = year+"<br>"+month+" "+dat+"<br>"+day+"<br>"+hour+":"+minutes+":"+seconds+" "+ap;
    document.getElementById("time").innerHTML=theTime;
}

