<?php
namespace mikemix\Wiziq\Tests\Entity;

use mikemix\Wiziq\Entity\PermaClassroom;

class PermaClassroomTest extends \PHPUnit_Framework_TestCase
{
    /** @var PermaClassroom */
    private $entity;

    /** @var array */
    private $expected = [
        'title'                      => 'Title',
        'presenter_email'            => 'mike@test.com',
        'attendee_limit'             => '',
        'presenter_default_controls' => '',
        'attendee_default_controls'  => '',
        'create_recording'           => '',
        'return_url'                 => '',
        'status_ping_url'            => '',
        'language_culture_name'      => '',
    ];

    public function setUp()
    {
        $this->entity = PermaClassroom::build('Title', 'mike@test.com');
    }

    public function testBuildBasic()
    {
        $this->assertEquals($this->expected, $this->entity->toArray());
    }

    public function testBuildWithLanguageCultureName()
    {
        $this->expected['language_culture_name'] = 'en-EN';
        $newEntity = $this->entity->withLanguageCultureName($this->expected['language_culture_name']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithAttendeeLimit()
    {
        $this->expected['attendee_limit'] = 10;
        $newEntity = $this->entity->withAttendeeLimit($this->expected['attendee_limit']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithPresenterDefaultControls()
    {
        $this->expected['presenter_default_controls'] = 'video, audio';
        $newEntity = $this->entity->withPresenterDefaultControls($this->expected['presenter_default_controls']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithAttendeeDefaultControls()
    {
        $this->expected['attendee_default_controls'] = 'video, audio';
        $newEntity = $this->entity->withAttendeeDefaultControls($this->expected['attendee_default_controls']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithCreateRecording()
    {
        $this->expected['create_recording'] = 0;
        $newEntity = $this->entity->withCreateRecording(false);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);

        $this->expected['create_recording'] = 1;
        $newEntity = $this->entity->withCreateRecording(true);

        $this->assertEquals($this->expected, $newEntity->toArray());
    }

    public function testBuildWithReturnUrl()
    {
        $this->expected['return_url'] = 'http://some.url/script.php';
        $newEntity = $this->entity->withReturnUrl($this->expected['return_url']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }

    public function testBuildWithStatusPingUrl()
    {
        $this->expected['status_ping_url'] = 'http://some.url/script.php';
        $newEntity = $this->entity->withStatusPingUrl($this->expected['status_ping_url']);

        $this->assertEquals($this->expected, $newEntity->toArray());
        $this->assertNotSame($newEntity, $this->entity);
    }
}