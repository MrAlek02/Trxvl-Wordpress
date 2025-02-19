<?php

function load_style($blockName)
{
	if (!VITE_BUILD) {
		$style_url_dev = VITE_LOCAL_URL . '/template-parts/' . $blockName . '/' . $blockName . '.scss';
		wp_enqueue_style($blockName . '-dev', $style_url_dev, array(), null);
	} else {
		$manifest_path = THEME_DIR . '/dist/.vite/manifest.json';
		$manifest = json_decode(file_get_contents($manifest_path), true);
		$key = 'template-parts/' . $blockName . '/' . $blockName . '.scss';
		if (isset($manifest[$key])) {
			$style_url_prod = THEME_URL . '/dist/' . $manifest[$key]['file'];
			wp_enqueue_style($blockName . '-prod', $style_url_prod, array(), null);
		}
	}
}


add_filter('template_include', function ($template) {
	$blockNames = [];
	$template_name = basename($template);

	if ($template_name === '404.php') {
		$blockNames = ['404'];
	}
	if ($template_name === 'category.php') {
		$blockNames = ['mountains'];
	}

	foreach ($blockNames as $blockName) {
		load_style($blockName);
	}

	$content = get_the_content(null, false, get_queried_object());
	$blocks = parse_blocks($content);

	foreach ($blocks as $block) {
		if (isset($block["blockName"])) {
			if ($block["blockName"] === "core/group" && isset($block["attrs"]["ref"])) {
				$reusableBlockId = $block["attrs"]["ref"];
				$reusableBlockContent = get_post($reusableBlockId)->post_content;
				$reusableBlocks = parse_blocks($reusableBlockContent);

				foreach ($reusableBlocks as $reusableBlock) {
					$reusableBlockName  = 'block-' . substr($reusableBlock["blockName"], 4);
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
