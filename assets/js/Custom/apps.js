/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $.ajax({
   url:"../../ModelE/Reports/Reports.php",   
   method:"GET",
   success: function(data){
//       console.log(data);
       var name = [];
       var amount = [];
       for(var i in data){
           name.push("Employee: " + data[i].name);
           amount.push(data[i].amount);
//           console.log(name);
       }
       
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function() {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
        };
       
       var chartdata = {
           labels: name,
           datasets:[
               {
                    label: "Employee Bonus ",
                     backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//                    borderColor:'rga(200, 200, 200, 0.75)',
//                    hoverBackgroundColor:'rgba(220,220,220,0.5)',
//                    hoverBorderColor:'rga(200, 200, 200, 1)',
                    borderWidth: 2,
                    borderColor: 'pink',
                    borderSkipped: 'bottom',
                    data:amount
               }
           ]
       };
       
       
       var ctx = $("#canvas");
       
       var barGraph = new Chart(ctx,{
//            type:'doughnut',
            type:'bar',
           data: chartdata,
           
           options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each bar to be 2px wide and green
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'right'
                    },
                    title: {
                        display: true,
                        text: 'Magic Resource'
                    }
                    
                }
           
       });
       
   },
   error:function(data){
       console.log("Error");
       console.log(data);
   }
   }); 
   
});
 