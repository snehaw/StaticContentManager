<?php
namespace StaticContentManager\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;

/**
 * Sluggable Behavior
 *
 * This behavior provides a way to create slug from the provides string field
 * 
 */
class SluggableBehavior extends Behavior
{
	/**
     * Default config
     *
     * These are merged with user-provided configuration when the behavior is used.
     *
     * @var array
     */
	public $_defaultConfig = [
		'field' 	  => 'title',
		'slug' 		  => 'slug',
		'entityid'    => 'id',
		'replacement' => '-',
	];


	/**
     * Generates slug for the given entity field(eg. title), and 
     * sets it to the entity data array for saving it to database table
     *
     * @param \Cake\Event\Event $entity The current entity that is being saved
     * @return void
     */
	public function slug(Entity $entity)
	{
		$config    = $this->config();
		$value     = $entity->get($config['field']);
		$entityid = $entity->get($config['entityid']);
		
		// generate Slug
		$slug      = Inflector::slug(strtolower($value), $config['replacement']);

		$tableName =  $this->_table->registryAlias();
		$table  = TableRegistry::get($tableName);



		// for edits only where id for entity exists
		// find wheter the slug exists
		$slugStatus = $this->slugExists($slug, $entityid, $table);
		

		// If Slug exists rename it.
		if($slugStatus) {

			// checks whether the slug  is being modified or is new
			if($entityid) {

				if($entity->dirty('slug')) {
					$slugStatus = $this->slugExists($slug, $entityid, $table);
					if($slugStatus){
						throw new Exception(__('Slug already exist.'));
					}
				}
				// $slug   = Inflector::slug(strtolower($value ." ". $entityid) , $config['replacement']);
			} else {
				$i = 1;
				while(true){
					echo $i;
					$slug   = Inflector::slug(strtolower($value ." ". $i) , $config['replacement']);
					$slugStatus = $this->slugExists($slug, $entityid, $table);
					if(empty($slugStatus)){
						break;
					}
					$i++;
				}
			}
		} 
		
		$entity->set($config['slug'], $slug);
	}

	 /**
     * Checks Whether currently genrated slug($slug) exists within the table.
     *
     * @param String $slug The slug to be checked
     * @param entityId $entityId Current entity Id
     * @param TableRegistry $table Current Table class Object
     * @return boolean
     */
	public function slugExists($slug, $entityid = null,  $table)
	{
		$slugStatus = false;
		if($entityid) {
			$slugStatus  = $table->exists(['slug' => $slug, 'id !=' => $entityid ]);
		} else {
			$slugStatus 	= $table->exists(['slug' => $slug]);
		}
		return $slugStatus;
	}

	 /**
     * Modifies the entity before it is saved so that slugs are persisted
     * in the database too.
     *
     * @param \Cake\Event\Event $event The beforeSave event that was fired
     * @param \Cake\ORM\Entity $entity The entity that is going to be saved
     * @return void
     */
	public function beforeSave(Event $event, Entity $entity)
    {
        $this->slug($entity);
    }


    /**
     * Returns Query result where slug equals the given slug
     *
     * @param Cake\ORM\Query $query The beforeSave event that was fired
     * @param array $options optionthat contains the slug value to be searched within table
     * @return query object
     */
    public function findSlug(Query $query, array $options)
    {
    	return $query->where(['slug' => $options['slug']]);
    }

}


