/*
	flot-example.js
*/

$(document).ready(init);

function init() {
	$.plot(
		$("#data-1"),
		[
			{
				label: "Current 1",
				data: [ [0, 0], [1, 1], [2, 1], [3, 2] ],
				lines: {show: true},
				points: {show: true}
			},
			{
				label: "Voltage 1",
				data: [ [0, 3], [1, 5], [2, 8], [3, 13] ],
				lines: {show: true},
				points: {show: true}	
			}
		]
	);
	
	$.plot(
		$("#data-2"),
		[
			{
				label: "Current 2",
				data: [ [0, 0], [1, 1], [2, 1], [3, 2] ],
				lines: {show: true},
				points: {show: true}
			},
			{
				label: "Voltage 2",
				data: [ [0, 3], [1, 5], [2, 8], [3, 13] ],
				lines: {show: true},
				points: {show: true}	
			}
		]
	);
  

$.plot(
		$("#data-3"),
		[
			{
				label: "Current 3",
				data: [ [0, 0], [1, 1], [2, 1], [3, 2] ],
				lines: {show: true},
				points: {show: true}
			},
			{
				label: "Voltage 3",
				data: [ [0, 3], [1, 5], [2, 8], [3, 13] ],
				lines: {show: true},
				points: {show: true}	
			}
		]
	);

}


