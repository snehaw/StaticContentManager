<?php
namespace StaticContentManager\Model\Entity;

use Cake\ORM\Entity;

/**
 * StaticContent Entity.
 */
class StaticContent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'slug' => true,
        'content' => true,
    ];
}
