<?php

namespace Core;

class Api {

    protected $emptyArray;
    protected $message;

    /**
     * Initialize Constructor
     */
    public function __construct() {
        $this->emptyArray = array();
        $this->message = $this->getDefaultMessageList();
    }

    /**
     * Function To Get Default Message List
     * @return array Message List
     */
    protected function getDefaultMessageList() {  
        $defaultMsg = array();
        $filePath = APPLICATION_PATH. "/config/messageList.php";
        
        if (file_exists($filePath)) {
            $defaultMsg = include($filePath);
        }

        return $defaultMsg;
    }

    /**
     * Function To Get API Response Status
     * Status => : Success | Failure
     *  
     * @param string $status API Status
     * @return string $status Response status
     */
    public function getStatus($status) {
        return ($status) ? 'Success' : 'Failure';
    }

    /**
     * Function To Get Status Message
     * @param string $statusCode Status Code
     * @return array Status Message
     */
    public function getStatusMessage($statusCode) {
        if(!$statusCode) {
            return null;
        }

        $messageList = $this->getDefaultMessageList();

        if (!empty($messageList)) {
            $data = $messageList[$statusCode]; 
            $key = key($data);

            return array(
                "error_code" => $key,
                "message" => $data[$key]
            );
        } 

        return null;
    }

    /**
     * Function To Get Success Response
     * ack => : Success | Failure
     * 
     * @param array $data Response Data
     * @return array API Response
     */
    public function getApiResponse($data) { 
        return array(
            'ack' => $this->getStatus($data['status']??""),
            'status' => $this->getStatusMessage($data['message']??""),
            'results' => $data['resultSet'] ?? []
        );
    }
}
