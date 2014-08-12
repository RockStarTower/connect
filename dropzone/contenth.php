<?php
include ("../config.php");

$domain = $_POST['site_url'];
$wireframe = $_POST['wireframe'];
$language = $_POST['language'];
$site_url = $_POST['site_url'];
$username = $_POST['username'];

$date = date("y-m-d");


$hp_h1 = $_POST['content']['homepage']['content']['homepage_title'];


if ($wireframe != 12){
	$hp_content_titles = $_POST['content']['homepage']['title'];
}
$hp_content_boxes = $_POST['content']['homepage']['box'];

if ($wireframe == 21){

	$call_to_action = $_POST['content']['page1']['slider_content'];

}

$counter = 1;

$_POST['content']['privacy'] = privacyPolicy($_POST['language'], strtoupper($_POST['site_url']));

if ($wireframe != 12){
	foreach ($hp_content_titles as $hp_title) {
		${'title' . $counter} = $hp_title;
		$counter ++;
	}
}
$counter = 1;
foreach ($hp_content_boxes as $hp_box) {
	${'content' . $counter} = $hp_box;
	$counter ++;
}

switch($wireframe) {
	case 1:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --></div>';
		break;
	case 2:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_4 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box4"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="../wp-content/uploads/image4.jpg"></div><p>'.$content4.'</p></div></div></div>';
		break;
	case 3:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div></div></div>';
		break;
	case 4:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box4"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="../wp-content/uploads/image4.jpg"></div><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>';
		break;
	case 5:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box"><h2>'.$title1.'</h2><div class="image1"><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg" /></div><p>'.$content1.'</p><div class="image2"><img alt="'.$title1.'" src="../wp-content/uploads/image2.jpg" /></div><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>';
		break;
	case 6:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block">[widgetkit id=ab_slider_id]<div id="home-wrapper"><h1>'.$hp_h1.'</h1><p class="top-content">'.$content1.'</p><div id="bottom-left"><img class="homepage" alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"><h2>'.$title1.'</h2><p class="bottom-content">'.$content2.'</p></div><div id="bottom-right"><img class="homepage" alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"><h2>'.$title2.'</h2><p class="bottom-content">'.$content3.'</p></div></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>';
		break;
	case 7:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first homepage-title"><h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_widget_area et_lb_first">[do_widget "Recent Posts"]</div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div></div></div>';
		break;
	case 8:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]</div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block box"><h1>'.$hp_h1.'</h1><div id="home-image"><img alt="'.$hp_h1.'" src="../wp-content/uploads/image1.jpg"></div><div id="home-content"><p>'.$content1.'</p></div><div style="clear: both;"></div><div class="box1" id="bottom-left"><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="box2" id="bottom-left"><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div class="box3" id="bottom-right"><h3>'.$title4.'</h3><p>'.$content4.'</p></div></div><!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>';
		break;
	case 9:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><p><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg">'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><p><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg">'.$content2.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><p><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg">'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>';
		break;
	case 10:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><div><img class="float-left" alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><div id="main-content"><h2>'.$title1.'</h2><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div id="feature-1"><p>'.$content2.'</p><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div></div><div id="feature-2"><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>';
		break;
	case 11:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2 style="margin-bottom: 5px;">'.$title1.'</h2><hr><p style="margin-top: 15px;">'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><div id="float-left"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content2.'</p></div><div id="float-right"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image2.jpg"></div><p>'.$content3.'</p></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><div id="float-left"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="../wp-content/uploads/image3.jpg"></div><p>'.$content4.'</p></div><div id="float-right"><h2>'.$title5.'</h2><div><img alt="'.$title5.'" src="../wp-content/uploads/image4.jpg"></div><p>'.$content5.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_2 --><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --></div>';
		break;
	case 12:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]</div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box1"><div id="top-content"><h1>'.$hp_h1.'</h1><div><img alt="'.$hp_h1.'" src="../wp-content/uploads/image1.jpg"></div><p>'.$content1.'</p></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><div class="float-left"><div><img alt="" src="../wp-content/uploads/image2.jpg"></div><p>'.$content2.'</p></div><div class="float-left"><div><img alt="" src="../wp-content/uploads/image3.jpg"></div><p>'.$content3.'</p></div><div class="float-right"><div><img alt="" src="../wp-content/uploads/image4.jpg"></div><p>'.$content4.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>';
		break;
	case 13:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first"><h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><div><img class="homepage" alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><h4>'.$title1.'</h4><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><div><img class="homepage" alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><h4>'.$title2.'</h4><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><div><img class="homepage" alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"></div><h4>'.$title3.'</h4><p>'.$content3.'</p></div><div class="et_lb_module et_lb_text_block box4"><div><img class="homepage" alt="'.$title4.'" src="../wp-content/uploads/image4.jpg"></div><h4>'.$title4.'</h4><p>'.$content4.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>';
		break;
	case 14:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_4 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><p><img alt="'.$title1.'" src="../wp-content/uploads/image1.png"></p><h6>'.$title1.'</h6><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><p><img alt="'.$title2.'" src="../wp-content/uploads/image2.png"></p><h6>'.$title2.'</h6><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box3"><p><img alt="'.$title3.'" src="../wp-content/uploads/mage3.png"></p><h6>'.$title1.'</h6><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box4"><p><img alt="'.$title4.'" src="../wp-content/uploads/image4.png"></p><h6>'.$title4.'</h6><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>';
		break;
	case 15:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1><div class="float-left"><div><img alt="'.$title2.'" src="../wp-content/uploads/image1.jpg"></div><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="float-right"><div><img alt="'.$title3.'" src="../wp-content/uploads/image2.jpg"></div><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div id="bottom"><p><img class="img" alt="'.$title1.'" src="../wp-content/uploads/image3.jpg"></p><h3>'.$title1.'</h3><p class="bottom">'.$content1.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>';
		break;
	case 16:
		$box_content = array();
		for($i = 0; $i < count($_POST['content']['homepage']['box']); $i++) {
			$box_content[$i] = '<p>' . ${'content' . ($i + 1)} . '</p><img alt="' . ${'title' . ($i + 1)} . '" class="homepage" src="../wp-content/uploads/image' . ($i + 1) . '.jpg" />';
		}
		$_POST['content']['homepage']['box'] = $box_content;
		break;
	case 17:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box"><div id="home-wrapper"><h1>'.$hp_h1.'</h1><p class="top-content">'.$content1.'</p><div id="bottom-left"><div><img class="homepage" alt="'.$title2.'" src="../wp-content/uploads/image1.jpg"></div><h4 class="move1">'.$title2.'</h4><p class="bottom-content">'.$content2.'</p></div><div id="bottom-right"><div><img class="homepage" alt="'.$title3.'" src="../wp-content/uploads/image2.jpg"></div><h4 class="move1">'.$title3.'</h4><p class="bottom-content">'.$content3.'</p></div></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>';
		break;
	case 18:
		$_POST['content']['homepage']['content'] = array(
			'slide_title_1' => array($hust_slide_title1 => $hust_slide_content1.'[button link="/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'/"] Read More [/button]'),
			'slide_title_2' => array($hust_slide_title2 => $hust_slide_content2.'[button link="/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'/"] Read More [/button]'),
			'slide_title_3' => array($hust_slide_title3 => $hust_slide_content3.'[button link="/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'/"] Read More [/button]'),
			'feature_1' => array($title1 => '<div class="cover"></div>'.$content1),
			'feature_2' => array($title2 => '<div class="cover"></div>'.$content2),
			'feature_3' => array($title3 => '<div class="cover"></div>'.$content3),);
		break;
	case 19:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><div><img class="float-left first" alt="" src="../wp-content/uploads/image1.jpg"></div><div><img class="float-left" alt="" src="../wp-content/uploads/image2.jpg"></div><div><img class="float-right" alt="" src="../wp-content/uploads/image3.jpg"></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block"><h3>'.$title1.'</h3><p>'.$content1.'</p><h3>'.$title2.'</h3><p>'.$content2.'</p><h3>'.$title3.'</h3><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>';
		$_POST['content']['homepage']['homepage_title'] = $hp_h1;
		break;
	case 20:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first"><div id="slide-wrap"><div id="left-slide"><div><img alt="" src="../wp-content/uploads/slider/slider1.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'/">'.$slidecaption1.'</a></h3></div><div id="right-slide"><div id="right-slide-top"><div><img alt="" src="../wp-content/uploads/slider/slider2.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'/">'.$slidecaption2.'</a></h3></div><div id="right-slide-bottom"><div><img alt="" src="../wp-content/uploads/slider/slider3.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'/">'.$slidecaption3.'</a></h3></div></div></div><div id="placeholder"></div></div><div class="et_lb_module et_lb_text_block et_lb_first page-title"><h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_widget_area et_lb_first">[do_widget "Recent Posts"]</div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"></div><h4>'.$title1.'</h4><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"></div><h4>'.$title2.'</h4><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><h4>'.$title3.'</h4><p>'.$content3.'</p></div></div></div>';
		break;
	case 21:
		$_POST['content']['homepage']['content'] = array(
		'homepage_title' => $hp_h1,
		'slide_title' => $call_to_action, 
		'feature_1' => array($title1 => $content1),
		'feature_2' => array($title2 => $content2),
		'feature_3' => array($title3 => $content3),);
		break;
	case 22:
		$_POST['content']['homepage']['content'] = array($hp_h1, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg" /><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpeg" /><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpeg" /><p>'.$content3.'</p></div>',);
		break;
	case 23:
		$_POST['content']['homepage']['content'] = array($hp_h1, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"><p>'.$content3.'</p></div>');
		break;
	case 24:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block"><div class="left"><p><img alt="'.$title2.'" src="../wp-content/uploads/image1.jpg"></p><h3>'.$title2.'</h3><p class="content">'.$content2.'</p></div><div class="center"><p><img alt="'.$title3.'" src="../wp-content/uploads/image2.jpg"></p><h3>'.$title3.'</h3><p class="content">'.$content3.'</p></div><div class="right"><p><img alt="'.$title4.'" src="../wp-content/uploads/image3.jpg"></p><h3>'.$title4.'</h3><p class="content">'.$content4.'</p></div><div><p><img class="homepage" alt="'.$title1.'" src="../wp-content/uploads/image4.jpg"></p><h3>'.$title1.'</h3><p>'.$content1.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>';
		break;
	case 25:
		$_POST['content']['homepage']['content'] = array($hp_h1, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"><p>'.$content3.'</p></div>');
		break;
	case 26:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1 id="main">'.$hp_h1.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box1"><p><img alt="'.$title1.'" src="../wp-content/uploads/image1.png"></p><h4>'.$title1.'</h4><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><p><img alt="'.$title2.'" src="../wp-content/uploads/image2.png"></p><h4>'.$title2.'</h4><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><p><img alt="'.$title3.'" src="../wp-content/uploads/image3.png"></p><h4>'.$title3.'</h4><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box4"><p><img alt="'.$title4.'" src="./wp-content/uploads/image4.png"></p><h4>'.$title4.'</h4><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>';
		break;
	case 27:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><h2>'.$title1.'</h2><p><img alt="'.$title1.'" src=".../wp-content/uploads/image1.jpg"><br>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><h2>'.$title2.'</h2><p><img alt="'.$title2.'" src=".../wp-content/uploads/image2.jpg"><br>'.$content2.'</p></div></div></div>';
		break;
	case 28:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id=ab_slider_id]<h1 style="text-align: center;">'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block bigbox1"><div style="clear: both;"></div><div class="box1" id="bottom-left"><h3>'.$title1.'</h3><p>'.$content1.'</p></div><div class="box2" id="bottom-left"><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="box3" id="bottom-right"><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div id="home-image"><img alt="" src="../wp-content/uploads/image1.jpg"></div><div id="home-content"><p>'.$content4.'</p></div></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>';
		break;
	case 29:
		$_POST['content']['homepage']['content'] = array($hp_h1, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="../wp-content/uploads/image1.jpg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="../wp-content/uploads/image2.jpg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="../wp-content/uploads/image3.jpg"><p>'.$content3.'</p></div>');
		break;
	case 30:
		$_POST['content']['homepage']['content'] = '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block">[widgetkit id=ab_slider_id]<h1>'.$hp_h1.'</h1></div><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="../wp-content/uploads/image1.png"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="../wp-content/uploads/image2.png"></div><p class="box2text">'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="../wp-content/uploads/image3.png"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>';
		break;
}

$domain_dir = 'content/' . $domain;

if (!file_exists($domain_dir)) {
	mkdir($domain_dir, 0777, true);
	if (!file_exists($domain_dir)) {
		die('Failed to create directory');
	}
}

$encode = json_encode($_POST);

file_put_contents('content/'.$domain.'/content.json', $encode);
echo "Content Created!";

$status = 'design';

mysqli_query($con, "INSERT INTO ticket (username, wireframe, url, language, date, status) 
VALUES ('$username', '$wireframe', '$site_url', '$language', '$date', '$status')");


?>