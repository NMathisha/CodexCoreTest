var employee={

    add:function(){

        var firstName=$('#f_name').val();
        var lastName=$('#l_name').val();
        var company = $('#company').val();
        var mail = $('#mail').val();
        var phone= $('#phone').val();
        var id=$('#hid').val();

        if(firstName==null||firstName==""){
            alert("Enter first name");
            return false;
        }
        if(lastName==null||lastName==""){
            alert("Enter Last name");
            return false;
        }
        if(company==null||company==""){
            alert("Enter Company name");
            return false;
        }
        if(mail==null||mail==""){
            alert("Enter Mail");
            return false;
        }
        if(phone==null||phone==""){
            alert("Enter Contact number");
            return false;
        }




        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/addEmployee",
            type:"POST",
            cache: false,
            data:{
                id:id,
                firstName:firstName,
                lastName:lastName,
                company:company,
                mail:mail,
                phone:phone

            },
            success:function(response){

                if(response=="success"){

                    alert('Saved')

                }else {
                    // $('#lblError').text(response);

                }

                location.reload(true);


            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



            }
        })

    },

    edit:function(id){




        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/showEmpEdit",
            type:"POST",
            cache: false,
            data:{

               id:id,

            },
            success:function(response){

                $('#f_name').val(response[0].first_name);
                $('#l_name').val(response[0].last_name);
                $('#company').val(response[0].company_id);
                $('#mail').val(response[0].email);
                $('#phone').val(response[0].phone);
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
            url:"/deleteemployee",
            type:"POST",
            cache: false,
            data:{

               id:id,

            },
            success:function(response){
                if(response=="success"){
                    alert('Deleted')
                }

                location.reload();


            },error: function (xhr) {
                console.log(alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText));
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);



            }
        })

    }
    }

}
