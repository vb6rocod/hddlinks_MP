#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>

<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"
	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="45"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="45"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
    itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no"
	idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<text align="justify" redraw="yes"
          lines="8" fontSize=17
		      offsetXPC=55 offsetYPC=58 widthPC=40 heightPC=38
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=56 offsetYPC=22.5 widthPC=35 heightPC=30>
		<script>print(img); img;</script>
		</image>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(titlu); titlu;</script>
		</text>

		<idleImage> image/POPUP_LOADING_01.png </idleImage>
		<idleImage> image/POPUP_LOADING_02.png </idleImage>
		<idleImage> image/POPUP_LOADING_03.png </idleImage>
		<idleImage> image/POPUP_LOADING_04.png </idleImage>
		<idleImage> image/POPUP_LOADING_05.png </idleImage>
		<idleImage> image/POPUP_LOADING_06.png </idleImage>
		<idleImage> image/POPUP_LOADING_07.png </idleImage>
		<idleImage> image/POPUP_LOADING_08.png </idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
                      img = getItemInfo(idx,"image");
					  annotation = getItemInfo(idx, "annotation");
					  durata = getItemInfo(idx, "durata");
					  pub = getItemInfo(idx, "pub");
					  titlu = getItemInfo(idx, "titlu");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>

<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();

if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
ret;
</script>
</onUserInput>

	</mediaDisplay>
	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>
<channel>
	<title>ProTV Moldova</title>
	<menu>main menu</menu>


<?php

function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
include ("../../common.php");
function dec($string) {
    $v=str_replace("\u015e","S",$string);
    $v=str_replace("\u015f","s",$v);
    $v=str_replace("\u0163","t",$v);
    $v=str_replace("\u0162","T",$v);
    $v=str_replace("\u0103","a",$v);
    $v=str_replace("\u0102","A",$v);
    $v=str_replace("\u00a0"," ",$v);
    $v=str_replace("\u00e2","a",$v);
    $v=str_replace("\u021b","t",$v);
    $v=str_replace("\u201e","'",$v);
    $v=str_replace("\u201d","'",$v);
    $v=str_replace("\u0219","s",$v);
    $v=str_replace("\u00ee","i",$v);
    $v=str_replace("\u00ce","I",$v);
    $v=str_replace("&nbsp;","",$v);
    $v=str_replace("\/","/",$v);
    return $v;
}
$link="http://protv.md/video";
$html = file_get_contents($link);
$html=str_between($html,"id ='video_playing'>","</ul");
$videos = explode('<li', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
    $t1=explode('src="',$video);
    $t2=explode('"',$t1[1]);
    $image=$t2[0];

    $t1=explode('href="',$video);
    $t2=explode('"',$t1[1]);
    $l=$t2[0];
    //$link=$host."/scripts/tv/php/protvmd_l.php?file=".$l;
    $t2=explode('value="',$t1[1]);
    $t3=explode('"',$t1[1]);
    $link=substr(strrchr($t3[0], "/"), 1);;
    $title=str_between($video,'<span>','</span>');
    $link="http://video.protv.md/assets/articles/files/".$link.".mp4";
    //$link="http://m.protv.md/mobile/".$link.".mp4";
    
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    movie="'.$link.'";
    cancelIdle();
    storagePath = getStoragePath("tmp");
    storagePath_stream = storagePath + "stream.dat";
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, video/x-flv);
    streamArray = pushBackStringArray(streamArray, "'.str_replace('"',"'",$title).'");
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    </script>
    </onClick>
    <annotation>'.$title.'</annotation>
    <titlu>'.$title.'</titlu>
    <image>'.$image.'</image>
    <media:thumbnail url="'.$image.'" />
    </item>
    ';

}

?>


</channel>
</rss>
