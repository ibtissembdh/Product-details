<?php

function insert()
{
    
       global $db;

        if(isset($_POST['phoneName']) AND isset($_POST[ 'description']) AND isset($_POST['price' ]))
        {
            $sql=sprintf( "INSERT into jouets (libelle,prix,description) VALUES('%s','%s','%s')",
                $db->real_escape_string($_POST['phoneName' ]),
                $db->real_escape_string($_POST[ 'price']),
                $db->real_escape_string($_POST['description' ])) or die($db->error());
            
                $result= $db->query($sql);

                if($result){

                    echo "<div class='alert alert-success'> L' article a été ajouté </div> ";
        
                }else{
                    
                    echo "<div class='alert alert-warning'> L' article n'a pas été ajouté </div> ";

                }


        }
}


function display()
{
    global $db;
    $table="<table  class=\"table\"> <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col\">Libellé</th>
                    <th scope=\"col\">description</th>
                    <th scope=\"col\">prix</th>
                    <th scope=\"col\">Action</th>
                </tr>
              </thead>
              <tbody>";


    $sql=sprintf( "SELECT*from  jouets ");
            $result=$db->query($sql);
            foreach($result as $row)
            {
                $table .='<tr>
                    <th scope="row">'. htmlspecialchars($row['libelle'],ENT_QUOTES) .'</th>
                        <td>'. htmlspecialchars($row['description'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['prix'],ENT_QUOTES) .'</td>
                        <td> 
                            <button class="btn btn-primary" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .'  id="btn_edit" data-toggle="modal" data-target="#update" > 
                                 <span class="fas fa-pencil-alt" style="color:white;" > </span> 
                            </button>

                            <button class="btn btn-danger" style="margin-left:5px;" data-id1='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_delete" data-toggle="modal" data-target="#delete"  >
                                  <span class="fas fa-trash-alt" style="color:white;"></span >
                             </button>
                         </td>
                </tr>';   

              };

              $table .='</tbody> </table>';

              echo  $table ;
}


 function get_user_Record()
    {
        global $db;
        
       
            
            $id = $_POST['id'];

                $sql=sprintf("SELECT * FROM jouets WHERE id=$id ") or die(mysqli_error($db));
                $result=$db->query($sql);
                
                foreach($result as $row)
                {
                    $data[]="";
                    $data[0] =$row['id'];
                    $data[1] =$row['libelle'];
                    $data[2] =$row['description'];
                    $data[3] =$row['prix'];
                }

                echo json_encode($data);

         

         
    }

    function  update()
    {

        global $db;

        if(isset($_POST['phoneName']) AND isset($_POST[ 'description']) AND isset($_POST['price' ]) AND isset($_POST['id']))
        {
            $sql=sprintf( "UPDATE  jouets  SET libelle='%s', prix='%s',description='%s' WHERE id='%s'",
                 $db->real_escape_string($_POST['phoneName']),
                 $db->real_escape_string($_POST[ 'price']),
                 $db->real_escape_string($_POST['description']),
                 $db->real_escape_string($_POST['id'])) or die($db->error());
            
                $result= $db->query($sql);

                if($result){

                    echo "<div class='alert alert-success'> L' article a été modifié </div> ";
        
                }else{
                    
                    echo "<div class='alert alert-warning'> L' article n'a pas été modifié </div> ";

                }


        }
    }

    function delete()
    {
        global $db;

        $id = $_POST['id'];
        
        $sql="DELETE FROM  jouets  WHERE jouets.id='$id'" ;
  
        $query= $db->query($sql);

        if($query)
        {
            echo "<div class='alert alert-success'> L' article a  été supprimé </div> ";

        }
        
    }

    function search()
    {
        global $db;

        $data=$_POST['data'];

        $table="<table  class=\"table\"> <thead class=\"thead-dark\">
        <tr>
            <th scope=\"col\">Libellé</th>
            <th scope=\"col\">description</th>
            <th scope=\"col\">prix</th>
            <th scope=\"col\">Action</th>
        </tr>
      </thead>
      <tbody>";


        $sql=" SELECT * FROM jouets WHERE libelle LIKE '%".$data."%' or  description LIKE  '%".$data."%' or
                prix LIKE '%".$data."%' ";

        $query=$db->query($sql);

        foreach($query as $row)
        {
            $table .='<tr>
                <th scope="row">'. htmlspecialchars($row['libelle'],ENT_QUOTES) .'</th>
                    <td>'. htmlspecialchars($row['description'],ENT_QUOTES) .'</td>
                    <td> '. htmlspecialchars($row['prix'],ENT_QUOTES) .'</td>
                    <td> 
                        <button class="btn btn-primary" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .'  id="btn_edit" data-toggle="modal" data-target="#update" > 
                            <span class="fas fa-pencil-alt" style="color:white;" > </span> 
                        </button>

                        <button class="btn btn-danger" style="margin-left:5px;" data-id1='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_delete"  data-toggle="modal" data-target="#delete">
                            <span class="fas fa-trash-alt" style="color:white;"></span >
                        </button>
                    </td>
            </tr>';   

        };

        $table .='</tbody> </table>';

        echo  $table ;

        
    }