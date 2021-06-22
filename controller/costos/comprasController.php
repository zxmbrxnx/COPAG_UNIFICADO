<?php

require_once '../model/Costos/ComprasModel.php';

class comprasController {

    public function consult(){
        $obj=new ComprasModel();
        
        
        $sql=" SELECT tblcomprasinsumos.Soc_id,tblsolicitudecompra.Soc_fecha, count(tblcomprasinsumos.Soc_id) as 'continsumos'
        FROM tblsolicitudecompra,tblcomprasinsumos
        WHERE tblsolicitudecompra.Soc_id=tblcomprasinsumos.Soc_id
        GROUP BY tblsolicitudecompra.Soc_id";

        $compras=$obj->consult($sql);

        include_once '../view/costos/compras/ConsultarCompras.php';
    }

    public function getInsert(){

        $obj=new ComprasModel();
       
        $sql ="SELECT * FROM tbsolicitudecompra";
        $solicitud= $obj-> consult($sql);
        
      
        $sql="SELECT * FROM tblcomprasinsumos";
        $compras=$obj->consult($sql);
       

        $sql= "SELECT * FROM tblregional";
        $Regionales=$obj->consult($sql);

        $sql ="SELECT * FROM tblcentro";
        $Centros=$obj->consult($sql);

        $sql ="SELECT * FROM tblproductobase";
        $productoBase=$obj->consult($sql);

        $sql ="SELECT * FROM tblmedida";
        $Medidas=$obj->consult($sql);
        
        
       

        include_once '../view/costos/compras/InsertarCompras.php';
    }


     public function postInsert(){
       
        $obj=new ComprasModel();

        extract($_POST);
        $Soc_id=$obj->autoIncrement("tblsolicitudecompra","Soc_id");
        $sql="INSERT INTO tblsolicitudecompra VALUES ('$Soc_id','".$Soc_fecha."','".$Soc_DNI_jefeOficina."','".$Soc_DNI_servidorPublico."','".$Soc_servidorp."','".$Soc_ficha."','".$Soc_area."','".$Reg_id."','".$Soc_nom_je."','$Cen_id')";    
        $ejecutar=$obj->insert($sql); 
        
        if($ejecutar){


            extract($_POST);

        for ($i=0;$i<count($com_Cantidad);$i++) {

            $com_NoItem=$obj->autoIncrement("tblcomprasinsumos","com_NoItem"); 
            
            $sql="INSERT INTO tblcomprasinsumos VALUES ( '$com_NoItem','".$com_Cantidad[$i]."','".$com_Observaciones[$i]."','".$Soc_id."','".$Pba_id[$i]."','".$Med_id[$i]."')";
            $ejecutar2=$obj->insert($sql);



        }
                 
        redirect(getUrl("costos","compras","consult"));

        echo $sql;

        }else{
            echo $sql;
            echo "Ups :(, ocurrio un error";

        }


     
    }


    

    public function selectCompras(){
        $obj=new ComprasModel();
        
        $id=$_POST['id'];

        $sql="SELECT * FROM tblCentro WHERE Reg_id=$id";
        $Centros=$obj->consult($sql);

        foreach ($Centros as $cen) {
            echo "<option value='".$cen['Cen_id']."'>".$cen['Cen_nombre']."</option>";
        }
      
    }

    public function getUpdate(){

            $obj=new ComprasModel();
        
           $Soc_id=$_GET['Soc_id'];

        //    $sql="SELECT tblcomprasinsumos.com_NoItem,tblproductobase.Pba_descripcion,tblmedida.Med_descripcion, tblcomprasinsumos.com_Cantidad, tblcomprasinsumos.com_Observaciones 
        //    FROM tblcomprasinsumos 
        //     INNER JOIN tblsolicitudecompra
        //     ON tblcomprasinsumos.Soc_id = tblsolicitudecompra.Soc_id 
        //     INNER JOIN tblproductobase ON tblcomprasinsumos.Pba_id =tblproductobase.Pba_id INNER JOIN tblmedida
        //     ON tblcomprasinsumos.Med_id = tblmedida.Med_id=$com_NoItem";
        //    $compras=$obj->consult($sql);

            $sql ="SELECT * FROM tblcomprasinsumos WHERE Soc_id= $Soc_id";
            $compras=$obj->consult($sql);
        
            $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$Soc_id";
            $solicitud=$obj->consult($sql);
    
            $sql= "SELECT * FROM tblregional";
            $Regionales=$obj->consult($sql); 

            $sql ="SELECT * FROM tblcentro";
            $Centros=$obj->consult($sql);

            $sql ="SELECT * FROM tblproductobase";
            $productoBase=$obj->consult($sql);

             $sql ="SELECT * FROM tblmedida";
            $Medidas=$obj->consult($sql);
        


            
            include_once '../view/costos/compras/UpdateCompras.php';
    


            

    }


  
    public function postUpdate(){

        $obj=new ComprasModel();
        
        extract($_POST);

        $sql="UPDATE tblsolicitudecompra SET Soc_fecha='".$Soc_fecha."', Soc_area='".$Soc_area."', Soc_nom_je='".$Soc_nom_je."', Soc_DNI_jefeOficina='".$Soc_DNI_jefeOficina."', Soc_servidorp='".$Soc_servidorp."', Soc_DNI_servidorPublico='".$Soc_DNI_servidorPublico."', Soc_ficha='".$Soc_ficha."',Reg_id='".$Reg_id."', Cen_id='".$Cen_id."' WHERE Soc_id=$Soc_id";
       
        
        $ejecutar=$obj->update($sql);
        
        if ($ejecutar){

            $sql="DELETE FROM tblcomprasinsumos";
            $ejecutar2=$obj->delete($sql);
            

            if ($ejecutar2){
             
                $sql="SELECT * FROM tblsolicitudecompra";

                $solicitud=$obj->consult($sql);
               
                foreach($solicitud as $soli){
                    $Soc_id = $soli['Soc_id'];
                }
    
            for ($i=0;$i<count($com_Observaciones);$i++) {
    
                $id=$obj->autoIncrement("tblcomprasinsumos","com_NoItem"); 
                
                $sql="INSERT INTO tblcomprasinsumos VALUES ( '$id','".$com_Cantidad[$i]."','".$com_Observaciones[$i]."','".$Soc_id."','".$Pba_id[$i]."','".$Med_id[$i]."')";
                $ejecutar2=$obj->insert($sql);
            }
            }

            redirect(getUrl("costos","compras","consult"));

        }else{
        
          echo "Ups :(, ocurrio un error ";


          
         


        }


    }



    public function getDelete(){

       $Soc_id=$_GET['Soc_id'];

        $obj=new ComprasModel();
        


        // $sql ="SELECT tblcomprasinsumos.com_NoItem, tblcomprasinsumos.Cen_id, tblcomprasinsumos.com_Descripcionb,
        // tblcomprasinsumos.com_UMedida, tblcomprasinsumos.com_Cantidad, tblcomprasinsumos.com_Observaciones,tblcentro.Cen_id, tblsolicitudecompra.Soc_fecha, tblsolicitudecompra.Soc_area, tblsolicitudecompra.Soc_nom_je,
        // tblsolicitudecompra.Soc_id,tblsolicitudecompra.Soc_DNI_jefeOficina, tblsolicitudecompra.Soc_servidorp, tblsolicitudecompra.Soc_DNI_servidorPublico, tblsolicitudecompra.Soc_ficha, tblsolicitudecompra.Reg_id 
        // FROM tblcomprasinsumos 
        // NATURAL JOIN  tblsolicitudecompra
        // WHERE Soc_id=$Soc_id";

        // $compras=$obj->consult($sql);


        // foreach($compras as $comp){
        //     $Soc_id=$comp['Soc_id'];
        // }
        
        include_once '../view/costos/compras/ModalDelete.php';
    }


    public function postDelete(){

        $obj=new comprasModel();

        $Soc_id=$_POST['Soc_id'];

        $sql= "DELETE FROM tblcomprasinsumos WHERE Soc_id=$Soc_id";
        $ejecutar=$obj->delete($sql);

            
            if($ejecutar){

                $sql= "DELETE FROM tblsolicitudecompra WHERE Soc_id=$Soc_id";
                $ejecutar2=$obj->delete($sql);
        
              
               
        redirect(getUrl("costos","compras","consult"));



            }else{

                echo $sql;

                echo"Ups :(, ocurrio un error";

            }
    }


    public function modalDelete(){

        
       $Soc_id=$_GET['Soc_id'];

        $obj=new ComprasModel();


        
        include_once '../view/costos/compras/ModalDelete.php';
        
        

    }



    public function getVisualize(){


        extract($_GET);

        $obj=new ComprasModel();

        
        $sql ="SELECT * FROM tblcomprasinsumos WHERE com_NoItem= $Soc_id";
        $compras=$obj->consult($sql);



        $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$Soc_id";
        $solicitud=$obj->consult($sql);


        $sql= "SELECT * FROM tblregional WHERE Reg_id=$Soc_id";
        $Regionales=$obj->consult($sql); 

        $sql ="SELECT * FROM tblcentro WHERE Cen_id=$Soc_id";
        $Centros=$obj->consult($sql);

        $sql ="SELECT * FROM tblproductobase WHERE Pba_id=$Soc_id";
        $productoBase=$obj->consult($sql);

         $sql ="SELECT * FROM tblmedida WHERE Med_id=$Soc_id";
        $Medidas=$obj->consult($sql);



        include_once '../view/costos/compras/VisualizeCompras.php';
        



    }

    





}

?>