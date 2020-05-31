<?php
//function receiveTextFromPython($base64)
//{
//    $texts=[];
//    $n=0;
//    for ($i=0 ; $i<100 ;$i++)
//        {
//            if ($base64[$i] != '*')
//             $texts[$n]=$texts[$n]+base64_decode($base64[$i]);
//            else
//                $n++;
//        }
//    return $texts;
//}
exec("python -m pip install -r ..\\resources\\views\py\\requirements.txt");
$var = exec("python  ..\\resources\\views\py\\facebookScrap.py");
$text=base64_decode($var);
$text=strval($text);
//$a=explode(":",$text);
//is_array($text);
//echo $text;
$texts=array();
$images=array();
$post=array();
$lignes = explode("}||{",$text);
for ($i = 0 ; $i<count($lignes)-1;$i++)
$post[$i]= explode(" || ",$lignes[$i]);
for ($i=0 ; $i<count($lignes)-1;$i++)
{$texts[$i]=$post[$i][0];
$images[$i]=$post[$i][1];}
echo $texts[2];
?>
