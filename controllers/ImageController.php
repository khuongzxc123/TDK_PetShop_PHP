<?php
    class ImageController{
        function uploadImage($image, $temp){
            if($image["error"] == 4){
              echo
              "<script> alert('Image Does Not Exist'); </script>"
              ;
            }
            else{
              $fileName = $image["name"];
              $fileSize = $image["size"];
              $tmpName = $image["tmp_name"];
          
              $validImageExtension = ['jpg', 'jpeg', 'png'];
              $imageExtension = explode('.', $fileName);
              $imageExtension = strtolower(end($imageExtension));
              if ( !in_array($imageExtension, $validImageExtension) ){
                echo
                "
                <script>
                  alert('Invalid Image Extension');
                </script>
                ";
              }
              else if($fileSize > 100000000){
                echo
                "
                <script>
                  alert('Image Size Is Too Large');
                </script>
                ";
              }
              else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, $temp . $newImageName);
                return $newImageName;
              }
            }
        }
    
    }
?>
