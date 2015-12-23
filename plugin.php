<?php

class BaldursPhotographyXMasLights extends KokenPlugin {
	function __construct() {
		$this->require_setup = false;
		$this->register_hook('before_closing_body', 'render');
	}

	function render() {
		$xmas_top		= $this->data->xmas_light_top;
		$xmas_position	= $this->data->xmas_light_position;
		$xmas_marg_left	= $this->data->xmas_light_marg_left;
		$xmas_zindex	= $this->data->xmas_light_zindex;
		$path			= $this->get_path();
echo <<<OUT
<!-- xmas_lights [ start ] -->
<script type="text/javascript">
	document.write("<div id='lights' style='z-index:{$xmas_zindex};position:{$xmas_position};width:956px;height:180px;top:{$xmas_top}px;background:url({$path}/light.png) no-repeat;left:50%;margin-left:{$xmas_marg_left}px'></div>")

	setInterval( "xmasLights();", 1000 );
	var lights = "active";
	function xmasLights(){
		var img = document.getElementById('lights');
		if(lights == "active"){
			img.style.backgroundPosition = "0 -180px";
			lights = "inactive";
		}else{
			img.style.backgroundPosition = "";
			lights = "active";
		}
	}
</script>
<!-- xmas_lights [ end ] -->
OUT;
	}
}