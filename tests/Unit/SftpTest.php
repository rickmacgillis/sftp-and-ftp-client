<?php

use FtpClient\FtpClient;

/**
 * @group sftp-tests
 */
class SftpTest extends TestCase {
	private ?FtpClient $ftp = null;
	
	public function testCanConnectToFtpServer() {
		$this->makeFtp();
		
		$this->assertInstanceOf(FtpClient::class, $this->ftp);
		$this->assertTrue($this->ftp->isConnected());
	}
	
	private function makeFtp() {
		$creds = static::getBasicCreds();
		
		$this->ftp = new FtpClient();
		$this->ftp->setHost($creds['host']);
		$this->ftp->setPass($creds['pass']);
		$this->ftp->setUser($creds['user']);
		$this->ftp->setPort($creds['port']);
		$this->ftp->setUseSsh(true);
		
		$this->ftp->connect();
	}
}
