<?php 

return array (
  'routes' => 
  array (
    '/Error/pageNotFound' => 
    array (
      'controller' => '\\TinyMVC\\Controller\\ErrorController',
      'action' => 'pageNotFound',
    ),
    '/:name' => 
    array (
      'controller' => '\\MyApp\\Controller\\IndexController',
      'action' => '',
    ),
  ),
);