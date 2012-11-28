// This code will handle the data graph tab


$(document).ready(function () {
	initGraph();
});


var initGraph = function () {
	//testGraph();
	setTimerForGraphUpdates();
}

var setTimerForGraphUpdates = function(){// this function will set a timer to update the graph
	var test = window.setInterval(populateGraph,2000);
}

var populateGraph = function () {// get the latest data and update the graphs
	var data = [];
    var placeholder = "#data-";
    var dataurl = CI.base_url + 'getBatteryInfo.php';
 
    // then fetch the data with jQuery
    function onDataReceived(series) {
    	for (var i = 0; i < series.id.length; i++) {
    		var id = series.id[i];
            $("#v" + id).text(series.voltages[i][0][1] + " V");
    		$("#i" + id).text(series.currents[i][0][1] + " A");
    		$("#p" + id).text(series.power[i][0][1]    + " W");
    		$("#t" + id).text(series.temp[i] [0][1]    + " F");
    		plotGraph(placeholder + id,series.voltages[i],series.currents[i]);	
    	};
        
     }
    
    $.ajax({
        url: dataurl,
        method: 'GET',
        dataType: 'json',
        success: onDataReceived
   });
//window.alert("This is a timinng interval");
}

function plotGraph(divName,voltages,currents) {
	var div = divName;
	var options = { 
		grid: {backgroundColor: { colors: ["#000", "#999"]} }
	};

	$.plot(
		$(div),
		[
			{
				label: "Current",
				data: currents,
				lines: {show: true},
				points: {show: true},
				color: "#FF6600" 
			},
			{
				label: "Voltage",
				data: voltages,
				lines: {show: true},
				points: {show: true},	
				color:"#3300FF" 
			}
		],options
	);	
}

var generateRandomData = function () {
	//get some random values 
	var val =0;
	var data = [];

	for (var i = 0; i < 10; i++) {
		val = Math.floor(Math.random()*11);	
		data.push([i,val]);

	}
	return data;
}



function testGraph(){
    var point1 = generateRandomData();
	var point2 = generateRandomData();
	plotGraph("data-1",point1,point2);
	point1 = generateRandomData();
	point2 = generateRandomData();
	plotGraph("data-2",point1,point2);
	point1 = generateRandomData();
	point2 = generateRandomData();
	plotGraph("data-3",point1,point2);

}


