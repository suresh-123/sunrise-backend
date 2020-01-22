<?php

namespace Controllers\Api;

use Core\Api;
use Models\Api\Subscriber;

class V1 {

    protected $apiService;
    protected $subscriberService;

    /**
     * Initialize Constructor
     */
    public function __construct() {
        $this->apiService = new Api;
        $this->subscriberService = new Subscriber;
    }

    /**
     * Function To Get API Service
     * @return object API Service
     */
    public function getApiService() {
        return $this->apiService;
    }

    /**
     * Function To Get Subscriber Service
     * @return object Subscriber Service
     */
    public function getSubscriberService() {
        return $this->subscriberService;
    }

    /**
     * Function To save Subscribers Data
     * @return Json Data
     */
    public function saveSubscriberData() {
        $method = $_SERVER['REQUEST_METHOD'];

        if (in_array($method, array('POST'))) {
            $email = $_REQUEST['email'] ?? "";

            if (!empty($email)) {
                $isEmailExist = $this->getSubscriberService()->checkDuplicateEmailAddress($email);

                if ($isEmailExist === false) {
                    $result = $this->getSubscriberService()->saveSubscriberData($email);
                    $response = array("status" => $result, "message" => "success");
                } else {
                    $response = array("status" => false, "message" => "duplicate_email");
                }
            } else {
                $response = array("status" => $result, "message" => "required");
            }
        } else {
            $response = array("status" => false, "message" => "method_not_allowed");
        }

        echo json_encode($this->getApiService()->getApiResponse($response));
        exit;
    }

}
