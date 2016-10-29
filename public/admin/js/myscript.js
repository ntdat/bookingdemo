
$(document).ready(function() {
    // AJAX ADD NEW USER
    var baseUrl = document.location.origin;
    $('#adduser').on('click',function(){

        var token =$('input[name=_token]').val();
        var username =$('input[name=txtUsername]').val();
        var first_name =$('input[name=txtfirstname]').val();
        var last_name = $('input[name=txtlastname]').val();
        var pass = $('input[name=pass]').val();
        var email =$('input[name=txtEmail]').val();
        var level =$('input[name=rdoLevel]:checked').val();
        $.ajax({
                url:baseUrl+'/admin/user/add',
                type:'POST',
                dataType:'JSON',
                data:{_token:token,fname:first_name,lname:last_name,email:email,pass:pass,username:username,level:level},
                success:function(data){
                    alert(username+ " Added Successful !!! ");
                    location.reload()
                },
            });
        return false;
    });
    // AJAX LOAD AND EDIT USER
    $('.edituser').on('click',function() {
        var id = $(this).attr('data-id');
        var text = $(this).text();
        var token = $(this).attr('data-token');

        $.ajax({
            url:baseUrl+'/admin/user/getedit',
            type:'POST',
            dataType:'JSON',
            data:{id:id,_token:token},
            success:function(data){
                if(data !=""){
                    $("input[name=eLevel]").each(function() {
                       if($(this).val()==data.role)
                       {
                           $(this).prop( "checked", true );
                       }
                    });

                    $("#myModalLabel").text('Edit User : '+data.username+'');
                    $('input[name=firstname]').val(data.first_name);
                    $('input[name=lastname]').val(data.last_name);
                    $('input[name=Username]').val(data.username);
                    $('input[name=Email]').val(data.email);


                }
            }
        });

        $('#edituser').on('click',function() {
            var username =$('input[name=Username]').val();
            var token =$('input[name=_token]').val();
            var first_name =$('input[name=firstname]').val();
            var last_name = $('input[name=lastname]').val();
            var email =$('input[name=Email]').val();
            var level =$('input[name=eLevel]:checked').val();
            $.ajax({
                url:baseUrl+'/admin/user/postedit',
                type:'POST',
                dataType:'JSON',
                data:{_token:token,id:id,fname:first_name,lname:last_name,email:email,username:username,level:level},
                success:function(data){
                    $('.username'+id).text(data.username);
                    if(data.level !=""){
                        $('.role'+id).text(data.level);
                    }
                    alert(" Succesfully !!!");
                    $('#modaledituser').modal('hide');


                },
            });
            return false;
        });
    });

    // AJAX DELETE USE
    $('.deleteuser').on('click',function() {
        var pathname = window.location.pathname;
        var link = $(this).attr('data-link');
        var url=baseUrl+"/admin/"+link+"/delete";
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var token = $(this).attr('data-token');
        if(confirm("Are you sure you want to delete "+link+": "+ name+" ?")){

            $.ajax({
                url:url,
                type:'POST',
                dataType:'JSON',
                data:{id:id,_token:token},
                success:function(data)
                {
                    alert(name+" Deleted successfuly!!!");
                    location.reload();
                }

            });
            return false
        }
    });
        $('.adduser').on('hidden.bs.modal', function () {
        $('.password1').show();
        $(".updateuser").attr('id','adduser');
        $(this).find("input,textarea,select").val('').end();

    });
    // update user
    // BOOKING CALENDAR
    $('i.fa-calendar').on('click',function(){
       var  id= $(this).attr('data-id');

        $('#myModal').on('show.bs.modal', function () {
           $(".calendar12").attr("id","calendar"+id);
        })
        $('#myModal').on('shown.bs.modal', function () {
            $('#calendar'+id).DOPBackendBookingCalendarPRO({
                'ID':id,
                'loadURL':  baseUrl+"/template/getcalendar",
                'saveURL': baseUrl+"/template/savecalendar",

            });
        })
        $('#myModal').on('hidden.bs.modal', function () {

            $(".calendar12").removeClass("dopbcp-initialized");
            $(".calendar12").empty();

        })
    });

    // date time picker
    $(function() {

        $( "#txtCheckin,#txtCheckout" ).timepicker({

            showOn: "button",
            buttonImage: "../../../../public/template/images/ico/calendar.png",
            buttonImageOnly: true,
            buttonText: "Select Time"
        });
    });
    // dattable
    $('#dataTables-example').DataTable({
        responsive: true
    });
    ///delete item
    $( ".confirm" ).on( "click", function() {
        if(confirm("Are you sure you want to delete this?")){
            return true;
        }else{
            return false;
        }
    });
    var    inforimg ="";
    //// delete img
    $(".icon_del" ).on( "click", function() {
        if(confirm("Are you sure you want to delete this?")){
            /// remove image of facilites
            var curent_url = window.location.pathname;
            if(curent_url.search("/fac/edit") != -1 || curent_url.search("/room/edit") != -1){
                $("#delete_thumb").val("agree");
                $("#thumbimg").remove();
                $(this).remove();
            }

        // remove list image of tour or hotel
        var    key = $(this).attr('data-key');
        var    id  = $(this).attr('data-id');
               inforimg+=key+",";
            $("#id"+key).remove();
            $("#img"+key).remove();
            $('#inforimg').val(inforimg);


        }else{
            return false;
        }
    });
});
// flash msg set time
$('div.alert').delay(5000).slideUp();
