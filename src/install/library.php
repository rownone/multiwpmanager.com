<?php  
  
class Library
{  
    public function getDocumentFolder()
    {
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/',$url);
        $dir = '';
        for ($i = 0; $i < count($parts) - 1; $i++) {
            $dir .= !empty($parts[$i])? $parts[$i]. "/":"";
        }
        return $_SERVER['DOCUMENT_ROOT'].$dir;
    }
    
    public function openFile($path)
    {
        
    }
}
$glibrary = new Library();
$documentPath =  $glibrary->getDocumentFolder();

?>