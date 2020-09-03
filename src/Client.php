<?php

namespace Phonechecker;

class Client
{
    private $token;

    /**
     * Guzzle instance
     */
    private $httpClient;

    public function __construct(string $token)
    {
        $this->token      = $token;
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://app.phonechecker.co/api/phone/'
        ]);
    }

    public function validationComplete(string $ddi, string $ddd, string $phone) : \stdClass
    {
        return $this->request($ddi, $ddd, $phone, 'complete');
    }

    public function validationWhatsapp(string $ddi, string $ddd, string $phone) : \stdClass
    {
        return $this->request($ddi, $ddd, $phone, 'whatsapp');
    }

    public function validationLiveness(string $ddi, string $ddd, string $phone) : \stdClass
    {
        return $this->request($ddi, $ddd, $phone, 'liveness');
    }

    public function validationSyntax(string $ddi, string $ddd, string $phone) : \stdClass
    {
        return $this->request($ddi, $ddd, $phone, 'syntax');
    }

    private function request(string $ddi, string $ddd, string $phone, string $type) : \stdClass
    {
        $response = $this->httpClient->get("$type/$ddi/$ddd/$phone", [
            'headers' => [
                'Authorization' => "Bearer {$this->token}"
            ]
        ]);

        $responseValidation = json_decode($response->getBody()->getContents());
        return $responseValidation->error ? $responseValidation : $responseValidation->payload; 
    }
}