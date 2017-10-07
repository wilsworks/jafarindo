<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Mozzat
 * @copyright	Copyright (c) 2008 - 2011, Mozzat.
 * @license		http://mozzat.net
 * @link		http://mozzat.net
 * @since		Version 1.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * CodeIgniter Google Map Class 
 * Google Maps API v3
 * 
 * This class enables the creation of google maps
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Mozzat Infinite Dev Team
 */
class Google_map 
{
	
	var $CI;
	var $api_key = '';
	var $sensor = 'false';
	var $div_id = '';
	var $div_class = '';
	var $zoom = 10;
	var $lat = -300;
	var $lon = 300;
	var $markers = array();
	
	var $animation = '';
	var $icon = '';
	var $icons = array();
	
	/**
	 * Constructor
	 */
	function __construct() 
	{
		log_message('debug', "Google Map Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Initialize the user preferences
	 *
	 * Accepts an associative array as input, containing display preferences
	 *
	 * @access	public
	 * @param	array	config preferences
	 * @return	void
	 */
	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
	
	
	// --------------------------------------------------------------------

	/**
	 * Generate the google map
	 *
	 * @access	public
	 * @return	string
	 */
	function generate()
	{

		$out = '';
			
		$out .= '	<div id="'.$this->div_id.'" class="'.$this->div_class.'"></div>';
		
		$out .= '	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key='.$this->api_key.'&sensor='.$this->sensor.'"></script>';
		
    	$out .= '	<script type="text/javascript"> 
    	
						function doAnimation() 
						{
							if (marker.getAnimation() != null) 
							{
								marker.setAnimation(null); 
							} 
							else 
							{
								marker.setAnimation(google.maps.Animation.'.$this->animation.');
							}
						}
		
    					function initialize() 
    					{
    						
    						var myOptions = {
    							center: new google.maps.LatLng('.$this->lat.','.$this->lon.'), 
    							Zoom:'.$this->zoom.', 
    							mapTypeId: google.maps.MapTypeId.ROADMAP 
							};';
							
	    
	    $out .= '			var map = new google.maps.Map(document.getElementById("'.$this->div_id.'"), myOptions);'; 
							
							$i = 0;
							foreach ($this->markers as $key => $value) 
							{								
								$out .="var marker".$i." = new google.maps.Marker({
									 												position: new google.maps.LatLng(".$value."), 
									 												map: map,"; 
																					if ($this->animation != '') { $out .="animation: google.maps.Animation.".$this->animation.","; }
																					if ($this->icon != '') { $out .="icon:'".$this->icon."',"; } elseif (count($icons) > 0) { $out .="icon:'".$this->icons[$i]."',"; }
																			$out .="title:'".$key."'});";
								if($this->animation != '')
								{
									$out .="google.maps.event.addListener(marker".$i.", 'click', doAnimation);";
								}
								
								$i++;
							}
		
		$out .= '		} 
						
						initialize();
					
					</script>';
		
		return $out;
	}
	
}
