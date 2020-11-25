// ユーザ新規登録時に、すでに登録されているユーザ名と被っていないかチェック
$(function() {
    $('#userName').blur(function() {
        var check_str = $(this).val();
        if(check_str){
            $.ajax({
                url: 'ajax_check.php',
                type:"POST",
                data:{
                    username: check_str,
                }
            }).done(function(data){
                if(data == 1){
                    alert('そのユーザ名は既に登録されています');
                    $('#userName').val('');
                }
            })
        }
    });
});