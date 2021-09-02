var login={

    login:function(){

        var mail=$('#email').val();
        var password=$('#password').val();


        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/UserLogin",
            type:"POST",
            cache: false,
            data:{
            mail:mail,
            password:password
            },
            success:function(response){

                if(response=="success"){

                    location.href = '/Companies';

                }else {
                    // $('#lblError').text(response);

                }


            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



            }
        })

    }


}
