<?php

class Tipax {
    private $api_url;
    private $username;
    private $password;
    private $system_token;



    public function __construct($param = null) {
        if (!is_null($param)) {
            $this->setApiUrl($param['api_url']);
            $this->setUsername($param['username']);
            $this->setPassword($param['password']);
            $this->setSystemToken($param['system_token']);
        }
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
		if (!$this->parametersValidation())
            return json_decode(json_encode([
                'status' => 0,
                'error'  => 'Login parameters not valid',
                'data'   => null
            ]));

        $ch = curl_init();

        $data = json_encode([
            'SystemToken' => $this->getSystemToken(),
            'Item' => [
                'UserName' => $this->getUsername(),
                'Password' => $this->getPassword()
            ]
        ]);

        return $this->callAPI('/Engine/Login', $data);
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

                return $this->callAPI('/Engine/City', $data);
            } else {
                return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/Country', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/PersonKind', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/ContractKind', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/GoodKind', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/PackagingType', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/CalculateContract', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
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

                return $this->callAPI('/Engine/ContractStatus', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
        }
    }

    public function getInquiry() {

        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => [
                        "ContractCode"  => "b00599ea-2466-455d-ae78-d8aa297f1b6d",
                        "OrderNumber"   => "9102021091312412437",
                        "Barcode"       => "9990107002852"
                    ]
                ]);

                return $this->callAPI('/Engine/Inquiry', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
        }
    }

    public function cancelContract() {

        $login = $this->login();

        if ($login->status === 200) {
            if (!$login->data->StatusBase) {

                $ch = curl_init();

                $data = json_encode([
                    'SystemToken'   => $this->getSystemToken(),
                    "UserToken"     => $login->data->Item->Token,
                    'Item'          => [
                        "ContractCode"  => "b00599ea-2466-455d-ae78-d8aa297f1b6d",
                        "Reason"        => "تستتستتستتستتستتستتستتستتستتستتستتستتستتستتستتست"
                    ]
                ]);

                return $this->callAPI('/Engine/CancelContract', $data);
            } else {
				return json_decode(json_encode([
                    'status' => 0,
                    'error'  => $login->data->Message,
                    'data'   => null
                ]));
            }
        } else {
			return json_decode(json_encode([
                'status' => 0,
                'error'  => "HTTP Error : " . $login->status,
                'data'   => null
            ]));
        }
    }


    private function callAPI($url, $data = array()) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->getApiUrl() . $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
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

	private function parametersValidation() {
        if (empty($this->getApiUrl()))
            return false;
        if (empty($this->getUsername()))
            return false;
        if (empty($this->getPassword()))
            return false;
        if (empty($this->getSystemToken()))
            return false;
        return true;
    }
}
