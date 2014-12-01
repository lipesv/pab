<?php

/*
This is the solution recommended in chapter 4 in "PHP for absolute beginners", 2nd edition
There are alternative solutions commented out further down in this file 
*/

return showImages();

function showImages(){
    $out = "<h1>Image Gallery</h1>";
    $out .= "<ul id='images'>";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder);
    while ( $filesInFolder->valid() ) {
        $file = $filesInFolder->current();
        $filename = $file->getFilename();
        $src = "$folder/$filename";
        $fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
        $mimeType = $fileInfo->file( $src );
        
        if ( $mimeType === 'image/jpeg' ) {
            $out .= "<li><img src='$src' /></li>";
        }
        $filesInFolder->next();
    }
    $out .= "</ul>";    
    return $out;

}



/*
The function below uses the deprecated mime_content_type() instead of Finfo
You can use it if you server configuration doesn't provide Finfo

To use this code, comment out or delete the function showImages() above and
uncomment the comment block around the code immediatly below
*/
/*
function showImages(){  
    $out = "<h1>Image Gallery</h1>";
    $out .= "<ul id='images'>";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder);
    while ( $filesInFolder->valid() ) {
        $file = $filesInFolder->current();
        $filename = $file->getFilename();
        $src = "$folder/$filename";
        //the code used in the book is commented out
        //$fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
        //$mimeType = $fileInfo->file( $src );
        
        //the alternative solution
        $mimeType = mime_content_type( $src );
        
        if ( $mimeType === 'image/jpeg' ) {
            $out .= "<li><img src='$src' /></li>";
        }
        $filesInFolder->next();
    }
    $out .= "</ul>";    
    return $out;
}
*/


/*
Here's yet another solution to the same basic task.
Instead of comparing mime types, it checks for the .jpg extension name

To use this code, comment out or delete the function showImages() above and
uncomment the comment block around the code immediatly below
*/
/*
function showImages(){  
    $out = "<h1>Image Gallery</h1>";
    $out .= "<ul id='images'>";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder);
    while ( $filesInFolder->valid() ) {
        $file = $filesInFolder->current();
        $filename = $file->getFilename();
        $src = "$folder/$filename";
        //the code used in the book is commented out
        //$fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
        //$mimeType = $fileInfo->file( $src );
        
        //the alternative solution
        //get extension name of file
        $extension = $file->getExtension();
        //make sure extension name is in lower case
        $extension = strtolower($extension);
        //if the extension is 'jpg'
        if ( $extension === 'jpg' ) {
            $out .= "<li><img src='$src' /></li>";
        }
        $filesInFolder->next();
    }
    $out .= "</ul>";    
    return $out;
}
*/

