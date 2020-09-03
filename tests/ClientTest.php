<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Phonechecker\Client;

final class ClientTest extends TestCase
{
    private $token = '';

    public function testSyntaxValidation()
    {
        $phonecheckerClient = new Client($this->token);
        $response           = $phonecheckerClient->validationSyntax('55', '11', '934748118');
        $this->assertTrue(isset($response->validations->syntax));
    }

    public function testWhatsappValidation()
    {
        $phonecheckerClient = new Client($this->token);
        $response           = $phonecheckerClient->validationWhatsapp('55', '11', '934748118');
        $this->assertTrue(isset($response->socialMedias->whatsapp->hasAccount));
    }

    public function testLivenessValidation()
    {
        $phonecheckerClient = new Client($this->token);
        $response           = $phonecheckerClient->validationLiveness('55', '11', '934748118');
        $this->assertTrue(isset($response->validations->dial_detection));
        $this->assertTrue(isset($response->validations->amd_detection));
    }

    public function testCompleteValidation()
    {
        $phonecheckerClient = new Client($this->token);
        $response           = $phonecheckerClient->validationComplete('55', '11', '934748118');
        $this->assertTrue(isset($response->validations->syntax));
        $this->assertTrue(isset($response->validations->dial_detection));
        $this->assertTrue(isset($response->validations->amd_detection));
        $this->assertTrue(isset($response->socialMedias->whatsapp->hasAccount));
    }
}