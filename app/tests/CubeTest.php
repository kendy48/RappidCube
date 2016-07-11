<?php

class CubeTest extends TestCase {



	public function testMainPage(){
		$page = $this->client->request('GET', '/cube');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testSolvedCube(){
		$inputCube = 	"1\n".
			"4 5\n".
			"UPDATE 2 2 2 4\n".
			"QUERY 1 1 1 3 3 3\n".
			"UPDATE 1 1 1 23\n".
			"QUERY 2 2 2 4 4 4\n".
			"QUERY 1 1 1 3 3 3\n";

		$outputCube = 	"4\n".
						"4\n".
						"23\n".
						"4\n".
						"27\n";
		$response = $this->action('POST', 'CubeController@solveCube', ['inputCube' => $inputCube]);

		$this->assertEquals($outputCube, $response->getContent());
	}

}
