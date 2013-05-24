<?php
include("../inc/global.php");
$titleFirst = getCollection($db,$db->query('select * from title where p_id=0 and visible=1')); 

$titleSecond = getCollection($db,$db->query('select * from title where p_id <> 0 and visible=1')); 

$html = '<dl>';
$titleSecondLengt = count($titleSecond);

while (list( $key, $val ) = each( $titleFirst ) ) {
	$html .= '<dt><a href="'.$val['id'].'" target="mainIframe">'.$val['title_name'].'</a></dt>';
	for($i = 0 ; $i < $titleSecondLengt ; $i++ ){
		if( $titleSecond[$i]['p_id'] == $val['id'] ){
			$html .= '<dd><a href="#" target="mainIframe">'.$titleSecond[$i]['title_name'].'</a></dd>';
		} 
	}
	$html .= '</dl>';
}
echo $html;
?>