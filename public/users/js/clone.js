$(function(){
    $('#clone').on('click',function(){
        receipt_id = $(this).attr('data-receipt_id');
        user_id = $(this).attr('data-user_id');
        if(user_id == null){
            location.reload();
        }
        $.ajax({
            url:'/detail/' + receipt_id + '/clone',
            type:'post',
            data:{'receipt_id':receipt_id,'user_id':user_id},
            success:function(data){
                if(data.id){
                    alertify.notify('Clone thành công', 'success', 5, function() {});
                    swal('Clone thành công');
                    window.location.href = document.location.origin + '/create-receipt/' + data.id;
                }
            } 
        });
    });
});
