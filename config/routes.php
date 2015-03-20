<?php
use Cake\Routing\Router;

Router::plugin('StaticContentManager', function ($routes) {
    $routes->fallbacks('InflectedRoute');
    // $routes->connect('/:slug', ['controller' => 'static_contents', 'action' => 'preview'],[['pass' => ['slug']]]);
	 // $routes->connect(
  //       '/:slug',
  //       ['controller' => 'StaticContents', 'action' => 'preview'],
  //       ['slug' => '[0-9a-z-]+']
  //   );
    $routes->connect(
  '/posts/:slug',
  ['controller' => 'StaticContents', 'action' => 'preview'],
  ['_name' => 'postsView', 'routeClass' => 'StaticContentManager.SlugRoute']
);
    // $routes->connect('/blog', array('controller' => 'StaticContents', 'action' => 'preview', 'new-content-title-6'));
    // $routes->connect('/blog', array('controller' => 'StaticContents', 'action' => 'preview', 'new-content-title-6'));
});

// Router::connect('/:schedulefor/:slugorid/:conferenceurl/ical', 
// 	array('admin' => false, 'controller' => 'conferences', 'action' => 'events', 'ext' => 'ics'), 
// 	array('pass' => array('schedulefor', 'slugorid', 'conferenceurl')));
// Router::plugin('StaticContentManager', function ($routes) {
//     $routes->connect('/:slug',  ['controller' => 'StaticContents', 'action' => 'preview','/:slug']
// });