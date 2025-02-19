<?php

function load_style($name) {
	$style_url = PUBLIC_URL . '/' . $name . '.css';
	$style_path = PUBLIC_DIR . '/' . $name . '.css';
	if (file_exists($style_path)) { 
		wp_enqueue_style('style-' . $name, $style_url, array(), filemtime($style_path));
	}
}


add_filter('template_include', function ($template) {
	$blockNames = [];
	$template_name = basename($template);

	if ($template_name === '404.php') {
		$blockNames = ['404'];
	}
	
	foreach ($blockNames as $blockName) {
		load_style($blockName);
	}

	$content = get_the_content(null, false, get_queried_object());
	$blocks = parse_blocks($content);
	
	foreach ($blocks as $block) { 
		if (isset($block["blockName"])) { 
			if ($block["blockName"] === "core/block" && isset($block["attrs"]["ref"])) {
				$reusableBlockId = $block["attrs"]["ref"];
				$reusableBlockContent = get_post($reusableBlockId)->post_content;
				$reusableBlocks = parse_blocks($reusableBlockContent);

				foreach ($reusableBlocks as $reusableBlock) {
					$reusableBlockName = 'block-' . substr($reusableBlock["blockName"], 4);
					load_style($reusableBlockName);
				}
			} else {
				$blockName = 'block-' . substr($block["blockName"], 4);
				load_style($blockName);

				if ($block["blockName"] === "core/group") {
					foreach ($block["innerBlocks"] as $innerBlock) {
						$innerBlockName = 'block-' . substr($innerBlock["blockName"], 4);
						load_style($innerBlockName);
					}
				}
			}
		}
	}

	load_style('header');
	load_style('footer');

	return $template;
});