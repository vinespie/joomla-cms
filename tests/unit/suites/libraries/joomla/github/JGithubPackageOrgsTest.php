<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-02 at 00:05:18.
 */
class JGithubPackageOrgsTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * @var    JRegistry  Options for the GitHub object.
	 * @since  11.4
	 */
	protected $options;

	/**
	 * @var    JGithubHttp  Mock client object.
	 * @since  11.4
	 */
	protected $client;

	/**
	 * @var    JHttpResponse  Mock response object.
	 * @since  12.3
	 */
	protected $response;

	/**
	 * @var JGithubPackageOrgs
	 */
	protected $object;

	/**
	 * @var    string  Sample JSON string.
	 * @since  12.3
	 */
	protected $sampleString = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	/**
	 * @var    string  Sample JSON error message.
	 * @since  12.3
	 */
	protected $errorString = '{"message": "Generic Error"}';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @since   ¿
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->options  = new JRegistry;
		$this->client   = $this->getMockBuilder('JGithubHttp')->setMethods(array('get', 'post', 'delete', 'patch', 'put'))->getMock();
		$this->response = $this->getMockBuilder('JHttpResponse')->getMock();

		$this->object = new JGithubPackageOrgs($this->options, $this->client);
	}

	/**
	 * Overrides the parent tearDown method.
	 *
	 * @return  void
	 *
	 * @see     \PHPUnit\Framework\TestCase::tearDown()
	 * @since   3.6
	 */
	protected function tearDown()
	{
		unset($this->options);
		unset($this->client);
		unset($this->response);
		unset($this->object);
		parent::tearDown();
	}

	/**
	 * @covers JGithubPackageOrgs::getList
	 */
	public function testGetList()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
			->method('get')
			->with('/users/joomla/orgs')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->getList('joomla'),
			$this->equalTo(json_decode($this->sampleString))
		);
	}

	/**
	 * @covers JGithubPackageOrgs::get
	 */
	public function testGet()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
			->method('get')
			->with('/orgs/joomla')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->get('joomla'),
			$this->equalTo(json_decode($this->sampleString))
		);
	}

	/**
	 * @covers JGithubPackageOrgs::edit
	 */
	public function testEdit()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
			->method('patch')
			->with('/orgs/joomla')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->edit('joomla', 'email@example.com'),
			$this->equalTo(json_decode($this->sampleString))
		);
	}
}
