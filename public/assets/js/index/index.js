var index ={
    savedata:function()
    {
        var start_date=$('#s_date').val();
        var end_date=$('#e_date').val();
        var sub=$('#sub').val();
        var c_name=$('#c_name').val();
        var hid=$('#hid').val()
        var d = new Date();
        var date=d.getDate();

        if(start_date<end_date||date<end_date)
        {
            $("#username").addClass('error');
        }else {
            $("#username").removeClass('error');
        }


        if(c_name==""||c_name==null)
        {
            $("#c_name").addClass('error');
        }else {
            $("#c_name").removeClass('error');
        }



        

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/qrmanager/save",
            type:"POST",
            cache: false,   
            data:{  
                s_date:start_date,
                e_date:end_date,
                sub:sub,
                c_name:c_name,
                hid:hid
            },      
            success:function(response){ 
               
                location.reload(true);            
            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        })


    },
    deletedata:function(id)
    {

        if(confirm("Do you want to delete")){ 
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/qrmanager/delete/"+id,
            type:"POST",
            cache: false,   
            data:{  
           
            },      
            success:function(response){ 
            
                location.reload(true);            
            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        })

    }},

    update:function(id)
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/qrmanager/update/"+id,
            type:"POST",
            cache: false,   
            data:{  
           
            },      
            success:function(response){ 

                $('#s_date').val(response[0].subscription_started_date);
                $( "#s_date" ).prop("disabled", true );
 
                $('#e_date').val(response[0].subscription_end_date);
                $('#sub').val(response[0].subscription_type);
                $('#c_name').val(response[0].company_name);
                $('#hid').val(response[0].id);
                $('#savedata').attr('disabled', false);

                      
            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        })



    },
    copytoClipboard:function(value)
    {
    
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
    
    },

    reset:function(){

        $('#savedata').attr('disabled', true);
        $("#s_date" ).prop("disabled", false );
        $('#s_date').val('');
        $('#e_date').val('');
        $('#sub').val('');
        $('#c_name').val('');

    }
 
        
}

$(document).ready(function(){
    var start_date=$('#s_date').val();
    var end_date=$('#e_date').val();
    var sub=$('#sub').val();
    var c_name=$('#c_name').val();


    $('#savedata').attr('disabled', true);
    $('#sub').change(function () {
        if (start_date != '' && end_date != '' && sub != '' && c_name != '') {
            $('#savedata').attr('disabled', true);
        } else {
            $('#savedata').attr('disabled', false);
        }
    });

});
   


  