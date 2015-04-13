<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
$url = "http://www.university-directory.eu/Spain/Spain-Universities.html";

// Encode UTF8 
echo "<!DOCTYPE html><html lang=fr-FR><head><meta charset=UTF-8 /></head>";
// Include the library
include('htmldom/simple_html_dom.php'); 
// Retrieve the DOM from a given URL
$html = file_get_html($url);

foreach($html->find('table.joblist td a') as $line) {
  // get title & url
  if(isset($line->title)) { $title=$line->title;  echo $title."<br/>"; }       
  if(isset($line->href)) { $href=$line->href;  echo $href."<br/>"; }
  $pos = strpos($href, "http://");
  if ($pos === false) $href=$url."/".$href;
  
  // get infos from url            
  $html2 = file_get_html($href);
  if ($html2!="") {
      foreach($html2->find('table.joblist') as $univ) echo $univ->innertext."<br/>";
   }
  else echo "no web page found !<br/>";
  
  echo "<br/>";
}
       
/*$
 $tableau_infos=[$univ];
     
          $obj= json_encode($tableau_infos,true);
         $Fp= fopen ( 'results2.json' ,  'w' ); 
              fwrite ( $Fp , $obj);

   */
?>
        
    </body>
</html>
