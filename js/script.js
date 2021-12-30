//Gio hang
$(document).ready(function(){
    DisplayData();
    function DisplayData(){
        $.ajax({
            url: "./include/giohang.php",
            success: function(response){
                $('#gio_hang').html(response);
            }
        })
    }
    $(document).on('click', '#them_mon', function(){
        var id_mon = $(this).attr('id_mon');
          $.ajax({
            url: "./include/themmon.php",
            type: 'POST',
            data: {
              id_mon: id_mon
            },
            success: function(response){
                DisplayData();    
            }
            });
        });

    $(document).on('click', '#xoa_mon', function(){
        var id_mon = $(this).attr('id_mon');
        $.ajax({
            url: "./include/xoamon.php",
            type: 'POST',
            data: {
                id_mon: id_mon
            },
            success: function(response){
                DisplayData();    
            }
            });
        });

    $(document).on('click','#tang_sl', function(){
        var id_mon = $(this).attr('id_mon');
        $.ajax({
            url: "./include/tangsoluong.php",
            type: 'POST',
            data: {
                id_mon: id_mon
            },
            success: function(response){
                DisplayData();    
            }
            });
    });
    $(document).on('click','#giam_sl', function(){
        var id_mon = $(this).attr('id_mon');
        $.ajax({
            url: "./include/giamsoluong.php",
            type: 'POST',
            data: {
                id_mon: id_mon
            },
            success: function(response){
                DisplayData();    
            }
            });
        });

});
