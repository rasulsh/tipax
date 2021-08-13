<?php

class Tipax {
    private $api_url;
    private $username;
    private $password;
    private $system_token;



    public function __construct() {
    }

    // Setter methods

    public function setApiUrl($api_url) {
        $this->api_url = $api_url;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSystemToken($system_token) {
        $this->system_token = $system_token;
    }

    // Getter methods

    public function getApiUrl() {
        return $this->api_url;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSystemToken() {
        return $this->system_token;
    }

    // Class Body 

    public function login() {
        $ch = curl_init();

        $data = json_encode([
            'SystemToken' => $this->getSystemToken(),
            'Item' => [
                'UserName' => $this->getUsername(),
                'Password' => $this->getPassword()
            ]
        ]);


        curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/Login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $response = curl_exec($ch);
        $info     = curl_getinfo($ch);
        curl_close($ch);

        return json_decode(json_encode([
            'status' => $info['http_code'],
            'data'   => json_decode($response)
        ]));
    }

	public function getCity() {

        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/City');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                ));

                $response = curl_exec($ch);
                $info     = curl_getinfo($ch);
                curl_close($ch);

                return json_decode(json_encode([
                    'status' => $info['http_code'],
                    'data'   => json_decode($response)
                ]));
            } else {
                die("Web Service Error : " . $login->data->Message);
            }
        } else {
            die("HTTP Error : " . $login->status);
        }
    }
}
