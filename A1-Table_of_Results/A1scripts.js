function myFunction() {
   var mytable = document.getElementById("students");
   
   for (var i = 1; i < mytable.rows.length; i++) {
     var cells = mytable.rows[i].cells;
     var sum = 0;
		 var counter = 0;
     
     for (var j = 2; j < (cells.length-1); j++) {
       var cell = cells[j];
       var add = parseInt(cell.innerHTML);
       if(!isNaN(add)) {
          sum = sum + add;
          counter++;
       }
     }
     
     var average = sum / counter;
     
       mytable.rows[i].cells[7].innerHTML = "<td>" + Math.round(average) + "%"+ "</td>";
       
       if(average<40){
       mytable.rows[i].cells[7].style.backgroundColor="red";
       mytable.rows[i].cells[7].style.color ="white";
       }
       
   }
 }

document.getElementById('myFunction').onclick = myFunction;



