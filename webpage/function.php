<?php
    function directory($dir,$filters) 
    { 
        $handle=opendir($dir); 
        $files=array(); 
        if ($filters == "all"){while(($file = readdir($handle))!==false){$files[] = $file;}} 
        if ($filters != "all") 
        { 
            $filters=explode(",",$filters); 
            while (($file = readdir($handle))!==false) 
            { 
                for ($f=0;$f<sizeof($filters);$f++): 
                    $system=explode(".",$file); 
                    if ($system[1] == $filters[$f]){$files[] = $file;} 
                endfor; 
            } 
        } 
        closedir($handle); 
        return $files; 
    }

    // Snippet from PHP Share: http://www.phpshare.org

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

?>
