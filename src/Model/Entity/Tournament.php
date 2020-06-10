<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tournament Entity
 *
 * @property int $id
 * @property string $name
 * @property int $dyscypline
 * @property int $pearson
 * @property \Cake\I18n\FrozenDate $time
 * @property string $location
 * @property int $players_limit
 * @property \Cake\I18n\FrozenDate $deadline
 * @property int $players
 */
class Tournament extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'dyscypline' => true,
        'pearson' => true,
        'time' => true,
        'location' => true,
        'players_limit' => true,
        'deadline' => true,
        'players' => true,
    ];
}
