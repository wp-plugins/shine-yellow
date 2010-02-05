<?php

/*
Plugin Name: Shine Yellow
Version: 0.3
Plugin URI: http://euqueroaprender.ismywebsite.com/2010/02/04/shine-yellow-jw-player-wordpress-plugin-3/
Description: This plugin make easy (and fun) the insertion of Jeroen Wijerings Player
Author: Eduardo Mozart de Oliveira
Author URI: http://www.euqueroaprender.ismywebsite.com/
*/

// SCRIPT INFO ///////////////////////////////////////////////////////////////////////////

/*
	Shine Yellow for Wordpress
	(C) 2010 Eduardo Mozart de Oliveira - GNU General Public License

	Please not that this player is released under Creative Commons "BY-NC-SA" License
	Full text at: http://creativecommons.org/licenses/by-nc-sa/2.0/

	This Wordpress plugin is released under a GNU General Public License. A complete version of this license
	can be found here: http://www.gnu.org/licenses/gpl.txt

	This Wordpress plugin has been tested with Wordpress 2.9.1;
	
	This plugin uses:
	JW Player 5.0.753,
	SWFObject 2.2,
	JSColor 1.3.1,
	Tweet It 1.0,
	Facebook It 1.0,
	Viral 2.0.

	This Wordpress plugin is released "as is". Without any warranty. The author cannot
	be held responsible for any damage that this script might cause.

*/

/* Something to have fun, kids! *///////////////////////////////////////////////////////////
	
	add_action('admin_menu', 'shineyellow_admin_menu');
	add_filter('the_content', 'shineyellow_replace', '1');

	function shineyellow_admin_menu(){
		add_options_page('Shine Yellow', 'Shine Yellow', 9, basename(__FILE__), 'shineyellow_options_page');
		wp_enqueue_script('shineyellow-jscolor', '/wp-content/plugins/shine-yellow/admin-objects/jscolor.js');
	}

	function shineyellow_replace($content){
		$o = shineyellow_get_options();

		$flvVars = array("DURATION", "HREF", "THUMBNAIL", "TITLE", "DESCRIPTION", "DATE", "AUTHOR", "BUFFER", "AUTOSTART", "MUTE", "SHUFFLE", "CONTROLBAR", "PLAYERSTRETCHING", "USEVOLUME", "VOLUME", "PLAYLISTPOSITION", "PLAYLISTSIZE", "USEPLUGINS", "VIRAL", "FACEBOOK", "TWITTER", "VIRALPAUSE", "VIRALCOMPLETE", "VIRALMENU", "VIRALDOCK", "VIRALMULTIDOCK", "VIRALEMBED", "VIRALSHARE", "VIRALINFO", "VIRALRECOMMENDATIONS", "VIRALRECOURL", "VIRALEMAILSUBJECT", "VIRALURLFOOTER", "VIRALMATCHCOLOR", "VIRALFGCOLOR", "VIRALUSEFGCOLOR", "VIRALBGCOLOR", "VIRALUSEBGCOLOR", "USESKIN", "SKINURL", "USECUSTOMSKINCOLOR", "BACKCOLOR", "USEBACK", "FRONTCOLOR", "USEFRONT", "LIGHTCOLOR", "USELIGHT", "SCREENCOLOR", "USESCREEN", "FULLSCREEN", "ALLOWSCRIPTACCESS", "WMODE", "ALLOWNETWORKING", "PLAYER", "WIDTH", "HEIGHT");
		$flvVals = array($o['duration'], '', $o['thumbnailurl'], $o['title'], $o['description'], $o['date'], $o['author'], $o['buffer'], $o['autostart'], $o['mute'], $o['shuffle'], $o['controlbar'], $o['playerstretching'], $o['usevolume'], $o['volume'], $o['playlistposition'], $o['playlistsize'], $o['useplugins'], $o['viral'], $o['facebook'], $o['twitter'], $o['viralpause'], $o['viralcomplete'], $o['viralmenu'], $o['viraldock'], $o['viralmultidock'], $o['viralembed'], $o['viralshare'], $o['viralinfo'], $o['viralrecommendations'], $o['viralrecourl'], $o['viralemailsubject'], $o['viralurlfooter'], $o['viralmatchcolor'], $o['viralfgcolor'], $o['viralusefgcolor'], $o['viralbgcolor'], $o['viralusebgcolor'], $o['useskin'], $o['skinurl'], $o['usecustomskincolor'], $o['backcolor'], $o['useback'], $o['frontcolor'], $o['usefront'], $o['lightcolor'], $o['uselight'], $o['screencolor'], $o['usescreen'], $o['fullscreen'], $o['allowscriptaccess'], $o['wmode'], $o['allownetworking'], $o['playerurl'], $o['width'], $o['height']);
		$flvCode = <<<EOT
				<div id='shineyellow'><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script></div>
				<div id='player%DURATION%'>You must have <a href="http://get.adobe.com/flashplayer">the Adobe Flash Player</a> installed to view this player.</div>
				<script type='text/javascript'>
					var flashvars =
					{
						'file': '%HREF%',
						'image': '%THUMBNAIL%',
						'duration': '%DURATION%',
						'title': '%TITLE%',
						'description': '%DESCRIPTION%',
						'date': '%DATE%',
						'author': '%AUTHOR%',
						'bufferlength': '%BUFFER%',
						'autostart': '%AUTOSTART%',
						'mute': '%MUTE%',
						'shuffle': '%SHUFFLE%',
						'controlbar': '%CONTROLBAR%',
						'stretching': '%PLAYERSTRETCHING%',
						%USEVOLUME% 'volume': '%VOLUME%',
						'playlist': '%PLAYLISTPOSITION%',
						'playlistsize': '%PLAYLISTSIZE%',
						%USEPLUGINS% 'plugins': '%VIRAL%%FACEBOOK%%TWITTER%',
						%USEPLUGINS% 'viral.onpause': '%VIRALPAUSE%',
						%USEPLUGINS% 'viral.oncomplete': '%VIRALCOMPLETE%',
						%USEPLUGINS% 'viral.allowmenu': '%VIRALMENU%',
						%USEPLUGINS% 'viral.allowdock': '%VIRALDOCK%',
						%USEPLUGINS% 'viral.multidock': '%VIRALMULTIDOCK%',
						%USEPLUGINS% 'viral.functions': '%VIRALSHARE%%VIRALEMBED%%VIRALINFO%%VIRALRECOMMENDATIONS%',
						%USEPLUGINS% 'viral.recommendations': '%VIRALRECOURL%',
						%USEPLUGINS% 'viral.email_subject': '%VIRALEMAILSUBJECT%',
						%USEPLUGINS% 'viral.email_footer': '%VIRALURLFOOTER%',
						%USEPLUGINS% 'viral.matchplayercolors': '%VIRALMATCHCOLOR%',
						%USEPLUGINS% %VIRALUSEFGCOLOR% 'viral.fgcolor': '%VIRALFGCOLOR%',
						%USEPLUGINS% %VIRALUSEBGCOLOR% 'viral.bgcolor': '%VIRALBGCOLOR%',
						%USESKIN% 'skin': '%SKINURL%',
						%USECUSTOMSKINCOLOR% %USEBACK% 'backcolor': '%BACKCOLOR%',
						%USECUSTOMSKINCOLOR% %USEFRONT% 'frontcolor': '%FRONTCOLOR%',
						%USECUSTOMSKINCOLOR% %USELIGHT% 'lightcolor': '%LIGHTCOLOR%',
						%USECUSTOMSKINCOLOR% %USESCREEN% 'screencolor': '%SCREENCOLOR%',
						'id': 'player%DURATION%'
					};
					var params =
					{
						'allowfullscreen': '%FULLSCREEN%',
						'allowscriptaccess': '%ALLOWSCRIPTACCESS%',
						'allownetworking': '%ALLOWNETWORKING%',
						'wmode': '%WMODE%'
					};
					var attributes =
					{
						'id': 'player%DURATION%',
						'name': 'player%DURATION%'
					};
					swfobject.embedSWF('%PLAYER%', 'player%DURATION%', '%WIDTH%', '%HEIGHT%', '9', false, flashvars, params, attributes);
				</script>
EOT;

		preg_match_all ('/\[media(([^]]+))]/i', $content, $matches);
		
		$flvStrings = $matches[0];
		$flvAttributes = $matches[1];
		for ($i = 0; $i < count($flvAttributes); $i++){
			preg_match_all('!(duration|href|thumbnail|title|description|date|author|buffer|autostart|mute|controlbar|playerstretching|usevolume|volume|playlistposition|shuffle|playlistsize|useplugins|viral|facebook|twitter|viralpause|viralcomplete|viralmenu|viraldock|viralmultidock|viralembed|viralshare|viralinfo|viralrecommendations|viralrecourl|viralemailsubject|viralurlfooter|viralmatchcolor|viralusefgcolor|viralfgcolor|viralusebgcolor|viralbgcolor|useskin|skinurl|usecustomskincolor|backcolor|useback|frontcolor|usefront|lightcolor|uselight|screencolor|usescreen|fullscreen|allowscriptaccess|wmode|allownetworking|player|width|height)="([^"]*)"!i',$flvAttributes[$i],$matches);
			$tmp = $flvCode;
			$flvSetVars = $flvSetVals = array();
			for ($j = 0; $j < count($matches[1]); $j++){
				$flvSetVars[$j] = strtoupper($matches[1][$j]);
				$flvSetVals[$j] = $matches[2][$j];
			}
			for ($j = 0; $j < count($flvVars); $j++){
				$key = array_search($flvVars[$j], $flvSetVars);
				$val = (is_int($key)) ? $flvSetVals[$key] : $flvVals[$j];
				if ($flvVars[$j] == 'HEIGHT')
					$val = intval($val) + 20;
				$tmp = str_replace('%'.$flvVars[$j].'%', $val, $tmp);
			}
			$content = str_replace($flvStrings[$i], "\n\n".$o[''].$tmp.$o['']."\n\n", $content);
		}
		return $content;
	}
	
	function shineyellow_get_options(){
		$defaults = array();
		$defaults['playerurl'] = '/wp-content/plugins/shine-yellow/player.swf';
		$defaults['quicktags'] = 'y';
		$defaults['videourl'] = '/wp-content/uploads/shine-yellow/';
		$defaults['thumbnailurl'] = '/wp-content/uploads/shine-yellow/';
		$defaults['width'] = '480';
		$defaults['height'] = '360';
		$defaults['autostart'] = 'false';
		$defaults['mute'] = 'true';
		$defaults['shuffle'] = 'false';
		$defaults['fullscreen'] = 'true';
		$defaults['controlbar'] = 'bottom';
		$defaults['playerstretching'] = 'uniform';
		$defaults['usevolume'] = '//';
		$defaults['volume'] = '100';
		$defaults['playlistposition'] = 'bottom';
		$defaults['playlistsize'] = '100';
		$defaults['useplugins'] = '//';
		$defaults['viral'] = 'viral-2';
		$defaults['facebook'] = ',fbit-1';
		$defaults['twitter'] = ',tweetit-1';
		$defaults['viralpause'] = 'false';
		$defaults['viralcomplete'] = 'false';
		$defaults['viralmenu'] = 'true';
		$defaults['viraldock'] = 'false';
		$defaults['viralmultidock'] = 'false';
		$defaults['viralshare'] = 'link';
		$defaults['viralembed'] = ',embed';
		$defaults['viralinfo'] = ',info';
		$defaults['viralrecommendations'] = ',recommendations';
		$defaults['viralrecourl'] = '';
		$defaults['viralemailsubject'] = '';
		$defaults['viralurlfooter'] = '';
		$defaults['viralmatchcolor'] = 'true';
		$defaults['viralfgcolor'] = '';
		$defaults['viralusefgcolor'] = '//';
		$defaults['viralbgcolor'] = '';
		$defaults['viralusebgcolor'] = '//';
		$defaults['useskin'] = '//';
		$defaults['skinurl'] = '/wp-content/plugins/shine-yellow/skins/skinname.swf';
		$defaults['usecustomskincolor'] = '//';
		$defaults['backcolor'] = '';
		$defaults['useback'] = '';
		$defaults['frontcolor'] = '';
		$defaults['usefront'] = '';
		$defaults['lightcolor'] = '';
		$defaults['uselight'] = '';
		$defaults['screencolor'] = '';
		$defaults['usescreen'] = '';
		$defaults['buffer'] = '4';
		$defaults['allowscriptaccess'] = 'always';
		$defaults['allownetworking'] = 'all';
		$defaults['wmode'] = 'opaque';
		$defaults['duration'] = '';
		$defaults['description'] = '';
		$defaults['title'] = '';
		$defaults['date'] = '';
		
		$options = get_option('shineyellowsettings');
		if (!is_array($options)){
			$options = $defaults;
			update_option('shineyellowsettings', $options);
		}

		return $options;
	}


	function shineyellow_options_page(){
		if ($_POST['shineyellow']){
			update_option('shineyellowsettings', $_POST['shineyellow']);
			$message = '<div style="background-color:#eff;border:1px solid #dee;margin:10px 0;padding:5px;">Shine Yellow options saved.</div>';
		}

		$o = shineyellow_get_options();

		/* Shine Yellow Settings */
		
		/* Player Settings */
		//Quicktag to insert videos
		$qtyes = ($o['quicktags'] == 'y') ? ' checked="checked"' : '';
		$qtno = ($o['quicktags'] == 'y') ? '' : ' checked="checked"';
		// Autostart
		$asyes = ($o['autostart'] == 'true') ? ' checked="checked"' : '';
		$asno = ($o['autostart'] == 'true') ? '' : ' checked="checked"';
		// Mute
		$mtyes = ($o['mute'] == 'true') ? ' checked="checked"' : '';
		$mtno = ($o['mute'] == 'true') ? '' : ' checked="checked"';
		// Full Screen
		$fsyes = ($o['fullscreen'] == 'true') ? ' checked="checked"' : '';
		$fsno = ($o['fullscreen'] == 'true') ? '' : ' checked="checked"';
		// Control Bar Position
		$cbottom = ($o['controlbar'] == 'bottom') ? ' checked="checked"' : '';
		$cbtop = ($o['controlbar'] == 'top') ? ' checked="checked"' : '';
		$cbover = ($o['controlbar'] == 'over') ? ' checked="checked"' : '';
		$cbnone = ($o['controlbar'] == 'none') ? ' checked="checked"' : '';
		// Stretching
		$apuniform = ($o['playerstretching'] == 'uniform') ? ' checked="checked"' : '';
		$apfill = ($o['playerstretching'] == 'fill') ? ' checked="checked"' : '';
		$apexactfit = ($o['playerstretching'] == 'exactfit') ? ' checked="checked"' : '';
		$apnone = ($o['playerstretching'] == 'none') ? ' checked="checked"' : '';
		// "Use this?" options
		$usevolumeyes = ($o['usevolume'] == '') ? ' checked="checked"' : '';
		$usevolumeno = ($o['usevolume'] == '//') ? ' checked="checked"' : '';
		
		/* Plugins options */
		// "Use this?" options
		$usepluginsyes = ($o['useplugins'] == '') ? ' checked="checked"' : '';
		$usepluginsno = ($o['useplugins'] == '//') ? ' checked="checked"' : '';
		// Viral
		$viral = ($o['viral'] == 'viral-2') ? ' checked="checked"' : '';
		$vpyes = ($o['viralpause'] == 'true') ? ' checked="checked"' : '';
		$vpno = ($o['viralpause'] == 'true') ? '' : ' checked="checked"';
		$vcyes = ($o['viralcomplete'] == 'true') ? ' checked="checked"' : '';
		$vcno = ($o['viralcomplete'] == 'true') ? '' : ' checked="checked"';
		$vmyes = ($o['viralmenu'] == 'true') ? ' checked="checked"' : '';
		$vmno = ($o['viralmenu'] == 'true') ? '' : ' checked="checked"';
		$vdyes = ($o['viraldock'] == 'true') ? ' checked="checked"' : '';
		$vdno = ($o['viraldock'] == 'true') ? '' : ' checked="checked"';
		$vmdyes = ($o['viralmultidock'] == 'true') ? ' checked="checked"' : '';
		$vmdno = ($o['viralmultidock'] == 'true') ? '' : ' checked="checked"';
		$viralshare = ($o['viralshare'] == 'link') ? ' checked="checked"' : '';
		$viralembed = ($o['viralembed'] == ',embed') ? ' checked="checked"' : '';
		$viralinfo = ($o['viralinfo'] == ',info') ? ' checked="checked"' : '';
		$viralrecommendations = ($o['viralrecommendations'] == ',recommendations') ? ' checked="checked"' : '';
		$vmcyes = ($o['viralmatchcolor'] == 'true') ? ' checked="checked"' : '';
		$vmcno = ($o['viralmatchcolor'] == 'true') ? '' : ' checked="checked"';
		$vfgno = ($o['viralusefgcolor'] == '//') ? ' checked="checked"' : '';
		$vbgno = ($o['viralusebgcolor'] == '//') ? ' checked="checked"' : '';
		// Tweet It
		$twitter = ($o['twitter'] == ',tweetit-1') ? ' checked="checked"' : '';
		// Facebook It
		$facebook = ($o['facebook'] == ',fbit-1') ? ' checked="checked"' : '';
		
		/* Playlist options */
		// Playlist position
		$plnone = ($o['playlistposition'] == 'none') ? ' checked="checked"' : '';
		$plbottom = ($o['playlistposition'] == 'bottom') ? ' checked="checked"' : '';
		$plover = ($o['playlistposition'] == 'over') ? ' checked="checked"' : '';
		$plright = ($o['playlistposition'] == 'right') ? ' checked="checked"' : '';
		$plleft = ($o['playlistposition'] == 'left') ? ' checked="checked"' : '';
		$pltop = ($o['playlistposition'] == 'top') ? ' checked="checked"' : '';
		// Shuffle
		$shyes = ($o['shuffle'] == 'true') ? ' checked="checked"' : '';
		$shno = ($o['shuffle'] == 'true') ? '' : ' checked="checked"';
		
		 /* Personalize your player */
		 // "Use this?" options
		$useskinyes = ($o['useskin'] == '') ? ' checked="checked"' : '';
		$useskinno = ($o['useskin'] == '//') ? ' checked="checked"' : '';
		$usecustomskincoloryes = ($o['usecustomskincolor'] == '') ? ' checked="checked"' : '';
		$usecustomskincolorno = ($o['usecustomskincolor'] == '//') ? ' checked="checked"' : '';
		$ubno = ($o['useback'] == '//') ? ' checked="checked"' : '';
		$ufno = ($o['usefront'] == '//') ? ' checked="checked"' : '';
		$ulno = ($o['uselight'] == '//') ? ' checked="checked"' : '';
		$usno = ($o['usescreen'] == '//') ? ' checked="checked"' : '';
		
		/* Advanced Options */
		// Allow Script Access
		$pmalways = ($o['allowscriptaccess'] == 'always') ? ' checked="checked"' : '';
		$pmsamedomain = ($o['allowscriptaccess'] == 'samedomain') ? ' checked="checked"' : '';
		$pmnever = ($o['allowscriptaccess'] == 'never') ? ' checked="checked"' : '';
		// Allow allownetworkinging
		$netall = ($o['allownetworking'] == 'all') ? ' checked="checked"' : '';
		$netinternal = ($o['allownetworking'] == 'internal') ? ' checked="checked"' : '';
		$netnone = ($o['allownetworking'] == 'none') ? ' checked="checked"' : '';
		// WMode
		$wmopaque = ($o['wmode'] == 'opaque') ? ' checked="checked"' : '';
		$wmtransparent = ($o['wmode'] == 'transparent') ? ' checked="checked"' : '';

		echo <<<EOT
		<div class="wrap">
			<h2>Shine Yellow Options</h2>
			{$message}
			<a href="http://euqueroaprender.ismywebsite.com/2010/02/04/shine-yellow-jw-player-wordpress-plugin-3/">Home page</a> | <a href="http://euqueroaprender.ismywebsite.com/2010/02/04/documentao-do-shine-yellow/">Documentation</a>
			<form name="form1" method="post" action="options-general.php?page=shine-yellow.php">
			
			<fieldset class="options"><br />
				<legend>Required Shine Yellow setting</legend>
				<p>To make this plugin actually do anything it is required that you set the option below correctly.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row">(Full) URL to player.swf</th>
						<td><input type="text" value="{$o['playerurl']}" name="shineyellow[playerurl]" size="50" /></td>
					</tr>
				</table>
			</fieldset>
			<br />

			<fieldset class="options">
				<legend><h2>Player settings</h2></legend>
				<p>To make optimal use of the Shine Yellow plugin you can set the options below.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row">Use Quicktag to insert FLV</th>
						<td>
							<input type="radio" value="y" name="shineyellow[quicktags]"{$qtyes} /> yes<br />
							<input type="radio" value="n" name="shineyellow[quicktags]"{$qtno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th>Default URL to video files</th>
						<td><input type="text" value="{$o['videourl']}" name="shineyellow[videourl]" size="50" /></td>
					</tr>
					<tr valign="top">
						<th>Default URL to thumbnail files</th>
						<td><input type="text" value="{$o['thumbnailurl']}" name="shineyellow[thumbnailurl]" size="50" /></td>
					</tr>
					<tr valign="top">
						<th>Default movie size (W x H)</th>
						<td>
							<input type="text" value="{$o['width']}" name="shineyellow[width]" size="3" maxlength="4" />
							<input type="text" value="{$o['height']}" name="shineyellow[height]" size="3" maxlength="4" />
						</td>
					</tr>
					<tr valign="top">
						<th>Autostart movies (consider bandwidth!)</th>
						<td>
							<input type="radio" value="true" name="shineyellow[autostart]"{$asyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[autostart]"{$asno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th>Default mute?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[mute]"{$mtyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[mute]"{$mtno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th>Allow Fullscreen?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[fullscreen]"{$fsyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[fullscreen]"{$fsno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th>Controlbar Position</th>
						<td>
							<input type="radio" value="bottom" name="shineyellow[controlbar]"{$cbottom} /> bottom (default)<br />
							<input type="radio" value="top" name="shineyellow[controlbar]"{$cbtop} /> top<br />
							<input type="radio" value="over" name="shineyellow[controlbar]"{$cbover} /> over<br />
							<input type="radio" value="none" name="shineyellow[controlbar]"{$cbnone} /> none<br />
						</td>
					</tr>
					<tr valign="top">
						<th>Stretching appearence</th>
						<td>
							<input type="radio" value="uniform" name="shineyellow[playerstretching]"{$apuniform} /> uniform (default)<br />
							<input type="radio" value="fill" name="shineyellow[playerstretching]"{$apfill} /> fill<br />
							<input type="radio" value="exactfit" name="shineyellow[playerstretching]"{$apexactfit} /> exact fit<br />
							<input type="radio" value="none" name="shineyellow[playerstretching]"{$apnone} /> none<br />
						</td>
					</tr>
					<tr valign="top">
						<th>Use 'Volume'?</th>
						<td>
							<input type="radio" value="" name="shineyellow[usevolume]"{$usevolumeyes} /> yes<br />
							<input type="radio" value="//" name="shineyellow[usevolume]"{$usevolumeno} /> no <br />
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Volume (0 at 100)</th>
						<td><input type="text" value="{$o['volume']}" name="shineyellow[volume]" size="3" maxlength="3" /></td>
					</tr>
				</table>
			</fieldset>
			<br />
			  <fieldset class="options">
			   <h2>Playlist options</h2>
		       <p>Configure your playlist options bellow.</p>
	           <table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th>Shuffle mode?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[shuffle]"{$shyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[shuffle]"{$shno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Default playlist size</th>
						<td><input type="text" value="{$o['playlistsize']}" name="shineyellow[playlistsize]" size="5" /><br /><i>default: 100</i></td>
					</tr>
				</table>
			</fieldset>
			<br />
			
						<fieldset class="options">
				<h2>Plugins options</h2>
				<p>Make your player with your likes setting the options below.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th>Use Plugins?</th>
						<td>
							<input type="radio" value="" name="shineyellow[useplugins]"{$usepluginsyes} /> yes<br />
							<input type="radio" value="//" name="shineyellow[useplugins]"{$usepluginsno} /> no <br />
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Select the plugin that you should want to use on checkbox below:</th>
						<td>
							<input type="checkbox" value="viral-2" name="shineyellow[viral]"{$viral} /> Viral<br />
							<input type="checkbox" value=",fbit-1" name="shineyellow[facebook]"{$facebook} /> Facebook It<br />
							<input type="checkbox" value=",tweetit-1" name="shineyellow[twitter]"{$twitter} /> Tweet It
						</td>
					</tr>
				</table>
			</fieldset>
			<br />
			
EOT;
if($o['viral'] == 'viral-2'){
echo <<<EOT
				<fieldset class="options">
				<h2>Viral plugin options</h2>
				<p>Make Viral with your likes setting the options below.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row">Show Viral menu when video is paused?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viralpause]"{$vpyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[viralpause]"{$vpno} /> no (default)
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Show Viral menu when video is completed?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viralcomplete]"{$vcyes} /> yes<br />
							<input type="radio" value="false" name="shineyellow[viralcomplete]"{$vcno} /> no (default)
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Show Viral menu on controlbar?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viralmenu]"{$vmyes} /> yes (default)<br />
							<input type="radio" value="false" name="shineyellow[viralmenu]"{$vmno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Show Viral dock?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viraldock]"{$vdyes} /> yes <br />
							<input type="radio" value="false" name="shineyellow[viraldock]"{$vdno} /> no (default)
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Show Viral multidock?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viralmultidock]"{$vmdyes} /> yes <br />
							<input type="radio" value="false" name="shineyellow[viralmultidock]"{$vmdno} /> no (default)
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Select the functions that you want on viral:</th>
						<td>
					  <input type="checkbox" value="link" name="shineyellow[viralshare]"{$viralshare} /> Share (default)<br />
					  <input type="checkbox" value=",embed" name="shineyellow[viralembed]"{$viralembed} /> Embed (default)<br />
					  <input type="checkbox" value=",info" name="shineyellow[viralinfo]"{$viralinfo} /> Info (default)<br />
					  <input type="checkbox" value=",recommendations" name="shineyellow[viralrecommendations]"{$viralrecommendations} /> Recommendations
						</td>
					</tr>
EOT;
if($o['viralshare'] == 'link'){
echo <<<EOT
					<tr valign="top">
						<th width="33%" scope="row">Email subject.</th>
						<td><input type="text" value="{$o['viralemailsubject']}" name="shineyellow[viralemailsubject]" size="50" /><br /><i>Default: Check out this video!</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Link at the footer of the email.</th>
						<td><input type="text" value="{$o['viralurlfooter']}" name="shineyellow[viralurlfooter]" size="50" /><br /><i>Default: http://www.longtail.com/</td>
					</tr>
EOT;
}
if($o['viralrecommendations'] == ',recommendations'){
echo <<<EOT
					<tr valign="top">
						<th width="33%" scope="row">(Full) URL to Reccomendations on mRSS XML format.</th>
						<td><input type="text" value="{$o['viralrecourl']}" name="shineyellow[viralrecourl]" size="50" /> </td>
					</tr>
EOT;
}
echo <<<EOT
					<tr valign="top">
						<th width="33%" scope="row">Same color with the player?</th>
						<td>
							<input type="radio" value="true" name="shineyellow[viralmatchcolor]"{$vmcyes} /> yes (default)<br />
							<input type="radio" value="false" name="shineyellow[viralmatchcolor]"{$vmcno} /> no (select the colors below)
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Viral colors:</th>
						<td> <b>Foreground (Text)</b> <input type="text" value="{$o['viralfgcolor']}" name="shineyellow[viralfgcolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />
EOT;
if($o['viralmatchcolor'] == 'false'){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[viralusefgcolor]"{$vfgno} /> no
EOT;
}
echo <<<EOT
					<br /> <b>Background</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="{$o['viralbgcolor']}" name="shineyellow[viralbgcolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />
EOT;
if($o['viralmatchcolor'] == 'false'){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[viralusebgcolor]"{$vbgno} /> no
EOT;
}
echo <<<EOT
					</td>
				</tr>
			</table>
		</fieldset>
	<br />
EOT;
}
if($o['twitter'] == ',tweetit-1'){
if($o['facebook'] == ',fbit-1'){
echo <<<EOT
				<fieldset class="options">
				<h2>Facebook it/Twitter it plugin options</h2>
				<p>These plugins does not have options. Just activate it and enjoy. To change these colors, go to "Personalize your player", and change the skins colors on "frontcolor" and "background" color.</p>
		</fieldset>
	<br />
EOT;
}
	}
echo <<<EOT
			
						<fieldset class="options">
				<h2>Personalize your player</h2>
				<p>Make your player cooler setting the options below.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th>Use Skin?</th>
						<td>
							<input type="radio" value="" name="shineyellow[useskin]"{$useskinyes} /> yes<br />
							<input type="radio" value="//" name="shineyellow[useskin]"{$useskinno} /> no
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">(Full) URL to Skin</th>
						<td><input type="text" value="{$o['skinurl']}" name="shineyellow[skinurl]" size="50" /> </td>
					</tr>
					<tr valign="top">
						<th>Use Custom Collors?</th>
						<td>
							<input type="radio" value="" name="shineyellow[usecustomskincolor]"{$usecustomskincoloryes} /> yes<br />
							<input type="radio" value="//" name="shineyellow[usecustomskincolor]"{$usecustomskincolorno} /> no <br />
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">Backcolor</th>
						<td><input type="text" value="{$o['backcolor']}" name="shineyellow[backcolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />	
EOT;
if($o['usecustomskincolor'] == ''){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[useback]"{$ubno} /> no</td>
EOT;
}
echo <<<EOT
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">FrontColor</th>
						<td><input type="text" value="{$o['frontcolor']}" name="shineyellow[frontcolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />
EOT;
if($o['usecustomskincolor'] == ''){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[usefront]"{$ufno} /> no</td>
EOT;
}
echo <<<EOT
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">LightColor</th>
						<td><input type="text" value="{$o['lightcolor']}" name="shineyellow[lightcolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />
EOT;
if($o['usecustomskincolor'] == ''){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[uselight]"{$ulno} /> no</td>
EOT;
}
echo <<<EOT
					</tr>
					<tr valign="top">
						<th width="33%" scope="row">ScreenColor</th>
						<td><input type="text" value="{$o['screencolor']}" name="shineyellow[screencolor]" class="color {pickerMode:'HVS',pickerPosition:'right',pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black',caps:false}" size="6" maxlength="6" />
EOT;
if($o['usecustomskincolor'] == ''){
echo <<<EOT
  Use this? <input type="checkbox" value="//" name="shineyellow[usescreen]"{$usno} /> no</td>
EOT;
}
echo <<<EOT
					</tr>
				</table>
			</fieldset>
			    <br />
				
										<fieldset class="options">
				<h2>Advanced Settings</h2>
				<p>Please do not edit nothing here if you do not know what is. Some thing wrong and bye bye Shine Yellow.</p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row">Buffer time (in seconds. Default: 4)</th>
						<td><input type="text" value="{$o['buffer']}" name="shineyellow[buffer]" size="3" maxlength="2" /></td>
					</tr>
					<tr valign="top">
						<th>Allow script access</th>
						<td>
							<input type="radio" value="always" name="shineyellow[allowscriptaccess]"{$pmalways} /> always (default)<br />
							<input type="radio" value="samedomain" name="shineyellow[allowscriptaccess]"{$pmsamedomain} /> same domain<br />
							<input type="radio" value="never" name="shineyellow[allowscriptaccess]"{$pmnever} /> never<br />
						</td>
					</tr>
					<tr valign="top">
						<th>Allow networking</th>
						<td>
							<input type="radio" value="all" name="shineyellow[allownetworking]"{$netall} /> all (default)<br />
							<input type="radio" value="internal" name="shineyellow[allownetworking]"{$netinternal} /> internal<br />
							<input type="radio" value="none" name="shineyellow[allownetworking]"{$netnone} /> none<br />
						</td>
					</tr>
					<tr valign="top">
						<th>WMode</th> 
						<td>
							<input type="radio" value="opaque" name="shineyellow[wmode]"{$wmopaque} /> opaque (default)<br />
							<input type="radio" value="transparent" name="shineyellow[wmode]"{$wmtransparent} /> transparent<br />
						</td>
					</tr>
				</table>
			</fieldset>
			<br />
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
			<fieldset class="options">
				<h2>Support this plugin!</h2>
				<p>Hi! I just want to say that this plugin take 2 months of hard work to finish. It's a lot of time, and study. No, i won't go to ask to you your money on donations. I just want to say thanks to use my plugin and how i'm happy with it. If you can to access the official webpage and to say "thanks!" in your language for this plugin i will go to stay <u>really</u> happy.<br /> 
				Why Shine Yellow is free? <br /><br />1. Because this plugin is dedicated to Yasmin Kolling Soares, the most wonderful girl on earth for me <img src="/wp-content/plugins/shine-yellow/admin-objects/heart.png" width="13" height="11" />; <br /><br />2. What do you get if you buy WordPress plugin? Lots of php codes, nothing more. If they were distributed as art, I could understand paying it. But if the main goal of their order is to earn money - by fees or ads - I don't like it! <br /><br />
				Conclusion: This means that I grant you the license to use Shine Yellow as much as you like. But if you like it, I ask two things of you: say a prayer for me (and the most wonderful girl while you're at it ;) ) to your God - or whatever you believe - and wish us some luck. :)<br /><br /></p>
		</fieldset>
			</form>
		</div>
EOT;
	}

	if(strpos($_SERVER['REQUEST_URI'], 'post-new.php') || strpos($_SERVER['REQUEST_URI'], 'page-new.php') || strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'], 'page.php') ) {

		add_action('admin_footer', 'flvAddQuicktag');

		function flvAddQuickTag(){
			$o = shineyellow_get_options();

			if($o['quicktags'] == 'y'){
				echo <<<EOT
				<script type="text/javascript">
					<!--
						var flvToolbar = document.getElementById("ed_toolbar");
						if(flvToolbar){
							var flvNr = edButtons.length;
							// edButtons[edButtons.length] = new edButton('ed_popin','','','</a>','');
							edButtons[edButtons.length] = new edButton('ed_flv','','','','');
							var flvBut = flvToolbar.lastChild;
							while (flvBut.nodeType != 1){
								flvBut = flvBut.previousSibling;
							}
							flvBut = flvBut.cloneNode(true);
							flvToolbar.appendChild(flvBut);
							//toolbar.appendChild(flvBut);
							flvBut.value = 'FLV';		
							flvBut.onclick = edInsertFLV;
							flvBut.title = "Insert a Flash Video";
							flvBut.id = "ed_flv";
						}

						function edInsertFLV() {
							if(!edCheckOpenTags(flvNr)){
								var U = prompt('Give the Url of the Flash Video File' , '{$o["videourl"]}');
								var W = prompt('Give the width of this video' , '{$o["width"]}');
								var H = prompt('Give the height of this video' , '{$o["height"]}');
								var I = prompt('Give the thumbnail of this video (optional)' , '{$o["thumbnailurl"]}');
								var D = prompt('Give the duration of this video in seconds. Read the 2 page of documentation about duration if you need help to do it (optional)' , '{$o["duration"]}');
								var theTag = '[media href="' + U + '" width="' + W + '" height="' + H + '" thumbnail="' + I + '" duration="' + D + '"]';
								edButtons[flvNr].tagStart  = theTag;
								edInsertTag(edCanvas, flvNr);
							} else {
								edInsertTag(edCanvas, flvNr);
							}
						}

					//-->
				</script>
				<script type="text/javascript">
					<!--
						var flvToolbar = document.getElementById("ed_toolbar");
						if(flvToolbar){
							var flvNr = edButtons.length;
							// edButtons[edButtons.length] = new edButton('ed_popin','','','</a>','');
							edButtons[edButtons.length] = new edButton('ed_flv','','','','');
							var flvBut = flvToolbar.lastChild;
							while (flvBut.nodeType != 1){
								flvBut = flvBut.previousSibling;
							}
							flvBut = flvBut.cloneNode(true);
							flvToolbar.appendChild(flvBut);
							//toolbar.appendChild(flvBut);
							flvBut.value = 'FLV Playlist';		
							flvBut.onclick = edInsertFLV;
							flvBut.title = "Insert a Flash Video Playlist";
							flvBut.id = "ed_flv";
						}

						function edInsertFLV() {
							if(!edCheckOpenTags(flvNr)){
								var U = prompt('Give the Url of the Playlist in XML format. Read the documentation on shine yellow help to know how to create one. (page 3)' , '{$o["videourl"]}');
								var W = prompt('Give the width of this playlist. Recommended for playlists: 620' , '{$o["width"]}');
								var H = prompt('Give the height of this playlist. Recommended for playlists: 520' , '{$o["height"]}');
								var P = prompt('Give the playlist position. You can use: bottom, over, right, left and top. Read the documentation (page 2) if you have any question.' , '{$o["playlistposition"]}');
								var theTag = '[media href="' + U + '" width="' + W + '" height="' + H + '" playlistposition="' + P + '"]';
								edButtons[flvNr].tagStart  = theTag;
								edInsertTag(edCanvas, flvNr);
							} else {
								edInsertTag(edCanvas, flvNr);
							}
						}

					//-->
				</script>
EOT;
			}
		}
	}
	
?>
