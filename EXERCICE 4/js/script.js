
$(document).ready(function(){

     insert_Record();
     view_Record();
     get_Record();
     update_record();
     delete_record();
     search_record();


});


function insert_Record()
{

    $(document).on('click','#btn_registration',function(){
        
        var   phoneName= $('#phoneName').val();
        var   description = $('#description').val();
        var   price = $('#price').val();

            if( phoneName =='' || description ==''|| price =='' ){

                $('#message-registration').html("<div class='alert alert-warning'> veuilllez remplir tous les champs svp </div> ");
                

            }else{

                
                $.ajax(
                    {
                        url: 'insert.php',
                        method:'POST',
                        data:{ phoneName:phoneName,description :description, price:price },
                        success: function(data){

                            $('#message-registration').html(data);
                            $("#registration").modal('show');
                            $('form').trigger('reset');
                            
                            
                        }

                    });  

        }
            
        
    });
 

    $(document).on('click','#btn_close',function(){
        $('form').trigger('reset');
        $('#message-registration').html('');
        view_Record();
    });


}

function view_Record(){

    $.ajax(
        {
            url : ' view.php ',
            method : 'POST',
            success : function(data){

                    if(data){

                        $('#table').html(data);
                    }else{

                        $('#table').html('no article ajouté');
                    }

                }
            

        });

}

function get_Record()
{

    $(document).on('click','#btn_edit',function(){
        
        var   id= $(this).attr('data-id');
    
                
                $.ajax(
                    {
                        url: 'get_record.php',
                        method:'POST',
                        data:{ id:id },
                        dataType: 'JSON',

                        success: function(data){

                           $('#up_id').val(data[0]);
                           $('#up_phoneName').val(data[1]);
                           $('#up_description').val(data[2]);
                           $('#up_price').val(data[3]);
                            
                            $('#update').modal('show');
                            
                            
                        }

                    });  

            
        
    });
}

    function update_record()
    {
        $(document).on('click','#btn_update', function()
        {
            var phoneName = $('#up_phoneName').val();
            var description = $('#up_description').val();
            var price = $('#up_price').val();
            var id = $('#up_id').val();


            if( phoneName =='' || description ==''|| price =='' ){

                $('#message-update').html("<div class='alert alert-warning'> veuilllez remplir tous les champs svp </div> ");
                

            }else{

                        $.ajax(
                            {
            
                                url: 'update.php',
                                method :'POST',
                                data :{ phoneName :phoneName,
                                        description :description ,
                                        price :price ,  id:id },
                                success : function(data)
                                {
                                    $('#message-update').html(data);
                                    $('#update').modal('show');

                                    view_Record();


                                }
                
                    
                            });
                }
        });


        $(document).on('click','#btn_close',function(){
            $('form').trigger('reset');
            $('#message-update').html('');
            view_Record();
        });
    }

    function delete_record()
    {
        $(document).on('click','#btn_delete',function(){

            var  id = $(this).attr('data-id1'); 

            $('#message-delete').html("voulez vous vraiment supprimer cet article ? </br> si oui cliquez sur le bouton delete Now");   

           // $('#delete').modal('show');

            $(document).on('click','#btn_delete_record', function()
            {
                
                $.ajax(
                    {
                        url : 'delete.php',
                        method : 'POST',
                        data : { id : id },
                        success : function(data)
                        {
                             $('#message-delete').html(data);
                             $('#delete').modal('show');
                             view_Record();
                        }
                    });
    
            });
    
            
    
        });

        $(document).on('click','#btn_close',function(){
            $('form').trigger('reset');
            $('#message-delete').html('');
            view_Record();
        });

    }


    function search_record()
    {
        $(document).on('keyup', '#search', function()
        {
            var data = $('#search').val();

                    if(data.length>1 || data =="")
                    {
                                $.ajax({
                                type: 'post',
                                url: 'search.php',
                                data:{ data:data },
                                success: function (response) {
                                    if(data !=""){

                                        $('#table').html(response);

                                         }
                                        
                                    }
                                });
                    }else{

                        view_Record();
                    }

        });
    }

   
 


