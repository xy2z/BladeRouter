<?php

	namespace xy2z\BladeRouter;

	use eftec\bladeone\BladeOne;

	class BladeRouter {

		/**
		 * Filename of the view to show on 404.
		 *
		 * @var string
		 */
		public $not_found_view;

		/**
		 * Variables that will be available in all templates.
		 *
		 * @var array
		 */
		public $global_template_vars = [];

		/**
		 * Views directory
		 *
		 * @var string
		 */
		public $views_dir;

		/**
		 * Views cache directory
		 *
		 * @var string
		 */
		public $cache_dir;

		/**
		 * BladeOne mode (see BladeOne docs)
		 *
		 * @var integer
		 */
		public $blade_mode = BladeOne::MODE_AUTO;

		/**
		 * Array of BladeRouterRoute
		 *
		 * @var array
		 */
		private $routes = [];

		/**
		 * FastRoute disaptcher
		 *
		 * @var object
		 */
		private $dispatcher;

		/**
		 * The BladeOne object
		 *
		 * @var BladeOne
		 */
		private $blade;

		/**
		 * Render the page
		 *
		 */
		public function render() {
			// Templating
			$this->blade = new BladeOne(
				$this->views_dir,
				$this->cache_dir,
				$this->blade_mode
			);

			// Routing
			$this->setRouter();

			// Get URI
			$uri = static::getUri();

			// Render view
			$this->renderView($uri);
		}

		/**
		 * Add a route
		 *
		 * @param string $method GET, POST, etc.
		 * @param string $route Matching
		 * @param string $view Filename in views dir.
		 */
		public function addRoute(string $method, string $routePattern, string $view) {
			$route = new BladeRouterRoute;
			$route->method = $method;
			$route->routePattern = $routePattern;
			$route->view = $view;

			$this->routes[] = $route;
		}

		private function setRouter() {
			$this->dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
				foreach ($this->routes as $row) {
					$r->addRoute($row->method, $row->routePattern, $row->view);
				}
			});
		}

		private static function getUri() : string {
			// Fetch method and URI from somewhere
			$uri = $_SERVER['REQUEST_URI'];

			// Strip query string (?foo=bar) and decode URI
			if (false !== $pos = strpos($uri, '?')) {
				$uri = substr($uri, 0, $pos);
			}
			return rawurldecode($uri);
		}

		private function renderView(string $uri) {
			$routeInfo = $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $uri);

			switch ($routeInfo[0]) {
				case \FastRoute\Dispatcher::NOT_FOUND:
					header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
					echo $this->blade->run($this->not_found_view, $this->global_template_vars);
					break;

				case \FastRoute\Dispatcher::FOUND:
					$template = $routeInfo[1];
					$vars = array_merge($this->global_template_vars, $routeInfo[2]);

					echo $this->blade->run($template, $vars);
					break;
			}
		}
	}
