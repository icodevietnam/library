$(function() {
	displayTable();
	
	$("#newItemForm").validate({
		rules : {
			name:{
				required:true
			},
			description:{
				required:true
			},
			code : {
				required : true,
				remote : {
					url : DIR +'category/checkCode',
					type : 'GET',
					data : {
						code : function(){
							return $('#newItemForm .code').val();
						}
					}
				}
			}
		},
		messages : {
			name:{
				required:"Name is not blank"
			},
			description:{
				required:"Description is not blank"
			},
			code : {
				required : "Code is not blank",
				remote :  "Code is existed"
			}
		},
	});
	
	$("#updateItemForm").validate({
		rules : {
			name:{
				required:true
			},
			description:{
				required:true
			},
			code : {
				required : true
			}
		},
		messages : {
			name:{
				required:"Name is not blank"
			},
			description:{
				required:"Description is not blank"
			},
			code : {
				required : "Code is not blank"
			}
		},
	});
});

function displayTable() {
	var dataItems = [];
	$.ajax({
		url : DIR +"category/getAll",
		type : "GET",
		dataType : "JSON",
		success : function(response) {
			var i = 0;
			$.each(response, function(key, value) {
				i++;
				dataItems.push([
						i,
						value.name,value.description,value.code,
						"<button class='btn btn-sm btn-primary' onclick='getItem("
								+ value.id + ");' >Edit</button>",
						"<button class='btn btn-sm btn-danger' onclick='deleteItem("
								+ value.id + ");'>Delete</button>" ]);
			});
			$('#tblItems').dataTable({
				"bDestroy" : true,
				"bSort" : true,
				"bFilter" : true,
				"bLengthChange" : true,
				"bPaginate" : true,
				"sDom" : '<"top">rt<"bottom"flp><"clear">',
				"aaData" : dataItems,
				"aaSorting" : [],
				"aoColumns" : [ {
					"sTitle" : "No"
				}, {
					"sTitle" : "Name"
				}, {
					"sTitle" : "Description"
				}, {
					"sTitle" : "Code"
				}, {
					"sTitle" : "Edit"
				}, {
					"sTitle" : "Delete"
				} ]
			});
		}
	});
}

function getItem(id) {
	$.ajax({
		url : DIR +"category/get",
		type : "GET",
		data : {
			itemId : id
		},
		dataType : "JSON",
		success : function(data) {
			$.each(data, function(key, value) {
				$("#updateItemForm .id").val(value.id);
				$("#updateItemForm .name").val(value.name);
				$("#updateItemForm .description").val(value.description);
				$("#updateItemForm .code").val(value.code);
			})	
		},
		complete : function(){
			$("#updateItem").modal("show");
		},
		error: function (request, status, error) {
        	alert(request.responseText);
    	}
	});
}

function deleteItem(id) {
	if (confirm("Are you sure you want to proceed?") == true) {
		$.ajax({
			url : DIR +"category/delete",
			type : "POST",
			data : {
				itemId : id
			},
			dataType : "JSON",
			success : function(response) {
			},
			complete : function(){
				displayTable();
			}
		});
	}
}

function update() {
	if($("#updateItemForm").valid()){
		var id = $("#updateItemForm .id").val();
		var name = $("#updateItemForm .name").val();
		var description = $("#updateItemForm .description").val();
		var code = $("#updateItemForm .code").val();
		$.ajax({
			url : DIR +"category/update",
			type : "POST",
			data : {
				id : id,
				name : name,
				description : description,
				code : code
			},
			dataType : "JSON",
			success : function(response) {
			},
			complete:function(){
				displayTable();
				$("#updateItemForm .id").val("");
				$("#updateItemForm .name").val("");
				$("#updateItemForm .description").val("");
				$("#updateItemForm .code").val("");
				$("#updateItem").modal("hide");
			}
		});
	}
}

function insertItem() {
	if($("#newItemForm").valid()){
		var name = $("#newItemForm .name").val();
		var description = $("#newItemForm .description").val();
		var code = $("#newItemForm .code").val();
		$.ajax({
			url : DIR +"category/add",
			type : "POST",
			data : {
				name : name,
				description : description,
				code : code
			},
			dataType : "JSON",
			success : function(response) {
			},
			complete : function(){
				displayTable();
				$("#newItem").modal("hide");
				$("#newItemForm .name").val("");
				$("#newItemForm .description").val("");
				$("#newItemForm .code").val("");
			}
		});
	}
}
