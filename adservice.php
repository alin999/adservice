

<?php

////to be adjusted

//get the page referer
$page_ref=$_SERVER['HTTP_REFERER'];
$page_url_encoded=  urlencode($page_ref);
//echo "<p> Page URL:".$page_url_encoded."</p>";

//get the page domain
$parse = parse_url($page_ref);
$domain=$parse['host'];
//echo "<p> Domain:".$domain."</p>";

if (isset($_GET["tagID"])){
    $tagID1=$_GET["tagID"];
  // echo $tagID1;
}else{
    $tagID1="no_tag_ID";
}
//echo $tagID1;



// iid, cid, crid
if(isset($_GET["iid"])){
    $iid1=$_GET["iid"];
}else{
    $iid1="";
}

if(isset($_GET["cid"])){
    $cid1=$_GET["cid"];
}else{
    $cid1="";
}

if(isset($_GET["crid"])){
    $crid1=$_GET["crid"];
}else{
    $crid1="";
}

if(isset($_GET["bid"])){
    $bid1=$_GET["bid"];
}else{
    $bid1="";
}

//cr=ob290_v1
if (isset($_GET["ct"])){
    $ct=$_GET["ct"];
}else{
    if (isset($_GET["cr"])){
        if ($_GET["cr"]=='121'){
            $ct="http://accesshomejobs.com/";
        }
        if (substr($_GET["cr"],0,5)=="ob290"){
            $ct="http://accesshomejobs.com/";
        }
        if (substr($_GET["cr"],0,2)=="oi"){
            //$ct="http://www.myip.io/";
            // $ct='"https://www.myip.io/?utm_source="+window.location.href+"&utm_medium=banner&utm_campaign=myipopendsp"';
            //alert( $ct) ;

            $ct="https://www.myip.io/?utm_source=".urlencode($_SERVER['HTTP_REFERER'])."&utm_medium=banner&utm_campaign=myipopendsp";    
        }
        
        
    }else{
            $ct="http://www.telstra.com.au";
           
    }           
}

if (isset($_GET["click"])){
    //$click2="http://dev0.opendsp.com/demo/OB146/click.php?tagId=".$tagID1."&r=";
    //$click2='http://s.opendsp.com/man/evt/?evt=click&iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"]."&r=";
    $click2='http://s.opendsp.com/man/click/?iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"].'&bid='.$_GET["bid"]."&r=";
    
    $click_page1=urldecode($_GET["click"]).urlencode($click2);
    //echo "3rd_oarty_click=".$_GET["click"]."</br>";
    //echo "</br>"."click1=".$click_page1."</br>";
    //$click_page_openDSP= $_GET["click"].urlencode($click2.urlencode($ct));
    $click_page_openDSP=urldecode($_GET["click"]).urlencode($click2.urlencode($ct));
    //echo  "</br>"."clickDSP=".$click_page_openDSP;
  // echo $tagID1;
}else{
   //$click_page1="http://dev0.opendsp.com/demo/OB146/click.php?tagId=".$tagID1."&r=";
   $click_page1='http://s.opendsp.com/man/click/?iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"].'&bid='.$_GET["bid"]."&r=";
   $click_page_openDSP= $click_page1.urlencode($ct);
   //echo "</br>"."click1- nu e 3rdclick=".$click_page1."</br>";
   //echo  "</br>"."clickDSP - nu e 3rd click=".$click_page_openDSP;
}



//$click_page="http://dev0.opendsp.com/demo/OB146/click.php?tagId=".$tagID1."&r=";

if (isset($_GET["h"])){
    $hei1=$_GET["h"];
  // echo $tagID1;
}else{
    $hei1="90";
}

if (isset($_GET["w"])){
    $wid1=$_GET["w"];
  // echo $tagID1;
}else{
    $wid1="728";
}

if (isset($_GET["cb"])){
    $rand_no1=$_GET["cb"];
  // echo $tagID1;
}else{
    $rand_no1=rand(1000000000,9999999999);
}

$imp_link='http://dev0.opendsp.com/demo/OB146/imp1.php?tagID='.$tagID1."&url1=".$page_url_encoded."&domain=".$domain;
//$imp_link2='http://s.opendsp.com/man/evt/?evt=impression&iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"];
$imp_link2='http://s.opendsp.com/man/impression/?iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"].'&bid='.$_GET["bid"];

$viewAblePxl_link='http://s.opendsp.com/man/openvv/?iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"];
//example                    http://s.opendsp.com/man/openvv/?iid=1&cid=2&crid=3&top=100&left=100&right=200&bottom=200&iframe=1&ad_w=300&ad_h=250&view_w=400&view_h=400&event=load&viewable=33&active=1

$event_link='http://s.opendsp.com/man/impression/?iid='.$_GET["iid"].'&cid='.$_GET["cid"].'&crid='.$_GET["crid"].'&bid='.$_GET["bid"];

//cr - parameter to indentify a special ad example : cr=1 -> google ad 
if (isset($_GET["cr"])){
        if ($_GET["cr"]=='1'){
            $ad_swf_name='swf/google-'.$wid1.'x'.$hei1.'-'.$_GET["cr"].'.swf';
            $ad_img_name='img/google-'.$wid1.'x'.$hei1.'-'.$_GET["cr"].'.png';
            //echo ("1=".$ad_img_name);
        }
        if ($_GET["cr"]=='121') //121 - openDsp second ad
        {
            $ad_swf_name='swf/opendsp-'.$wid1.'x'.$hei1.'-'.$_GET["cr"].'.swf';
            $ad_img_name='img/opendsp-'.$wid1.'x'.$hei1.'-'.$_GET["cr"].'.png';
            //echo ("1=".$ad_img_name);
        }
        if (substr($_GET["cr"],0,5)=="ob290"){
            //$ad_swf_name='swf/creative_ob290_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.swf';
            //$ad_img_name='img/creative_ob290_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.png';
            $ad_swf_name='http://creative.us.cf.opendsp.com/creatives/creative_openDSP_ob290_v'.substr($_GET["cr"],-1,1).'_'.$wid1.'_'.$hei1.'/'.'creative_ob290_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.swf';
            $ad_img_name='http://creative.us.cf.opendsp.com/creatives/creative_openDSP_ob290_v'.substr($_GET["cr"],-1,1).'_'.$wid1.'_'.$hei1.'/'.'creative_ob290_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.png';
        }
        if (substr($_GET["cr"],0,5)=="ob309"){
            $ad_swf_name='swf/creative_ob309_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.swf';
            $ad_img_name='img/creative_ob309_'.$wid1.'x'.$hei1.'_'.substr($_GET["cr"],-1,1).'.png';
        }
        if ($_GET["cr"]=="oi_c_1"){
            $ad_swf_name='http://creative.us.cf.opendsp.com/creatives/creative_openDSP_oi_c_1_300_250/creative_oi_'.$wid1.'x'.$hei1.'MYIP.swf';
            $ad_img_name='http://creative.us.cf.opendsp.com/creatives/creative_openDSP_oi_c_1_300_250/creative_oi_'.$wid1.'x'.$hei1.'MYIP.png';
        }
        if ($_GET["cr"]=="oi_c_2"){
            $ad_swf_name='swf/creative_oi_'.$wid1.'x'.$hei1.'.swf';
            $ad_img_name='img/creative_oi_'.$wid1.'x'.$hei1.'.png';
        }
    }else{       
        $ad_swf_name='swf/tcl-challenge-'.$wid1.'x'.$hei1.'.swf';
        $ad_img_name='img/tcl-challenge-'.$wid1.'x'.$hei1.'.png';
        //echo ("2=".$ad_img_name);
}

$tag_type="iframe";
if (isset($_GET["loc"])){
    //if js is not enabled (loc=ns)- make the redirect to image file
    if ($_GET["loc"]=="ns"){
         //echo '<img src="'.$imp_link.'&location=2222" "style="position:absolute;top:1px;right:100px;width:1px;height:1px;">';
         header('Location: '.$imp_link.'&redirect='.$ad_img_name);
        //echo "e fara js";
    }else{
        $tag_type=$_GET["loc"];
    }
}else{
    //we assume that the tag is iframe
    $tag_type="iframe";
}


if (isset($_GET["p"])){
    $tag_provider=$_GET["p"];
}else{
    //we assume that the tag provider is openDSP
    $tag_provider="openDSP";
}

 if (isset($_GET["vt"])){
        $tag_provider="openDSP_vast";
        $vast_tag=urlencode($_GET["vt"]);
    }else{
        $vast_tag="";
} 


$ct_creativeVpaid="";
$videoUrl="";
 if (isset($_GET["cr"])){
      if ($_GET["cr"]=="vstOps26"){
        $tag_provider="openDSP_videoVastOps26";
        $videoUrl="http://creative.us.s3.opendsp.com/creatives/mp4/durex.mp4";
        $ct_creativeVpaid="http://realfeel.durexukraine.com.ua/?utm_source=tsell&utm_medium=video&utm_campaign=ostafeva";
      }
 
      if ($_GET["cr"]=="vstOps26x1"){
        $tag_provider="openDSP_videoVastOps26";
        $videoUrl="http://creative.us.s3.opendsp.com/creatives/mp4/vid1.mp4";
        $ct_creativeVpaid="http://realfeel.durexukraine.com.ua/?utm_source=tsell&utm_medium=video&utm_campaign=shelagina";
      }
 
      if ($_GET["cr"]=="vstOps26x2"){
        $tag_provider="openDSP_videoVastOps26";
        $videoUrl="http://creative.us.s3.opendsp.com/creatives/mp4/vid2.mp4";
        $ct_creativeVpaid="http://realfeel.durexukraine.com.ua/?utm_source=tsell&utm_medium=video&utm_campaign=shelagina";
      }
 }


//echo "<p>".$tag_provider."</p>";
//echo "<p>".$vast_tag."</p>";

//t=ad type to be delivered, 
//it is optional 
//if missing - swf will be delivered and image (if exists) for that swf
//possile values : 
//          f - flash
//          i - image
//          h - html creative

$ad_type="swf"; // 0 - false (to s
$is_html_creative="no";  // no = false, yes= true
if (isset($_GET["t"])){
    switch ($_GET["t"]) {
        case "f":
            $ad_type="swf";
            break;
        case "i":
            $ad_type="img";
            break;
        case "h":
            $ad_type="html";
            $tag_provider="openDSPhtml";
            $is_html_creative="yes";
            break;
        default:
            $ad_type="swf";
    }          
    //echo $ad_type;
    
}

//$ad_swf_name='swf/tcl-challenge-'.$wid1.'x'.$hei1.'.swf';
//echo "<script>console.log('----swf name----'.$ad_swf_name.';</script>";


//echo $tag_provider;
/// load the proper ad
echo convert_tag (get_ad_code($tag_provider), $tag_type, $rand_no1, $wid1, $hei1);

////////////////////////////////////////////////
/// function definitions $imp_link2

function fireImps_for_iframe(){
    //global $imp_link;
    global $imp_link2;
    
    echo '
        <script> 
            
            new Image().src = "'.$imp_link2.'";
        </script>
        <noscript>
            
            <img src="'.$imp_link2.'" width="1px" height="1px" >
        </noscript>
    ';
    //fire the new imps pixel -to be decided what to do with the old 2 imps links !
    if (isset($_GET["pixelUrl"])){
        $imp_link3=urldecode($_GET["pixelUrl"])."&evt=impression";
        echo '
            <script> 
                new Image().src = "'.$imp_link3.'";
            </script>
            <noscript>
                <img src="'.$imp_link3.'" width="1px" height="1px" >
            </noscript>
        ';
    }
}
function fireImps_for_js(){
    //global $imp_link;
    global $imp_link2;
    $intern='new Image().src = "'.$imp_link2.'";
    ';
    
    if (isset($_GET["pixelUrl"])){
        $imp_link3=urldecode($_GET["pixelUrl"])."&evt=impression";
        $intern='new Image().src = "'.$imp_link3.'";
        ';
    }
    return $intern;
}

function convert_tag ($tag_orig, $type_dsp, $rand_no11, $wid11, $hei11){
    global $is_html_creative;
    global $tag_provider;
    
    
    $finalTag="";
   
    if ($type_dsp=="iframe"){
        $finalTag=$tag_orig;
        if (0 === strpos($tag_provider, 'openDSP')) {
            //any imps here? NO
        }else {
                     fireImps_for_iframe();
        }
    }else{
    

            $main_part1_1=str_replace('"','\"',$tag_orig);
            $main_part1_2=str_replace('<','<"+"',$main_part1_1);
            $main_part1=str_replace("'","\'",$main_part1_2);

            //explode
            $main_part1 = strtr($main_part1, array(
                "\r\n" => "\n",
                "\r" => "\n",
            ));
            $pieces = explode("\n", $main_part1);
            //echo $main_part1;
            //echo $pieces[1];

            //make the final text to be sent to script
            $finalTag='';
            
            if ($tag_provider=="openDSP_vast"){
                //any imps here? NO
            }else{
                if (0 === strpos($tag_provider, 'openDSP')) {
                   //any imp here? no
                }else{
                     $finalTag=$finalTag.fireImps_for_js();
                }
            }
            $finalTag=$finalTag.'(function(){
                ';
            
        if ($is_html_creative=="no"){
            $finalTag=$finalTag.'
        var ifr ="<"+"iframe id=\"ad_iframe_'.$rand_no11.'\" scrolling=\"no\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\"  width=\"'.$wid11.'\" height=\"'.$hei11.'px\"><"+"/iframe>\n";
        document.write(ifr);
                ';
        }            
        $finalTag=$finalTag.'
        var ifc = "<"+"div id=\"'.$rand_no11.'\">\n";';
            foreach ($pieces as $key => $value) {
                   //$value2=str_replace('>','>\\n";',$value);
                    $finalTag=$finalTag.'       
            ifc +="'.$value.'\\n";'; 
            }
            $finalTag=$finalTag.'
            ifc+="<"+"/div>\n";
            ifc+="\n";
            ';
        if ($is_html_creative=="yes"){
            $finalTag=$finalTag.'
                document.write(ifc);
            ';
        }else{
            $finalTag=$finalTag.'
            var fillIframe = function(ifrd) {
                var getDocument = function(iframe) {
                    var result_document = iframe.contentWindow || iframe.contentDocument;
                    if (result_document && result_document.document)
                    result_document = result_document.document;
                    return result_document;
                };
                var c = getDocument(ifrd);
                if (c) {
                    c.open();
                    c.write(ifc);
                    c.close();
                }
            };
            var maxRetryAttempts = 1;
            var pollIframe = function() {
                var ifrd = document.getElementById("ad_iframe_'.$rand_no11.'");
                if (ifrd) {
                    fillIframe(ifrd);
                } else 
                if (maxRetryAttempts-- > 0) {
                    setTimeout(pollIframe, 10);
                }
        };
        pollIframe();';
        }
        $finalTag=$finalTag.'
            })();

        ';

        
    }
        return $finalTag;
}



function get_ad_code($ad_provider){
    global $click_page1;
    global $click_page_openDSP;
    global $ct;
    global $tagID1;
    global $wid1;
    global $hei1;
    global $ad_swf_name;
    global $ad_img_name;
    global $rand_no1;
    global $ad_type;
    global $is_vio;
    global $imp_link;
    global $imp_link2;
    global $vast_tag;
    global $viewAblePxl_link;
    global $page_url_encoded;
    global $videoUrl;
    global $iid1;
    global $cid1;
    global $crid1;
    global $bid1;
    global $ct_creativeVpaid;
    
    
    switch ($ad_provider) {
    case "openDSPhtml":
        $provider_code='<iframe id="ad_iframe_'.$rand_no1.'" src="html/static-ad-creative-'.$wid1.'x'.$hei1.'.html" scrolling="no" frameborder="0" marginwidth="0" marginheight="0"  width="'.$wid1.'" height="'.$hei1.'px"></iframe>";';
        break;
    
    case "openDSP_videoVastOps26":
        $click_link=  urlencode($click_page1.urlencode($ct_creativeVpaid));
        //$url1=   'http://ads.opendsp.com/service/vastservice.php?w='.$wid1.'&h='.$hei1.'&videoUrl='.urlencode($videoUrl).'&iid='.$iid1.'&cid='.$cid1.'&crid='.$ceid1.'&impUrl='.urlencode($imp_link2).'&clickUrl='.urlencode($click_page1).'&trackingUrl='.urlencode($viewAblePxl_link1).'&videoTracking=true';
//        $url11="http://dev0.opendsp.com/demo/vpaid/VPAID.xml";
        $url1=   'http://ads.opendsp.com/service/vastservice.php?w='.$wid1.'&h='.$hei1.'&videoUrl='.urlencode($videoUrl).'&iid='.$iid1.'&cid='.$cid1.'&crid='.$crid1.'&bid='.$bid1.'&videoTracking=true&clickUrl='.$click_link;

        $url2= urlencode($url1);
        //'http://dev0.opendsp.com/demo/OB146/vastservice/vastservice.php?w='.$wid1;
        $provider_code='<html>
            <head>
            </head>
            <body>
            <embed src="http://ads.opendsp.com/service/VPAIDunit.swf"
                 quality="high"
                 bgcolor="#ffffff"
                 width="'.$wid1.'"
                 height="'.$hei1.'"
                 name="myFlashMovie"    
                 FlashVars="url='.$url2.'"
                 align="middle"
                 allowScriptAccess="*"
                 allowFullScreen="true"
                 type="application/x-shockwave-flash"
                 pluginspage="http://www.adobe.com/go/getflash"
            />
            </body>
            </html>';
        break;
        
    case "openDSP_vast":
        $provider_code='<html>
            <head>
            </head>
            <body>
            <embed src="http://ads.opendsp.com/service/VPAIDunit.swf"
                 quality="high"
                 bgcolor="#ffffff"
                 width="'.$wid1.'"
                 height="'.$hei1.'"
                 name="myFlashMovie"    
                 FlashVars="url='.$vast_tag.'&imp1='.urlencode($imp_link2).'&imps2='.urlencode($imp_link).'&clickImp='.urlencode($click_page1).'"
                 align="middle"
                 allowScriptAccess="*"
                 allowFullScreen="true"
                 type="application/x-shockwave-flash"
                 pluginspage="http://www.adobe.com/go/getflash"
            />
            </body>
            </html>';
        break;
        
        
        
    case "openDSP":
        $provider_code='
        <html>
            <head>
               <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
               <script src="http://ads.opendsp.com/service/viewAbleJS/viewAbleODSP.js"></script> 
               ';
        
        if ($ad_type=="swf"){
            $provider_code=$provider_code.'<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script> 
            ';
        }
        
        $provider_code=$provider_code.' 
            </head>            
            <body>
            <script type="text/javascript">
            function handleClickThrough(){
                window.open("'.$click_page_openDSP.'", "_blank");
            }
            

            //start the call to imp and viewAble
            window.onload = function () {
                //code to fire impression
                    new Image().src = "'.$imp_link2.'";
                    
                // start viewable code
                viewAbleObj1=viewAbleObj();
                //console.log (viewAbleObj1);

                // detect active
                    vis=checkIfVisible();
                    if (vis=="hidden"){
                        viewAbleObj1.active=0;
                    }else{
                        viewAbleObj1.active=1;
                    }            
                viewAbleObj1.event="load" ;                                                                                                                                                                                                                                                                         
                new Image().src = "'.$viewAblePxl_link.'&top="+viewAbleObj1.top+"&left="+viewAbleObj1.left+"&right="+viewAbleObj1.right+"&bottom="+viewAbleObj1.bottom+"&iframe="+viewAbleObj1.iframe+"&ad_w="+viewAbleObj1.ad_w+"&ad_h="+viewAbleObj1.ad_h+"&view_w="+viewAbleObj1.view_w+"&view_h="+viewAbleObj1.view_h+"&event="+viewAbleObj1.event+"&viewable="+viewAbleObj1.viewable+"&active="+viewAbleObj1.active +"&isFlash="+viewAbleObj1.isFlash +"&isJS="+viewAbleObj1.isJS +"&pageUrl="+viewAbleObj1.pageUrl +"&device="+viewAbleObj1.device +"&deviceOS="+viewAbleObj1.deviceOS +"&cookiesEnabled="+viewAbleObj1.cookiesEnabled +"&browser="+viewAbleObj1.browser+"&browserVersion="+viewAbleObj1.browserVersion;
        
                currState=vis;
                 setInterval(function(){   
                     vis2=checkIfVisible();
                     if (vis2!==currState){
                         if (vis2=="hidden"){
                             viewAbleObj1.active=0;
                         }else{
                             viewAbleObj1.active=1;
                         }
                         currState=vis2;
                         viewAbleObj1.event="active_changed_to_"+currState ; 
                         //call
                         new Image().src = "'.$viewAblePxl_link.'&top="+viewAbleObj1.top+"&left="+viewAbleObj1.left+"&right="+viewAbleObj1.right+"&bottom="+viewAbleObj1.bottom+"&iframe="+viewAbleObj1.iframe+"&ad_w="+viewAbleObj1.ad_w+"&ad_h="+viewAbleObj1.ad_h+"&view_w="+viewAbleObj1.view_w+"&view_h="+viewAbleObj1.view_h+"&event="+viewAbleObj1.event+"&viewable="+viewAbleObj1.viewable+"&active="+viewAbleObj1.active +"&isFlash="+viewAbleObj1.isFlash +"&isJS="+viewAbleObj1.isJS +"&pageUrl="+viewAbleObj1.pageUrl +"&device="+viewAbleObj1.device +"&deviceOS="+viewAbleObj1.deviceOS +"&cookiesEnabled="+viewAbleObj1.cookiesEnabled +"&browser="+viewAbleObj1.browser+"&browserVersion="+viewAbleObj1.browserVersion;
                    }
                }, 1500);        
            }    





            //end viewable code
            function callForImp(){
                //code to fire impression
                new Image().src = "'.$imp_link2.'";

                //code to fire viewAblePxl
                
                //viewAbleObj=getPosition(frameLevel);
                //viewAbleObj.event="load";
                //new Image().src = "'.$viewAblePxl_link.'&top="+viewAbleObj.top+"&left="+viewAbleObj.left+"&right="+viewAbleObj.right+"&bottom="+viewAbleObj.bottom+"&iframe="+viewAbleObj.iframe+"&ad_w="+viewAbleObj.ad_width+"&ad_h="+viewAbleObj.ad_height+"&view_w="+viewAbleObj.screen_width+"&view_h="+viewAbleObj.screen_height+"&event="+viewAbleObj.event+"&viewable="+viewAbleObj.viewable+"&active="+viewAbleObj.active;
            }                   

            ';
        if ($ad_type=="swf"){
            $provider_code=$provider_code.'//check if flash is enabled in browser  
//                if (detectFlash()>0){
                    //is flash enabled
                    var callback = function(e){
                    if(!e.success || !e.ref){ return false; }

                        e.ref.tabIndex = "-1";
                        e.ref.focus();

                        swfLoadEvent(e, function(){
//                            console.log(" ----- SWF FINISHED LOADING -----");
//                            callForImp();
                        });

                    };                    

                    function swfLoadEvent(e, fn){
                        //Ensure fn is a valid function
                        if(typeof fn !== "function"){ return false; }
                        //This timeout ensures we don\'t try to access PercentLoaded too soon
                        var initialTimeout = setTimeout(function (){
                            //Ensure Flash Player\'s PercentLoaded method is available and returns a value
                            if(typeof e.ref.PercentLoaded !== "undefined" && e.ref.PercentLoaded()){
                                //Set up a timer to periodically check value of PercentLoaded
                                var loadCheckInterval = setInterval(function (){
                                    //Once value == 100 (fully loaded) we can do whatever we want
                                    //console.log("----% SWF ----"+e.ref.PercentLoaded() );
                                    if(e.ref.PercentLoaded() === 100){
                                        //Execute function
                                        fn();
                                        //Clear timer
                                        clearInterval(loadCheckInterval);
                                    }
                                }, 1500);
                            }
                        }, 400);
                    };
        
                    var flashvars = {
                            tagID:"'.$tagID1.'"
                    };
                    var params = {
                      menu: "false"
                    };
                    var attributes = {
                            name:"'.$tagID1.'",
                            id:"'.$tagID1.'"
                    };
                    swfobject.embedSWF("'.$ad_swf_name.'", "a_click", "'.$wid1.'", "'.$hei1.'", "10.0.0","expressInstall.swf", flashvars, params, attributes, callback);
//                }else{
//                   callForImp(); 
//                }
           ';
        }    
        $provider_code=$provider_code.'    </script>
            <noscript>
                <img src="'.$imp_link2.'" width="1" height="1" >
                ';
                
        $provider_code=$provider_code.' 
                <img src="'.$viewAblePxl_link.'&top=-&left=-&right=-&bottom=-&iframe=-&ad_w='.$wid1.'&ad_h='.$hei1.'&view_w=-&view_h=-&event=load&viewable=-&active=-&isFlash=-&isJS=0&pageUrl='.$page_url_encoded.'&device=-&deviceOS=-&cookiesEnabled=-&browser=-&browserVersion=-" width="1" height="1" >           ';  
        $provider_code=$provider_code.'
            </noscript>           

            <div id="dspoverlay" style="position:relative;">
                    <script>
                        var div = document.getElementById("dspoverlay");
                        div.innerHTML = div.innerHTML + \'<div id="underlay" style="cursor: pointer; background-image: url(null.png);   background-repeat: repeat-x;position:absolute;z-index:1;width:'.$wid1.'px;height:'.$hei1.'px" onclick="handleClickThrough()"></div>\'   
                    </script>
                    <div id="no-flash">
                        <a href="'.$click_page_openDSP.'" id="a_click" target="_blank"><img src="'.$ad_img_name.'" style="width:'.$wid1.'px;height:'.$hei1.'px;" alt="Flash is not supported"></a>
                    <div>
            </div>
            </body>
            </html>';
        break;
    case "doubleclick":
        $provider_code="<!-- START DART (iframe) -->
        <IFRAME SRC='http://ad.doubleclick.net/adi/N9310.8427EXPONENTIALINCTRIBALFU/B8208401.110274305;sz=".$wid1."x".$hei1.";click=".urlencode($click_page1).";ord=".$rand_no1."' WIDTH='".$wid1."' HEIGHT='".$hei1."' HSPACE='0' VSPACE='0' FRAMEBORDER='0' BORDERCOLOR='#000000' SCROLLING='no' MARGINHEIGHT='0' MARGINWIDTH='0' >
        </IFRAME>
        <!-- END DART (iframe) -->";
        break;
    case "BurstingPipe":
        $provider_code='<script src="http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=rsb&c=28&pli=10889766&PluID=0&w='.$wid1.'&h='.$hei1.'&ncu='.urlencode($click_page1).'&ord='.$rand_no1.'&ucm=true">
        </script>
        <noscript>
            <a href="'.$click_page1.'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=brd&FlightID=10889766&Page=&PluID=0&Pos=1272442582" target="_blank">
                <img src="http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=bsr&FlightID=10889766&Page=&PluID=0&Pos=1272442582" border=0 width='.$wid1.' height='.$hei1.'>
            </a>
        </noscript>';
        break;
    case "Atlas":
        $provider_code="<\!-- START AtlasDMT (jscript) -->
        <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript' SRC='http://view.atdmt.com/EM3/jview/476458623/direct/01?cache=".$rand_no1."&click=".urlencode($click_page1)."' >
        </SCRIPT>
        <NOSCRIPT>
        <A href='".$click_page1."http://clk.atdmt.com/EM3/go/476458623/direct/01/".$rand_no1."' TARGET='_blank' >
        <IMG SRC='http://view.atdmt.com/EM3/view/476458623/direct/01/".$rand_no1."' BORDER='0' >
        </A>
        </noscript>
        <\!-- END AtlasDMT (jscript) -->";
        break;
    
     case "c_ops12_js1":
         
         if(isset($_COOKIE['_man_crt1'])){
            $provider_code="<script type='text/javascript'>
                <!--//<![CDATA[
                   document.MAX_ct0 ='".$click_page1."';
                   var m3_u = (location.protocol=='https:'?'https://cas.criteo.com/delivery/ajs.php?':'http://cas.criteo.com/delivery/ajs.php?');
                   var m3_r = Math.floor(Math.random()*99999999999);
                   document.write (\"<scr\"+\"ipt type='text/javascript' src='\"+m3_u);
                   document.write (\"zoneid=186540\");
                   document.write ('&amp;cb=' + m3_r);
                   if (document.MAX_used != ',') document.write (\"&amp;exclude=\" + document.MAX_used);
                   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
                   document.write (\"&amp;loc=\" + escape(window.location));
                   if (document.referrer) document.write (\"&amp;referer=\" + escape(document.referrer));
                   if (document.context) document.write (\"&context=\" + escape(document.context));
                   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
                       document.write (\"&amp;ct0=\" + escape(document.MAX_ct0));
                   }
                   if (document.mmm_fo) document.write (\"&amp;mmm_fo=1\");
                   document.write (\"'></scr\"+\"ipt>\");
                //]]>--></script>
                ";
         }else {
             $provider_code="<div>Flash error - c_ops12_js1 </div>";
         }
         break;
       
    case "c_ops12_if1":
         
         if(isset($_COOKIE['_man_crt1'])){
            $provider_code="
                <iframe id='0f1e03bc' name='0f1e03bc' src='http://cas.criteo.com/delivery/afr.php?zoneid=186540&ct0=".urlencode($click_page1)."' framespacing='0' frameborder='no' scrolling='no' width='300' height='250'></iframe>
                ";
         }else {
             $provider_code="<div>Flash error - c_ops12_if1</div>";
         }
         break;

    case "l_jw_001":
        $provider_code='
            <script type="text/javascript" src="http://s.bl-1.com/h/l1X0rx3?url=http://content.jwplatform.com/players/RUPnyTFT-b1k0zOyW.js"></script> 
            <script>
                function playerLogic(e,location){ 
                    var t={ adWatched:false,userInteracted:false};
                    jwplayer(e).onAdComplete(function(){ 
                        t.adWatched=true;
                        jwplayer(e).setVolume(100)
                    }
                    );

                    jwplayer(e).onPlay(function(){
                                    if(t.userInteracted==true){
                                            jwplayer(e).setVolume(100)
                                    }else{
                                            if(t.adWatched==false){
                                                    jwplayer(e).pause(true);
                                                    t.adWatched="none";
                                                    jwplayer(e).setVolume(100)
                                            }
                                            if(t.adWatched==true){
                                                    jwplayer(e).pause(true);
                                                    t.adWatched=false
                                            }
                                    }
                            }
                            );

                            jwplayer(e).onReady(function(){
                                    if (location != \'entry-content\') {
                                            jwplayer(e).setVolume(0);
                                    } 
                            }
                            );
                            jwplayer(e).onPlaylistItem(function(){
                                    if(jwplayer(e).getPlaylistIndex()>0){
                                            t.userInteracted=true
                                    }
                                    if(t.userInteracted==true){
                                            jwplayer(e).setVolume(100)
                                    }else{
                                            t.adWatched=false;
                                            if (location != \'entry-content\') {
                                                    jwplayer(e).setVolume(0);
                                            }
                                    }
                            });

                            jwplayer(e).onDisplayClick(function(){
                                    t.userInteracted=true
                            });

                            jwplayer(e).onAdSkipped(function(){
                                    t.userInteracted=true
                            })
                    }
                    var divs=document.getElementsByTagName("div");
                    for(var i=0; i<divs.length; i++){
                            if(divs[i].getAttribute("id")&&divs[i].getAttribute("id").match(/botr_.*_div/)){
                                    playerLogic(divs[i].getAttribute("id"),document.getElementById(divs[i].getAttribute("id")).parentNode.className);
                            }
                    }
            </script>

                ';
        break;
    
      default:
        $provider_code="<div>No ads available</div>";
        //echo "no provider selected";
    }
    return $provider_code;
}


?>
