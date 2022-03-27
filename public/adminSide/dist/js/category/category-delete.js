
function deleteRow(id,url){
    if(confirm('Bạn có chắn chắn xóa không')){
        $.ajax({
            type:'DELETE',
            dataType:'JSON',
            data: { id },
            url: url,
            success: function(result){
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }
                else{
                    alert('Xóa không thành công')
                }
            }
        })
    }
}
