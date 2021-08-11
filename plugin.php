<?php

class pluginInfoStripe extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'color'=>'white',
			'fontsize'=>'16',
			'text'=>'Your Ribbon-Text'
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
		$html .= '<label>'.$L->get('Ribbon-Fontsize').'</label>';
		$html .= '<input name="fontsize" id="InfoStripeFontSize" type="number" value="'.$this->getValue('fontsize').'">';
		$html .= '</div>';


		$html .= '<div>';
		$html .= '<label>'.$L->get('Ribbon-Text').'</label>';
		$html .= '<input name="text" id="InfoStripeText" type="text" value="'.$this->getValue('text').'">';
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




		$html  = '<!-- InfoStripe Ribbon-->';
		$html .= '<div class="InfoStripe" data-ribbon="'.$InfoStripeText.'" style="--c:'.$this->getValue('color').';--f:'.$this->getValue('fontsize').'px;"></div>';

		return $html;
	}

}
?>