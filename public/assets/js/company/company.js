var company={

    edit:function(id){




        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/showedit",
            type:"POST",
            cache: false,
            data:{

               id:id,

            },
            success:function(response){

                $('#name').val(response[0].name);
                $('#mail').val(response[0].email);
                $('#web').val(response[0].website);
                $('#hid').val(response[0].id);


            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



            }
        })

    },
    delete:function(id){

        var confirmation = confirm("Are you sure ? ");
        if (confirmation) {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/deletecompany",
            type:"POST",
            cache: false,
            data:{

               id:id,

            },
            success:function(response){
                if(response=="success")
                {
                    alert("Deleted");
                }

                location.reload();




            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



            }
        })



    }

},
logout:function(id){



    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:"/logout",
        type:"POST",
        cache: false,
        data:{

           id:id,

        },
        success:function(response){

            if(response=="success"){
                location.href = '/';
            }




        },error: function (xhr) {
            console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



        }
    })



}

}




