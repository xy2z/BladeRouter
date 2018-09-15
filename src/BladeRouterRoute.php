<?php

	namespace xy2z\BladeRouter;

	class BladeRouterRoute {

		/**
		 * Method: GET, POST, etc.
		 *
		 * @var string
		 */
		public $method;

		/**
		 * The route pattern (eg. '/about')
		 *
		 * @var string
		 */
		public $routePattern;

		/**
		 * Filename of the blade view.
		 * 'about' will point to views_dir/about.blade.php
		 *
		 * @var string
		 */
		public $view;
	}
