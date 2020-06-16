<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
    
    <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://kit.fontawesome.com/9cfe163ae0.js" crossorigin="anonymous"></script>
     <script src="js/script.js"></script>
     
    <title>Document</title>
</head>
<body>

        
         <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand"> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registration">
                                  Ajouter un article
                        </button>
                </a>
                <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                        
                </form>
        </nav>

        <h1> <center> Liste des articles </center>  </h1>

         <div id="table"> </div>


        <?php
            require "classes/Form.php";
            require "classes/Field.php";
            require "classes/Modal.php";
         

         $modal_registration= new modal("registration" , "ajouter un article", "btn_close","btn_registration","Register Now");

               

                echo $modal_registration->getTagModal();
                echo $modal_registration->getTagBodyModal();

                             
                            $fields_registration[] = new Field('Libelle','text', 'phoneName' ,'','');
                            $fields_registration[] = new Field('description','text', 'description','','');
                            $fields_registration[] = new Field('prix','text', 'price','','');   
                            


                            $form_registration = new Form('POST','Form', $fields_registration);

                            //var_dump($fields);
                            //Output
                            echo $form_registration->getStartTag() . PHP_EOL;

                                    foreach($form_registration->getFields() as $field_registration)
                                        {
                                        
                                            echo  $field_registration->getTag() . PHP_EOL;
                                        
                                         }
                                         
                            echo $form_registration->getEndTag();

                echo $modal_registration->EndTagBodyModel();
                echo $modal_registration->getFooterModal();

               
/* --------------------------------------------------------------------------------------------------------------------------------- */
      
        $modal_update= new modal("update" , "modifier un article", "btn_close","btn_update","update Now");

               

                echo $modal_update->getTagModal();
                echo $modal_update->getTagBodyModal();

                        
                        $fields_update[] = new Field('Libelle','text', 'up_phoneName' ,'','');
                        $fields_update[] = new Field('description','text', 'up_description','','');
                        $fields_update[] = new Field('prix','text', 'up_price','','');  
                        $fields_update[] = new Field('','hidden', 'up_id','','');   
                        


                        $form_update = new Form('POST','Form', $fields_update);

                        //var_dump($fields);
                        //Output
                        echo $form_update->getStartTag() . PHP_EOL;
                                foreach($form_update->getFields() as $field_update) {
                                        
                                        echo  $field_update->getTag() . PHP_EOL;
                                        
                                }
                        echo $form_update->getEndTag();

                echo $modal_update->EndTagBodyModel();
                echo $modal_update->getFooterModal(); 
/* --------------------------------------------------------------------------------------------------------------------------------- */
               
         $modal_delete= new modal("delete", "supprimer un article", "btn_close","btn_delete_record","delete Now");

         echo $modal_delete->getTagModal();
         echo $modal_delete->getTagBodyModal();
         echo $modal_delete->EndTagBodyModel();
         echo $modal_delete->getFooterModal(); 

        ?>
</body>
</html>