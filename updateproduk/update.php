<?php 
$mysqli = mysqli_connect("localhost","u1498273_tunjungan","Tun7ungan2021","u1498273_tunjungan");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}  
    $data = json_decode(file_get_contents('php://input'), false);
    
        $method                = $data->method;     
    
   if($method == "broadcast"){
            $obj = json_decode(file_get_contents('php://input'), TRUE);
        
        $search_key = 'params';
        foreach($obj as $key => $value) { 
             if ($key == $search_key) {  
                  $search_key = 'data';
                  foreach($value as $key => $value2) { 
                         if ($key == $search_key) {  
                                  foreach($value2['perubahan_harga'] as $key ) {  
                                             $denom         = $key['denom'];
                                             $harga_baru    = $key['harga_baru'];
                                             $harga_lama    = $key['harga_lama'];
                                             $nama_produk   = $key['nama_produk'];
                                            
                                         mysqli_query($mysqli, "UPDATE tbl_produk_agratek SET harga = '$harga_baru' 
                                         WHERE  code_produk ='$denom'") or die (mysqli_error($mysqli));
         
                                    }
                                  foreach($value2['produk_nonaktif'] as $key ) {  
                                             $denom         = $key['denom'];
                                             $status        = $key['status'];
                                             $status_str    = $key['status_str'];
                                             $nama_produk   = $key['nama_produk'];
          
                                        if($status_str =="NONAKTIF"){
                                             mysqli_query($mysqli, "UPDATE tbl_produk_agratek SET status = 'NO ACTIVE' 
                                             WHERE  code_produk ='$denom'") or die (mysqli_error($mysqli)); 
                                        }
                                        
                                    }
                          }
                       
                    }
              }
           
        }
        
        
             $jsonrpc               = $data->jsonrpc;  
             $id                    = $data->id;   
             $type                  = $data->params->data->type; 
        
              mysqli_query($mysqli, "INSERT INTO tbl_tes (jsonrpc,id, type,json,method)
              VALUES ('$jsonrpc','$id' ,'$type','$a','$method')") or die (mysqli_error($mysqli));
        }else if($method == "notify"){
        $invoice_no            = $data->params->data[0]->invoice_no;
        $discount              = $data->params->data[0]->produk[0]->discount;  
        $total                 = $data->params->data[0]->produk[0]->total;  
        $denom                 = $data->params->data[0]->produk[0]->denom;  
        $status                = $data->params->data[0]->produk[0]->status;  
        $serial_number         = $data->params->data[0]->produk[0]->serial_number;  
        $subtotal              = $data->params->data[0]->produk[0]->subtotal;  
        $id_pel                = $data->params->data[0]->produk[0]->id_pel;  
        
        echo $invoice_no." -  ". $total; 
             mysqli_query($mysqli, "INSERT INTO tbl_tes (invoice_no,discount,denom,status,serial_number,subtotal,id_pel,json)
             VALUES ('$invoice_no','$discount','$denom','$status','$serial_number','$subtotal','$id_pel','$a')") or die (mysqli_error($mysqli));
        }
?>