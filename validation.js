$(function(){

$("#regform").validate({

	rules:{
		email:{

			required:true,
			email:true
		}
	}
});

});