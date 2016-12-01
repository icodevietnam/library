$(function(){
	var formName = '#profileForm';
	var form = $(formName);

	$(formName + " .avatar").change(function(){
    	checkImage(this,formName);
	});

	form.validate({
		rules : {
			fullname:{
				required:true
			},
			email :{
				required: true,
			}
		},
		messages : {
			fullname:{
				required:"fullname is not blank"
			},
			email:{
				required:"Email is not blank"
			},
		},
	});
});

function changeProfile(){
	var form = $('#profileForm');
	var formData =  new FormData(form[0]);
	if(form.valid()){
		$.ajax({
			url : DIR +"user/change-profile",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
				if(response == true){
					$('.alert-info').text("Change Profile Successfully.").show().delay(5000).fadeOut();
				}else{
					$('.alert-danger').text("Change Profile Fail.").show().delay(5000).fadeOut();
				}
			},
			complete:function(){
			},
			error: function (request, status, error) {
        		alert(request.responseText);
    		}
		});
	}
}

function checkImage(input,form){
		var formD = $(form);
		var formData =  new FormData(formD[0]);
		$.ajax({
			url : DIR +"file/checkAvatar",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
				alert(response);
				if(response === 'wrong-file' ){
					$('#image-error').text("File belongs Document type : jpg, jpeg, png, bmp .").show().delay(5000).fadeOut();
					$( form + ' .image').val('');
				}
				if(response === 'wrong-size' ){
					$('#image-error').text("Size is larger than default size .").show().delay(5000).fadeOut();
					$(form + ' .image').val('');
				}
				if(response === 'true'){
					$('#image-error').text("File is attached.").show().delay(10000).fadeOut();
					if (input.files && input.files[0]) {
				        var reader = new FileReader();

				        reader.onload = function (e) {
				            $('.preview').attr('src', e.target.result);
				        }

				        reader.readAsDataURL(input.files[0]);
   					}
				}
			}
		});
	}