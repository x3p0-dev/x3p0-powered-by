<?php
// This file is generated. Do not modify it manually.
return array(
	'powered-by' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'x3p0/powered-by',
		'version' => '1.0.0',
		'title' => 'Powered By',
		'category' => 'widgets',
		'icon' => 'comments',
		'description' => 'Displays a random "powered by" message.',
		'textdomain' => 'x3p0-powered-by',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'attributes' => array(
			'poweredByType' => array(
				'type' => 'string',
				'default' => 'text'
			)
		),
		'supports' => array(
			'anchor' => true,
			'align' => true,
			'html' => false,
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'width' => true,
				'style' => true
			),
			'color' => array(
				'gradients' => true
			),
			'shadow' => true,
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'__experimentalDefaultControls' => array(
					'margin' => false,
					'padding' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontStyle' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalTextTransform' => true
			)
		)
	)
);
