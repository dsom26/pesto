// Call the dataTables jQuery plugin
$(document).ready(function () {
	var table = new DataTable("#dataTable", {
		stateSave: true,
		dom: "Bfrtip",
		buttons: [
			"copyHtml5",
			"excelHtml5",
			//'csvHtml5',
			//'pdfHtml5'
		],
		order: [[0, "desc"]],
		pageLength: 25,
	});
});
