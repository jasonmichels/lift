<?php namespace App\Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

/**
 * Class TestCase
 * @package App\Tests
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /** @var RemoteWebDriver $driver */
    protected $webDriver;

    protected $host = 'http://127.94.0.2:4444/wd/hub';

    /**
     * Setup web driver
     */
    protected function setUp() {
        $this->webDriver = RemoteWebDriver::create($this->host, DesiredCapabilities::phantomjs());
    }

    /**
     * Tear down web driver
     */
    protected function tearDown() {
        if ($this->webDriver) {
            $this->webDriver->quit();
        }
    }
}
