<?php

	/*
	function console_log($msg) {
		echo '<script>' .
          'console.log("'.$msg .' ")</script>';
	}
	console_log("Debug works!");
	*/
	

class pluginInfoStripe extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'color'=>'#d00000',
			'fontsize'=>'16',
			'text'=>'Welcome to my website',
			'fontcolor'=>'#ffffff',
			'display' => 'right'
		);
	}

	public function form()
	{
		global $L;


		$html = '<div>';
		$html .= '<label>'.$L->get('Ribbon-Color').'</label>';
		$html .= '<input name="color" id="InfoStripeColor" type="color" value="'.$this->getValue('color').'">';
		$html .= '</div>';
		
		$html .= '<div>';
		$html .= '<label>'.$L->get('Font-Color').'</label>';
		$html .= '<input name="fontcolor" id="InfoStripeColor" type="color" value="'.$this->getValue('fontcolor').'">';
		$html .= '</div>';
		
	
		$html .= '<div>';
		$html .= '<label>'.$L->get('Fontsize').'</label>';
		$html .= '<input name="fontsize" id="InfoStripeFontSize" type="number" value="'.$this->getValue('fontsize').'">';
		$html .= '</div>';


		$html .= '<div>';
		$html .= '<label>'.$L->get('Text').'</label>';
		$html .= '<input name="text" id="InfoStripeText" type="text" value="'.$this->getValue('text').'">';
		$html .= '</div>';
		

		$html .= '<div>';
		$html .= '<label for="display">'.$L->get('Horizontal orientation').'</label>';
		$html .= '<select name="display">';		
	        $displayOptions = array( 'left'=> $L->get('Left'), 'right'=> $L->get('Right') );
	        foreach($displayOptions as $displaytext=>$value)
	            $html .= '<option value="'.$displaytext.'"'.( ($this->getValue('display')===$displaytext)?' selected="selected"':'').'>'.$value.'</option>';
	    $html .= '</select>';
		$html .= '</div>';


		return $html;
	}



	public function siteHead()
	{


		$html  = '<!-- InfoStripe CSS-->';
		$html .= '<link rel="stylesheet" type="text/css" href="/bl-plugins/InfoStripe/InfoStripeStyle.css">';

		return $html;
	}




	public function siteBodyBegin()
	{



	$InfoStripeText = $this->getValue('text');
	$InfoStripeText = htmlspecialchars_decode($InfoStripeText);
	
	
	$InfoStripeUrl = $this->getValue('url');
	$InfoStripeUrl = htmlspecialchars_decode($InfoStripeUrl);




		$html  = '<!-- InfoStripe Ribbon-->';
		$html .= '<div id="InfoStripe" class="InfoStripe '.$this->getValue('display').'" data-ribbon="'.$InfoStripeText.'" style="--c:'.$this->getValue('color').';--f:'.$this->getValue('fontsize').'px;--g:'.$this->getValue('fontcolor').';"></div>';

		return $html;
	}
	
	
	

	
	

}
?>