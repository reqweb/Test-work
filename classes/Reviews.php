<?php

class Reviews{
    
    const DB_PATH = "../db/db.sqlite3";
    
    public function NewReviews($name, $email, $review, $image){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            exit();
        };
        
        $file_sqlt = new PDO('sqlite:'.self::DB_PATH.'');
            
        $publictime = date( "d.m.y H:i" );
        
        if(!empty($image)){
            
            $img_format = exif_imagetype($_FILES['file']['tmp_name']);

            if($img_format == 1 || $img_format == 2 || $img_format == 3){

                $uploaddir = '../uploads/';
                $uploadfile = $uploaddir . basename($_FILES['file']['name']);

                move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

                $thumb = new Imagick($uploaddir . $_FILES['file']['name']);
                $thumb->adaptiveResizeImage(320,240,Imagick::FILTER_LANCZOS,1);
                $thumb->writeImage($uploaddir . $_FILES['file']['name']);
                $thumb->destroy();

            };
            
        }

        $file_sqlt->query("INSERT INTO reviews (name, email, review, publictime, image) VALUES ('$name', '$email', '$review', '$publictime', '$image');");

        $return_item = [];

       $return_item["name"] = $name;
       $return_item["review"] = $review;
       $return_item["publictime"] = $publictime;
       $return_item["image"] = $image;

        echo json_encode($return_item);
        
    }
    
}
