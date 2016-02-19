<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BoardsResourcesFixture
 *
 */
class BoardsResourcesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'board_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resource_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'board_id' => ['type' => 'index', 'columns' => ['board_id'], 'length' => []],
            'resource_id' => ['type' => 'index', 'columns' => ['resource_id'], 'length' => []],
            'resource_id_2' => ['type' => 'index', 'columns' => ['resource_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'boards_resources_ibfk_2' => ['type' => 'foreign', 'columns' => ['resource_id'], 'references' => ['resources', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'boards_resources_ibfk_1' => ['type' => 'foreign', 'columns' => ['board_id'], 'references' => ['boards', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'board_id' => 1,
            'resource_id' => 1,
            'status' => 1,
            'created' => '2016-02-18 23:51:29',
            'modified' => '2016-02-18 23:51:29'
        ],
    ];
}
