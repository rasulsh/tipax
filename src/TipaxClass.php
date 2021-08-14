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

	public function getCountry() {

        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/Country');
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

	public function getPersonKind() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/PersonKind');
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

	public function getContractKind() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/ContractKind');
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

	public function getGoodKind() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/GoodKind');
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

	public function getPackagingType() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => ''
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/PackagingType');
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

	public function calculateContract() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => [
                        'Dispatchs' => [
                            [
                                "GoodKindID"    => "1",
                                "Weight"        => "100",
                                "Length"        => "0",
                                "Width"         => "0",
                                "Height"        => "0"
                            ]
                        ],
                        'Price'             => "5000",
                        "SenderCityID"      => "36",
                        "ReceiverCityID"    => "54"
                    ]
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/CalculateContract');
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

	public function registerContract() {
        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => [
                        "Contract"  => [
                            "KindID"    => 0,
                            "OrderNumber"   => "2185"
                        ],
                        "Sender"    => [
                            "PersonKindID"  => 1,
                            "Name"          => "rasul",
                            "LastName"      => "sh",
                            "Mobile"        => "09129339790",
                            "CityID"        => 36,
                            "Address"       => "isfahan",
                            "Lat"           => 0,
                            "Long"          => 0
                        ],
                        "Receiver"  => [
                            "PersonKindID"  => 1,
                            "Name"          => "rasul",
                            "LastName"      => "sh",
                            "Mobile"        => "09129339790",
                            "CityID"        => 57,
                            "Address"       => "isfahan",
                            "Lat"           => 0,
                            "Long"          => 0
                        ],
                        "Dispatchs" => [
                            [
                                "GoodKindID"    => "1",
                                "PackageTypeID" => "1",
                                "Weight"        => "100", // بر حسب کیلوگرم و حداقل باید یک کیلوگرم باشه
                                "Length"        => 0,
                                "Width"         => 0,
                                "Height"        => 0
                            ]
                        ],
                        "Amounts" => [
                            "DispatchValue" => "50000", // بر حسب ریال
                            "OnlineSales"   => 0 // بر حسب ریال
                        ]
                    ]
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/RegisterContract');
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
	
	public function getContractStatus() {

        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => [
                        "Contracts" => [
                            [
                                "ContractCode"  => "9102021091312412437",
                                "OrderNumber"   => "2185"
                            ]

                        ]
                    ]
                ]);

                curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . '/Engine/ContractStatus');
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
