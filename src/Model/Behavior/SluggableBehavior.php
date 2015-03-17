<?php

namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

class SluggableBehavior extends Behavior
{
	public $_defaultConfig = [
	    // 'implementedMethods' => [ // used to rename the methods
	    //     'slug' => 'superSlug',
	    // ]
		'field' 	  => 'title',
		'slug' 		  => 'slug',
		'entityid'    => 'id',
		'replacement' => '-',
	];

	// public function initialize(array $config)
	// {}

	public function slug(Entity $entity)
	{
		$config    = $this->config();
		$value     = $entity->get($config['field']);
		$entityid = $entity->get($config['entityid']);
		$slug      = Inflector::slug(strtolower($value), $config['replacement']);

		$tableName =  $this->_table->registryAlias();
		$table  = TableRegistry::get($tableName);
		// $article  = $articles->find('slug', ['slug' => $slug])->first();
		$articleStatus  = $table->exists(['slug' => $slug, 'id !=' => $entityid ]);
		
		if($articleStatus) {
			// $entity->set($config['slug'], $slug);			
			$slug   = Inflector::slug(strtolower($value ." ". $entityid) , $config['replacement']);			
		}
		
		$entity->set($config['slug'], $slug);
	}


	// public function superSlug($value)
	// {
	// 	// pr($this);
	// 	return Inflector::slug($value);
	// }

	public function beforeSave(Event $event, Entity $entity)
    {
		// if (!empty($entity->get($this->config()['slug']))) {
		//     $event->stopPropagation();
		//     return;
		// }
		
        $this->slug($entity);
    }

    public function findSlug(Query $query, array $options)
    {
    	return $query->where(['slug' => $options['slug']]);
    }

}