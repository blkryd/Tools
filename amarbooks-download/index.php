<?php
/**
 * Created by PhpStorm.
 * User: Heisenburg
 * Date: 10/28/2017
 * Time: 12:43 PM
 */

libxml_use_internal_errors(true);
if(isset($_REQUEST['s'])){
  //  $site2 = 'http://www.amarbooks.com/cat.php?cd=178&pg=1';
   // $site = $_REQUEST['s'];

    $page_count=1;
    $ending_page =3;
    $category_id = 283;

    $site = null;
    for($page_count;$page_count<= $ending_page;$page_count++){
        $site .= file_get_contents('http://www.amarbooks.com/cat.php?cd='.$category_id.'&pg='.$page_count);
    }
    $page = $site;
    @$doc = new DOMDocument();
    $doc->loadHTML($page);
    foreach($doc->getElementsByTagName('meta') as $meta) {
        if($meta->getAttribute('name') == 'keywords') {
            //Assign the value from content attribute to $meta_og_image
            $keywords = $meta->getAttribute('content');
            $category_name = explode(",",$keywords);
        }
    }
    $i = 1;
    $pg = 1;
    echo 'Category name : '.$category_name[0].'<br>';
    foreach ($doc->getElementsByTagName('b') as $node) {
        $name = $node->textContent;
       // $name = strstr($name,'. ');
     //   $name = substr($name,2);
      //  $name = str_replace(array( '(', ')' ), '', $name);
        $name = str_replace('1st', '1', $name);
        $name = str_replace('2nd', '2', $name);
        $name = str_replace('3rd', '3', $name);
        $name = str_replace(' 1', '-1', $name);
        $name = str_replace(' 2', '-2', $name);
        $name = str_replace('Vol ', 'Vol-', $name);
        $source = "http://www.amarbooks.com/FreeDownload.php?w=".$category_name[0]."&f=$name.pdf";
        echo $i.' <a href= "'.$source.'" target="_blank">'.$name.'</a><br>';

        if(!($i++ % 12)){
            echo 'Page :'. $pg++.'<br>';
        }


    }
}
?>

