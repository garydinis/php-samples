<?php
/**
 * routing.yaml
 * billing_charge:
 *      path: /billing/charge
 *      methods: POST
 *      controller: App\Controller\BillingController::charge
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class BillingController {
    public function __construct($billing_service) {
        $this->billing_service = $billing_service;
    }

    public function charge(Request $request) {
        try {
            $response = $this->billing_service->charge($request->request->all);
        } catch (Exception $e) {
            return new JsonResponse(["status" => "fail"], Response::HTTP_BAD_REQUEST);
        }
        return new JsonResponse($response);
    }
}

class BillingService {
    public function __construct($dao, $logger, $client, $cache) {
        $this->dao = $dao;
        $this->client = $client;
        $this->logger = $logger;
        $this->cache = $cache;
    }

    public function charge($charge_params) {
        $cache_key = $charge_params["email"] . "_blacklisted";
        if ($this->cache->get($cache_key) == 1) {
            throw new Exception("blacklisted transaction");
        } elseif($this->dao->isBlacklisted($charge_params)) {
            $this->cache->set($cache_key, 1, 86400);
            throw new Exception("blacklisted transaction");
        }

        $charge_attempt = $this->client->charge($params);
        if ($charge_attempt == "success") {
            $this->dao->save($charge_attempt);
            $this->logger->info("successful purchase");
        } else {
            $this->logger->info("failed purchase attempt");
        }
    }
}

class BillingDAO {
    private $read;
    private $write;

    public function __construct($read, $write) {
        $this->read = $read;
        $this->write = $write;
    }

    public function isBlacklisted($charge_params) {
        $sql = "SELECT id FROM blacklist WHERE email = :email";
        return $this->read->fetchALL($sql,[
            "email" => $charge_params["emai"]
        ]);
    }

    public function save($charge_attempt) {
        $sql "INSERT INTO transactions 
            (`name`,`last_name`,`status`,`amount`, `date`)
            VALUES
            (:name, :last_name, :status, :amount, now())";
        $this->write->insert($sql, [
            "name" => $charge_attempt["name"],
            "last_name" => $charge_attempt["last_name"],
            "status" => $charge_attempt["status"],
            "amount" => $charge_attempt["amount"]
        ]);
    }
}

class BillingClient {
    protected
        $http_client,
        $logger,
        $credentials
    ;

    public __construct($http_client, $logger, $credentials) {
        $this->http_client = $http_client;
        $this->logger = $logger;
        $this->credentials = $credentials;
    }

    public function charge($charge_params) {
        try {
            $url = $credentials[$url] . "/cc/charge/";
            $charge_attempt = $this->http_client($url, $charge_params);
        } catch (Exception $e) {
            $this->logger->error("charge error " . $e->getMessage());
            $charge_attempt = false;
        }
        return $charge_attempt;
    }   
}

class BillingEntity {

    private 
        $id,
        $amount,
        $name,
        $email
    ;

    public function __construct($values) {
        $vars = get_object_vars($this);
        foreach ($values as $key => $val) {
            if (array_key_exists($key, $vars) && !empty($value)) {
                $this->$key = $value;
            }
        }
    }
    
    public function getPrice() {
        return (string)number_format((float)$this->price,2);
    }

}