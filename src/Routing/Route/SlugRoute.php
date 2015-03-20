<?php
namespace StaticContentManager\Routing\Route;

use Cake\Routing\Route\Route;

class SlugRoute extends Route {

    public function match(array $url, array $context = []) {
        if (isset($url['_entity'])) {

            $entity = $url['_entity'];
            preg_match_all('@:(\w+)@', $this->template, $matches);

            foreach($matches[1] as $field) {
                $url[$field] = $entity[$field];
            }

        }

        return parent::match($url, $context);
    }

}