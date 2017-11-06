$(function(){
	$('#fork').on('click',function(){
		receipt_id = $(this).attr('data-receipt_id');
		assign_id = $(this).attr('data-assign_id');
		if(assign_id == null){
			location.reload();
		}
		else{
			$.ajax({
				url:'/detail/' + receipt_id + '/fork',
				type:'post',
				data:{'receipt_id':receipt_id,'assign_id':assign_id},
				success:function(data){
					if(data.id){
						alertify.notify('Fork thành công', 'success', 5, function() {});
						swal('Fork thành công');
                		window.location.href = document.location.origin + '/detail/' + receipt_id + '/fork/' + data.id;
					}
				} 
			});
		}
	});
});
