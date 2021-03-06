<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LayoutTest extends TestCase
{
    //Don't make any changes to the $token variable

    protected $token = "";

    //Enter your base link (url) of the resource defined in routes.php

    protected $link = "";

    //Enter database table name where you store the data

    protected $table = "";

    //Data in JSON to validate user credentials and generate token

    protected $credentials = '{

    }';

    //JSON POST Request.This JSON is sent to method store of your laravel controller.

    protected $data1 = '{

    }';

    //JSON PUT Request.This JSON is sent to method update of your laravel controller.

    protected $data_update = '{

    }';

    //String to be checked in the database of after POST request($data1).

    protected $checkDataExistsInTable = [];         //After storing,Before Updating we are checking['name'=>'mallow-1'];

    //String to be checked in the database of after PUT request($data_update).
    protected $checkDataAfterUpdate = [];           //After Updating we are checking ['name'=>'mallow-2'];
    

    /**
     * A method that returns the token..
     *
     * @return token for authentication
     */

    public function getToken(){
        $this->credentials = json_decode($this->credentials,true);
        $response = $this->call('POST', '/api/authenticate', $this->credentials ,array(), array(), array());
        $response = $response->getContent();
        $response = json_decode($response, true);
        $this->token = $response["token"];
        $this->assertTrue(true);
        return $this->token;
    }
    /*
     *
     * Checking whether there exists a particular string in the json response after a POST request.
     * POST for Assertion Success
     *
     */
    public function testStringAndResponseThatExists(){
        $this->token = $this->getToken();
        $this->data1 = json_decode($this->data1,true);
        $response = $this->call('POST', $this->link.'?token='.$this->token, $this->data1,array(), array(), array());
        $this->seeInDatabase($this->table,$this->checkDataExistsInTable);
    }
    /*
     *
     * Checking update is successful or not
     *
     */
    public function testStringAndModifiedResponse(){
        $this->token = $this->getToken();
        $this->data_upd = json_decode($this->data_update,true);
        $response = $this->call('PUT', $this->link.'/1?token='.$this->token, $this->data_upd,array(), array(), array());
        $response = $response->getContent();
        $this->seeInDatabase($this->table,$this->checkDataAfterUpdate);
    }
    /*
     *
     * Testing whether the resource shows particular data
     *
     */
    public function testIndex(){
        $this->token = $this->getToken();
        $response = $this->call('GET', $this->link.'?token='.$this->token, array(),array(), array(), array());
        $this->assertResponseStatus(200);
    }
}
