<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool - Sldieshow Transition Builder - Jssor Slider Development KIT</title>
    <!-- Link & Block Style -->
    <style>
        a:link
        {
            color: #fff;
            text-decoration: none;
        }
        a:visited
        {
            color: #ff8400;
            text-decoration: none;
        }
        a:hover
        {
            color: #fff;
            text-decoration: underline;
        }
        a:active
        {
            color: #fff;
            text-decoration: underline;
        }
        a:visited.nav
        {
            color: #ff8400;
        }
        a:link.nav
        {
            color: #fff;
        }
        a:hover.nav, a:active.nav
        {
            color: #fff;
        }
        
        a:link.featurenav, a:visited.featurenav
        {
            color: #fff;
        }
        a:hover.featurenav, a:active.featurenav
        {
            color: #0080FF;
        }
        
        .backGreen
        {
        	/*
        	background-color: #27a9e3;
        	background-color: rgba(39, 169, 227, 0.3);
            */
        	background-image: url(../img/site/back-green.png);
        }                         
                                  
        .backBlackGreen           
        {                         
        	background-image: url(../img/site/back-blackgreen.png);
        }                         
                                  
        .backBlack                
        {                         
        	background-image: url(../img/site/back-black.png);
        }                         
                                  
        .backWhite                
        {                         
        	background-image: url(../img/site/back-white.png);
        }
        
        .backBlue
        {
        	/*
        	background-color: #27a9e3;
        	background-color: rgba(0, 0, 160, 0.2);
            */
        	background-image: url(../img/site/back-blue.png);
        }
    </style>
    <!-- Caption & Effect Button & devNav Style -->
    <style>
        A.effectButton, A.effectButton:active, A.effectButton:visited, A.navDev, A.navDev:active, A.navDev:visited
        {
            display: block;
            font-size: 13px;
            line-height: 26px;
            text-align: center;
            background-color: #dadada;
            color: #EB5100;
            text-decoration: none;
            padding: 3px 10px 3px 10px;
            display: inline;
            white-space: nowrap;
        }
        A.effectButton:hover, A.navDev:hover
        {
            color: #EAEAEA;
            background-color: #EB5100;
        }
        A.navDev, A.navDev:active, A.navDev:visited, A.navDev:hover
        {
            left:0px;
            width:255px;
            line-height:26px;
            padding: 0px 5px 0px 5px;
            display: inline-block;
            text-align: left;
        }
    </style>
    <!-- Thumbnail Style Begin -->
    <style>
        .thumb
        {
            position: relative;
            float: left;
            display: inline;
            margin: 25px;
            width: 260px;
            height: 130px;
        }
        .thumbb
        {
            position: absolute;
            left: -1px;
            top: -1px;
            width: 262px;
            height: 132px;
            background-color: #fff;
        }
        .thumbb:hover
        {
            background-color: #ff8400;
        }
        .thumbcb, .thumbc
        {
            position: absolute;
            left: 1px;
            top: 1px;
            width: 260px;
            height: 30px;
        }
        .thumbcb
        {
            background-color: #000;
            filter: alpha(opacity=50);
            opacity: .5;
        }
        .thumbb:hover .thumbcb
        {
            background-color: #ff8400;
        }
        .thumbc
        {
        	font-size: 18px;
        	line-height:30px;
        	text-align:center;
        }
        .thumbix01, .thumbix02, .thumbiv01, .thumbiv02
        {
            position: absolute;
            left: 1px;
            top: 1px;
            width: 260px;
            height: 130px;
        }
        .thumbix01
        {
            background: url(../img/demo/thumbnail-slideshow-effects-01.jpg);
        }
        .thumbix02
        {
            background: url(../img/demo/thumbnail-slideshow-effects-02.jpg);
        }
        .thumbiv01
        {
            background: url(../img/demo/thumbnail-sliders-01.jpg);
        }
        .thumbiv02
        {
            background: url(../img/demo/thumbnail-sliders-02.jpg);
        }
    </style>
    <!-- Thumbnail Style End -->

    <!-- Presentation Style -->
    <style>
    .bricon
    {
        background: url(../img/browser-icons.png);
    }
    </style>
    <!-- Feature Style -->
    <style>
        .feature
        {
            position: absolute;
            width: 350px;
            height: 180px;
        }
        .featureb
        {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #0000A0;
            filter: alpha(opacity=20);
            opacity: .2;
        }
        .featurecb
        {
            position: absolute;
            width: 100%;
            height: 30px;
            background-color: #000;
            filter: alpha(opacity=30);
            opacity: .3;
        }
        .featurec
        {
            position: absolute;
            width: 100%;
            height: 30px;
            text-align: center;
            font-size: 18px;
            line-height: 30px;
            color: #fff;
        }
        .featuret
        {
            position: absolute;
            width: 320px;
            height: 125px;
            top: 40px;
            left: 15px;
            color: #fff;
            font-size: 13px;
            line-height: 26px;
        }
    </style>
    <style>
        .description
        {
            position: relative;
            margin: 0 auto;
            padding: 10px;
            top: 0px;
            left: 0px;
            width: 660px;
        }
        .descriptiont
        {
            position: relative;
            width: 630px;
            color: #fff;
            font-size: 13px;
            line-height: 26px;
        }
    </style>
    <style>
        td, label, input, select, option
        {
            font-family: Arial,Helvetica,sans-serif;
            margin: 0;
            padding:0;
            font-size: 12px;
            line-height: 20px;
        }
        select
        {
            width: 110px;
        }
        .inputText
        {
    	    border: 1px solid lightgray;
    	    background: #fff;
    	    height: 17px;
        }
    </style>
    <!-- Caption Style -->
    <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
        	font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
        	color: #ffffff;
        	text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }
    </style>
    <!--<script type="text/javascript" src="../js/jssor.js"></script>
    <script type="text/javascript" src="../js/jssor.slider.js"></script>
    <script type="text/javascript" src="../assets/Jssor.Json.js"></script>
    <script type="text/javascript" src="../assets/slideshow-transition-builder-controller.js"></script>
    <script type="text/javascript" src="../assets/transition-builder-controller.js"></script>-->
    <script type="text/javascript" src="slideshow-transition-builder-controller.min.js"></script>
</head>
<body style="background-image: url(../img/back.jpg); background-color: #191919; color:#fff;  margin: 0px; padding:0px; font-family:Helvetica,Arial,sans-serif;">    <div class="backGreen" style="position: relative; margin: 0 auto; padding: 5px; width: 960px; height: 100px;">
    <table border="0" cellpadding="0" cellspacing="0" width="600" height="300" align="center">
        <tr>
            <td>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
                <div style="position: relative; width: 600px; height: 300px;" id="slider1_container">

                    <!-- Loading Screen -->
                    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity:.7; position: absolute; display: block;
                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                        <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                            top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                    </div>

                    <div u="slides" style="cursor: move; position: absolute; width: 600px; height: 300px;top:0px;left:0px;overflow:hidden;">
                        <!-- Slide -->
                        <div>
                            <img u="image" src="../img/landscape/01.jpg">
                        </div>
                        <!-- Slide -->
                        <div>
                            <img u="image" src="../img/landscape/02.jpg">
                        </div>
                        <!-- Slide -->
                        <div>
                            <img u="image" src="../img/landscape/04.jpg">
                        </div>
                        <!-- Slide -->
                        <div>
                            <img u="image" src="../img/landscape/05.jpg">
                        </div>
                    </div>
                </div>
                <!-- Jssor Slider End -->
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td width="850" height="25"></td>
        </tr>
    </table>

    <!-- Slideshow Transition Controller Form Begine -->
    <table cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#EEEEEE">
        <tr>
            <td width="850" height="15">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30">
            </td>
            <td width="110" bgcolor="Silver" style="color: white">
                <label for="ssTransition">
                    <b>&nbsp; Slide Transition</b></label>
            </td>
            <td width="570" height="30" bgcolor="Silver" style="color: white">
                <select name="ssTransition" id="ssTransition" style="width: 300px">
                    <option value="">
                </select>
            </td>
            <td width="110" bgcolor="Silver">
                <input type="button" value="Play" id="sButtonPlay" style="width: 110px" name="sButtonPlay" disabled="disabled">
            </td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="ssFormation">
                    Formation:</label>
            </td>
            <td width="110">
                <select name="ssFormation" id="ssFormation">
                    <option value="$JssorSlideshowFormations$.$FormationStraight">Straight
                    <option value="$JssorSlideshowFormations$.$FormationStraightStairs">Straight Stairs
                    <option value="$JssorSlideshowFormations$.$FormationSwirl">Swirl
                    <option value="$JssorSlideshowFormations$.$FormationZigZag">ZigZag
                    <option value="$JssorSlideshowFormations$.$FormationSquare">Square
                    <option value="$JssorSlideshowFormations$.$FormationRectangle">Rectangle
                    <option value="$JssorSlideshowFormations$.$FormationCircle">Circle
                    <option value="$JssorSlideshowFormations$.$FormationCross">Cross
                    <option value="$JssorSlideshowFormations$.$FormationRectangleCross">Rectangle Cross
                    <option value="$JssorSlideshowFormations$.$FormationRandom">Random
                </select>
            </td>
            <td width="65">
            </td>
            <td width="110">
                <label for="ssCols">
                    Cols:</label>
            </td>
            <td width="110">
                <select name="ssCols" id="ssCols">
                    <option value="1" selected="">1
                    <option value="2">2
                    <option value="3">3
                    <option value="4">4
                    <option value="5">5
                    <option value="6">6
                    <option value="7">7
                    <option value="8">8
                    <option value="9">9
                    <option value="10">10
                    <option value="11">11
                    <option value="12">12
                    <option value="13">13
                    <option value="14">14
                    <option value="15">15
                </select>
            </td>
            <td width="65">
            </td>
            <td width="110">
                <input type="checkbox" id="scReverse" name="scReverse"><label for="scReverse" title="Reverse the Assembly">Reverse</label></td>
            <td width="110">
                <input type="checkbox" id="scSlideOut" name="scSlideOut"><label for="scSlideOut">Slide
                    Out</label>
            </td>
            <td width="30">
            </td>
        </tr>
        <tr>
            <td height="25">
            </td>
            <td>
                <label for="ssAssembly">
                    Assembly:</label>
            </td>
            <td>
<!--
    <select name="ssAssembly" id="ssAssembly">
        <option value="$JssorSlider$.$ASSEMBLY_BOTTOM_LEFT">Bottom to Left
        <option value="$JssorSlider$.$ASSEMBLY_BOTTOM_RIGHT">Bottom to Right
        <option value="$JssorSlider$.$ASSEMBLY_TOP_LEFT">Top to Left
        <option value="$JssorSlider$.$ASSEMBLY_TOP_RIGHT">Top to Right
        <option value="$JssorSlider$.$ASSEMBLY_LEFT_TOP">Left to Top
        <option value="$JssorSlider$.$ASSEMBLY_LEFT_BOTTOM">Left to Bottom
        <option value="$JssorSlider$.$ASSEMBLY_RIGHT_TOP">Right to Top
        <option value="$JssorSlider$.$ASSEMBLY_RIGHT_BOTTOM">Right to Bottom
    </select>
        $ASSEMBLY_BOTTOM_LEFT	2049
		$ASSEMBLY_BOTTOM_RIGHT	2050
		$ASSEMBLY_LEFT_BOTTOM	264
		$ASSEMBLY_LEFT_TOP	260
		$ASSEMBLY_RIGHT_BOTTOM	1032
		$ASSEMBLY_RIGHT_TOP	1028
		$ASSEMBLY_TOP_LEFT	513
		$ASSEMBLY_TOP_RIGHT	514
-->
                <select name="ssAssembly" id="ssAssembly">
                    <option value="2049">Bottom to Left
                    <option value="2050">Bottom to Right
                    <option value="513">Top to Left
                    <option value="514">Top to Right
                    <option value="260">Left to Top
                    <option value="264">Left to Bottom
                    <option value="1028">Right to Top
                    <option value="1032">Right to Bottom
                </select>
            </td>
            <td>
            </td>
            <td>
                <label for="ssRows">
                    Rows:</label>
            </td>
            <td>
                <select name="ssRows" id="ssRows">
                    <option value="1" selected="">1
                    <option value="2">2
                    <option value="3">3
                    <option value="4">4
                    <option value="5">5
                    <option value="6">6
                    <option value="7">7
                    <option value="8">8
                    <option value="9">9
                    <option value="10">10
                    <option value="11">11
                    <option value="12">12
                    <option value="13">13
                    <option value="14">14
                    <option value="15">15
                </select>
            </td>
            <td>
            </td>
            <td>
                <input type="checkbox" id="scOutside" name="scOutside"><label for="scOutside" id="slOutside">Play Outside</label></td>
            <td>
                &nbsp;</td>
            <td>
            </td>
        </tr>
        <tr>
            <td height="25">
            </td>
            <td>
                <label for="ssDuration">
                    Duration:</label>
            </td>
            <td>
                <select name="ssDuration" id="ssDuration">
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                    <option value="1000">1000</option>
                    <option value="1100">1100</option>
                    <option value="1200">1200</option>
                    <option value="1500">1500</option>
                    <option value="1800">1800</option>
                    <option value="2000">2000</option>
                    <option value="2500">2500</option>
                    <option value="3000">3000</option>
                    <option value="4000">4000</option>
                    <option value="5000">5000</option>
                </select>
            </td>
            <td>
            </td>
            <td>
                <label for="ssDelay">
                    Delay:</label>
            </td>
            <td>
                <select name="ssDelay" id="ssDelay">
                    <option value="0">0
                    <option value="10">10
                    <option value="20">20
                    <option value="30">30
                    <option value="40">40
                    <option value="50">50
                    <option value="60">60
                    <option value="80">80
                    <option value="100">100
                    <option value="120">120
                    <option value="150">150
                    <option value="160">160
                    <option value="200">200
                    <option value="300">300
                    <option value="400">400
                    <option value="500">500
                    <option value="600">600
                    <option value="800">800
                </select>
            </td>
            <td>
            </td>
            <td>
                &nbsp;</td>
            <td>
                <input type="checkbox" id="scMove" name="scMove"><label for="scMove" id="slMove">Move</label> </td>
            <td>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
        <td width="30"></td>
        <td width="790" height="1" bgcolor="Silver"></td>
        <td width="30"></td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                    Fly 
                (Hor):&nbsp;
            </td>
            <td width="110">
            <select name="ssFlyHorizontal" id="ssFlyHorizontal">
                    <option value="">
                    <option value="2">To Right
                    <option value="1">To Left
                </select></td>
            <td width="65">
            </td>
            <td width="110">
                    Fly (Ver):
            </td>
            <td width="110">
                <select name="ssFlyVertical" id="ssFlyVertical">
                    <option value="">
                    <option value="8">To Bottom
                    <option value="4">To Top
                </select></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="ssClip" id="slClip">Clip:</label></td>
            <td width="110">
                <select name="ssClip" id="ssClip">
                    <option value="">
                    <option value="15">Around
                    <option value="3">Left & Right
                    <option value="12">Top & Bottom
                    <option value="5">Top & Left
                    <option value="6">Top & Right
                    <option value="9">Bottom & Left
                    <option value="10">Bottom & Right
                    <option value="4">Top
                    <option value="8">Bottom
                    <option value="1">Left
                    <option value="2">Right
                    <option value="11">Exclude Top
                    <option value="7">Exclude Bottom
                    <option value="14">Exclude Left
                    <option value="13">Exclude Right
                </select></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stDuringBeginHor" id="slDuringBeginHor">During (Hor):</label></td>
            <td width="110">
                <input name="stDuringBeginHor" id="stDuringBeginHor" style="width:30px;" class="inputText"> to <input name="stDuringLengthHor" id="stDuringLengthHor" style="width:30px; display:inline;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stDuringBeginVer" id="slDuringBeginVer">During (Ver):</label></td>
            <td width="110">
                <input name="stDuringBeginVer" id="stDuringBeginVer" style="width:30px;" class="inputText"> to <input name="stDuringLengthVer" id="stDuringLengthVer" style="width:30px; display:inline;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stDuringBeginClip" id="slDuringBeginClip">During (Clip):</label></td>
            <td width="110">
                <input name="stDuringBeginClip" id="stDuringBeginClip" style="width:30px;" class="inputText"> to <input name="stDuringLengthClip" id="stDuringLengthClip" style="width:30px; display:inline;" class="inputText"></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="85">
                <label for="ssEasingHorizontal" id="slEasingHorizontal">
                    Easing (Hor):</label></td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingHorizontal" id="ssEasingHorizontal">
                    <option value="">
                </select>
            </td>
            <td width="65">
            </td>
            <td width="85">
                <label for="ssEasingVertical" id="slEasingVertical">
                    Easing (Ver):</label>
            </td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingVertical" id="ssEasingVertical">
                    <option value="">
                </select>
            </td>
            <td width="65">
            </td>
            <td width="85">
                <label for="ssEasingClip" id="slEasingClip">
                    Easing (Clip):</label>
            </td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingClip" id="ssEasingClip">
                    <option value="">
                </select></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stScaleHorizontal" id="slScaleHorizontal">
                    Scale (Hor):</label></td>
            <td width="110"><input name="stScaleHorizontal" id="stScaleHorizontal" style="width:108px;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stScaleVertical" id="slScaleVertical">
                    Scale (Ver):</label>
            </td>
            <td width="110"><input name="stScaleVertical" id="stScaleVertical" style="width:108px;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stScaleClip" id="slScaleClip">
                    Scale (Clip):</label>
            </td>
            <td width="110"><input name="stScaleClip" id="stScaleClip" style="width:108px;" class="inputText"></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="ssRoundHorizontal" id="slRoundHorizontal">
                    Round (Hor):</label>
            </td>
            <td width="110">
                <select name="ssRoundHorizontal" id="ssRoundHorizontal">
                    <option value="">
                </select>
            </td>
            <td width="65">
            </td>
            <td width="110">
                <label for="ssRoundVertical" id="slRoundVertical">
                    Round (Ver):</label>
            </td>
            <td width="110">
                <select name="ssRoundVertical" id="ssRoundVertical">
                    <option value="">
                </select>
            </td>
            <td width="65">
            </td>
            <td width="110">
                <label for="ssRoundClip" id="slRoundClip">
                    Round (Clip):</label>
            </td>
            <td width="110">
                <select name="ssRoundClip" id="ssRoundClip">
                    <option value="">
                </select></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
        <td width="30"></td>
        <td width="790" height="1" bgcolor="Silver"></td>
        <td width="30"></td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <input type="checkbox" id="scZoom" name="scZoom"><label for="scZoom" id="slZoom">Zoom</label>
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                <input type="checkbox" id="scRotate" name="scRotate" disabled="disabled"><label for="scRotate" id="slRotate">Rotate</label></td>
            <td width="135">
                &nbsp;</td>
            <td width="65">
            </td>
            <td width="110">
                <input type="checkbox" id="scFade" name="scFade"><label for="scFade">Fade</label></td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stDuringBeginZoom" id="slDuringBeginZoom">During (Zoom):</label></td>
            <td width="110">
                <input name="stDuringBeginZoom" id="stDuringBeginZoom" style="width:30px;" class="inputText"> to <input name="stDuringLengthZoom" id="stDuringLengthZoom" style="width:30px; display:inline;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stDuringBeginRotate" id="slDuringBeginRotate">During (Rotate):</label></td>
            <td width="110">
                <input name="stDuringBeginRotate" id="stDuringBeginRotate" style="width:30px;" class="inputText"> to <input name="stDuringLengthRotate" id="stDuringLengthRotate" style="width:30px; display:inline;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stDuringBeginFade" id="slDuringBeginFade">During (Fade):</label></td>
            <td width="110">
                <input name="stDuringBeginFade" id="stDuringBeginFade" style="width:30px;" class="inputText"> to <input name="stDuringLengthFade" id="stDuringLengthFade" style="width:30px; display:inline;" class="inputText"></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="85">
                <label for="ssEasingZoom" id="slEasingZoom">
                    Easing (Zoom)</label></td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingZoom" id="ssEasingZoom">
                    <option value="">
                </select></td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                <label for="ssEasingRotate" id="slEasingRotate">
                Easing(Rotate)</label></td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingRotate" id="ssEasingRotate">
                    <option value="">
                </select></td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                <label for="ssEasingFade" id="slEasingFade">
                Easing(Fade)</label></td>
            <td width="135">
                <select name="ssEasingFade" id="ssEasingFade" style="width: 135px;">
                    <option value="">
                </select></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stScaleZoom" id="slScaleZoom">
                    Scale (Zoom):</label> </td>
            <td width="110">
                <input name="stScaleZoom" id="stScaleZoom" style="width:108px;" class="inputText"></td>
            <td width="65">
                &nbsp;</td>
            <td width="110">
                <label for="slScaleRotate" id="slScaleRotate">
                    Scale (Rotate):</label> </td>
            <td width="110">
                <input name="stScaleRotate" id="stScaleRotate" style="width:108px;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                <label for="stScaleFade" id="slScaleFade">
                    Scale (Fade):</label> </td>
            <td width="110">
                <input name="stScaleFade" id="stScaleFade" style="width:108px;" class="inputText"></td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="ssRoundZoom" id="slRoundZoom">
                    Round (Zoom):</label> </td>
            <td width="110">
                <select name="ssRoundZoom" id="ssRoundZoom">
                    <option value="">
                </select></td>
            <td width="65">
                &nbsp;</td>
            <td width="110">
                <label for="ssRoundRotate" id="slRoundRotate">
                    Round (Rotate):</label></td>
            <td width="110">
                <select name="ssRoundRotate" id="ssRoundRotate">
                    <option value="">
                </select>
                </td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <input type="checkbox" id="scZIndex" name="scZIndex"><label for="scZoom" id="Label1">Z-Index</label>
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                &nbsp;</td>
            <td width="135">
                &nbsp;</td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stDuringBeginZIndex" id="slDuringBeginZIndex">During (ZIndex):</label></td>
            <td width="110">
                <input name="stDuringBeginZIndex" id="stDuringBeginZIndex" style="width:30px;" class="inputText"> to <input name="stDuringLengthZIndex" id="stDuringLengthZIndex" style="width:30px; display:inline;" class="inputText"></td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="85">
                <label for="ssEasingZIndex" id="slEasingZIndex">
                    Easing (ZInd..)</label></td>
            <td width="135">
                <select style="width: 135px;" name="ssEasingZIndex" id="ssEasingZIndex">
                    <option value="">
                </select></td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                &nbsp;</td>
            <td width="135">
                &nbsp;</td>
            <td width="65">
                &nbsp;</td>
            <td width="85">
                &nbsp;</td>
            <td width="135">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="stScaleZIndex" id="slScaleZIndex">
                    Scale (ZIndex):</label> </td>
            <td width="110">
                <input name="stScaleZIndex" id="stScaleZIndex" style="width:108px;" class="inputText"></td>
            <td width="65">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                <label for="ssRoundZIndex" id="slRoundZIndex">
                    Round (ZIndex):</label> </td>
            <td width="110">
                <select name="ssRoundZIndex" id="ssRoundZIndex">
                    <option value="">
                </select></td>
            <td width="65">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="30">
            </td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="110">
                &nbsp;</td>
            <td width="110">
                &nbsp;</td>
            <td width="65">
                Chess C:
            </td>
            <td width="110">
                <input type="checkbox" id="scChessColHorizontal" name="scChessColHorizontal"><label for="scChessColHorizontal" id="slChessColHorizontal">Horizontal</label> </td>
            <td width="110">
                <input type="checkbox" id="scChessColVertical" name="scChessColVertical"><label for="scChessColVertical" id="slChessColVertical">Vertical</label>
            </td>
            <td width="65">Chess R:
                </td>
            <td width="110"><input type="checkbox" id="scChessRowHorizontal" name="scChessRowHorizontal"><label for="scChessRowHorizontal" id="slChessRowHorizontal">Horizontal</label>
            </td>
            <td width="110"><input type="checkbox" id="scChessRowVertical" name="scChessRowVertical"><label for="scChessRowVertical" id="slChessRowVertical">Vertical</label>
            </td>
            <td width="30">
            </td>
        </tr>
        </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="850" height="5">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
        <tr>
            <td width="30" height="25">
            </td>
            <td width="790" align="center">
                <input id="stTransition" style="width: 780px; height: 25px;" type="text" name="stTransition">
            </td>
            <td width="30">
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#EEEEEE">
        <tr>
            <td width="850" height="15">
                &nbsp;&nbsp;
                </td>
        </tr>
    </table>
    <script>
        slideshow_transition_controller_starter("slider1_container");
    </script>
    <!-- Slideshow Transition Controller Form End -->

    <table align="center" border="0" cellspacing="0" cellpadding="0" style="width: 800px; height: 50px;">
        <tr>
            <td>
            </td>
        </tr>
    </table>
    
    <div class="backGreen" style="position: relative; margin: 0 auto; padding: 5px; width: 960px;">
                    <div style="height:25px;"></div>
                    <div class="description backBlue" style="height:160px;">
                        <div class="descriptiont">
                            The form above is to build and play slideshow transition. You can build a new slideshow transition or modify any of 360+ predefined slideshow transitions.<br>
                            A slideshow transition can be any or combination of 'Fly (Hor)', 'Fly (Ver)', 'Clip', 'Zoom' and 'Rotate'.<br>
Once you get a transition that you prefer, you can copy the transition code from the text box at bottom of the form.
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div id="basicusage" class="description" style="display: table; font-size:26px; text-align:center;">
                            Tool - Sldieshow Transition Builder
                    </div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Formation
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
Shape that how blocks are formed.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Assembly
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A direction value that determines the ORDER to assembly formation, it also determines the ORDER to start animation.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Reverse
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
Whether to reverse "Assembly" or not.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Delay
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
The interval between the beginning of animation of each block.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Duration
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A period in milliseconds indicates how long the whole caption transition will last.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Slide Out
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
Whether to play transition by "Slide Out", otherwize "Slide In".
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Play Outside
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
Whether to display when blocks move outside.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Fly (Hor)
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to move caption element by distance of 'slide width' horizontally.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Fly (Ver)
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to move caption element by distance of 'slide height' vertically.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Clip
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to clip caption element.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Zoom
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to zoom caption element.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Rotate
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to rotate caption element.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;Fade
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
A group of option indicates whether to fade caption element.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;'During'
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
Given a whole caption transition during a period from 0 to 1. For each sub transition, the 'During' option specifies 'begin time' and 'end time' within the whole caption transition.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;'Easing'
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
'Easing' indicates variation of speed to play animation.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;'Scale'
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
'Scale' indicates scale of default value. e.g. for 'Fly (Hor)', the default move distance is 'slide width', if scale is 0.3, the move distance would be 0.3 * 'slide width'.
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="description backBlue" style="display: table; height:20px; line-height:20px;">
                            &nbsp;&nbsp;'Round'
                    </div>
                    <div style="height:10px;"></div>
                    <div class="description backWhite" style="display: table;">
                        <div class="descriptiont" style="color:#000;">
'Round' indicates how many times to repeat the animation. If 'Round' is 2, it plays 2 times.
                        </div>
                    </div>
                </div>
    
    <div style="height: 50px;"></div>

    <div style="position: relative; margin: 0 auto; width: 960px; height: 30px; overflow:hidden;">
        <div style="position: absolute; width: 100%; height: 100%; background-color: #27a9e3;
            filter: alpha(opacity=30); opacity: .3;">
        </div>
        <div style="position: absolute; width: 100%; height: 100%; font-size:13px; color:#fff; line-height:30px;">
        <span>&nbsp;&nbsp;Copy right 2009-2014</span><span style="float:right;">Powered by Jssor&nbsp;&nbsp;</span>
        </div>
    </div>
</body>
</html>