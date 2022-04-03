function calendar() {
    var valid = true;
    var year = document.getElementById('year').value;
    var month = document.getElementById('month').value;
    if (year == '') {
        alert('Year field is empty');
        valid = false;
    }
    thisyear = new Date();
    curryear = thisyear.getFullYear();
    if (year < curryear) {
        alert('The time period before current time is not applicable.');
        valid = false;
    }
    if (month == '') {
        alert('Month field is empty');
        valid = false;
    }
    if(month < 1 || month >12){
        alert('Select month from 1-12');
        valid = false;
    }
    var getMonth = new Date(year, month - 1, 1);
    var blank = getMonth.getDay();
    var lastDay1 = new Date(year, month, 0);
    var lastDay = lastDay1.getDate();
    var here = '<table align=center style="border-radius:8px;margin-top:1%;text-align:center;background-color:black;font-size:24px;table-layout:fixed;width:90%;cursor:default;"><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr id="main">';
    for (j = 1; j <= blank; j++) {
        here += '<td style="background-color:black" style="cursor:default">' + '</td>';
    }
    for (var i = 1; i <= lastDay; i++) {
        here += '<td style="cursor:pointer" id="date" onclick="double(' + i + ');toggle();">' + i + '</td>';
        var checksat = new Date(year, month - 1, i);
        if(i==5){
            
        }
        var getting = checksat.getDay();
        if (getting == 6) {
            here += '</tr>';
        }
        if (i == lastDay) {
            here += '</table>';
        }
    }
    if (valid == true) {
        document.getElementById('displayer').innerHTML = here;  
    }
    
}

//onclick date   
function double(number) {
    // console.log('run');
    var year = document.getElementById('year').value;
    var month = document.getElementById('month').value;
    
    if(month<10){
        setMonth="0"+month;
    }
    else{
        setMonth=month;
    }
    var today=number;
    if(today<10){
        setToday="0"+today;
    }
    else{
        setToday=today;
    }
    var dateselected=year+"-"+setMonth+"-"+setToday;
    document.getElementById('chosen').value=dateselected;
    
    // var b = document.querySelector("td");
    // for(k=1;k<=45;k++){
    //     b.setAttribute("name",k);
    //     b.setAttribute("disabled", "");
    // }
}
function toggle(){
    
    var popup = document.getElementById("popup");
  if (popup.style.display === "block") {
    popup.style.display = "none";
    
  } else {
    popup.style.display = "block";
  }
  var eventError = document.getElementById("eventError");
  if (eventError.style.display === "block") {
    eventError.innerHTML = " ";
    

  }else {
    eventError.style.display = "block";
  
}
}

function success(){
    setTimeout(successTime,7000);
    
}
function successTime(){
    document.getElementById('success').style.display="none";
}