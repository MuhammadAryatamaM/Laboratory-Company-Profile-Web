<?php
class SimpleSMTP {
    private $host;
    private $port;
    private $username;
    private $password;
    private $debug = [];

    public function __construct($host, $port, $username, $password) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function getLog() {
        return implode("\n", $this->debug);
    }

    public function send($to, $subject, $body, $fromName) {
        $protocol = ($this->port == 465) ? "ssl://" : "tcp://";
        $socket = @stream_socket_client($protocol . $this->host . ":" . $this->port, $errno, $errstr, 30);
        
        if (!$socket) {
            $this->debug[] = "Connection failed: $errstr ($errno)";
            return false;
        }

        $this->read($socket);
        $this->write($socket, "EHLO " . gethostname());
        $this->read($socket);

        if ($this->port == 587) {
            $this->write($socket, "STARTTLS");
            $this->read($socket);
            stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            $this->write($socket, "EHLO " . gethostname());
            $this->read($socket);
        }
        
        $this->write($socket, "AUTH LOGIN");
        $this->read($socket);
        $this->write($socket, base64_encode($this->username));
        $this->read($socket);
        $this->write($socket, base64_encode($this->password));
        $response = $this->read($socket);

        if (strpos($response, '235') === false) {
             $this->debug[] = "Auth failed: $response";
             return false;
        }

        $this->write($socket, "MAIL FROM: <{$this->username}>");
        $this->read($socket);
        $this->write($socket, "RCPT TO: <$to>");
        $this->read($socket);

        $this->write($socket, "DATA");
        $this->read($socket);

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $fromName <{$this->username}>\r\n";
        $headers .= "To: $to\r\n";
        $headers .= "Subject: $subject\r\n";

        $this->write($socket, "$headers\r\n$body\r\n.");
        $result = $this->read($socket);

        $this->write($socket, "QUIT");
        fclose($socket);

        if (strpos($result, '250') === false) {
            $this->debug[] = "Message not accepted: $result";
            return false;
        }

        return true;
    }

    private function write($socket, $data) {
        fwrite($socket, $data . "\r\n");
    }

    private function read($socket) {
        $response = '';
        while ($str = fgets($socket, 515)) {
            $response .= $str;
            if (substr($str, 3, 1) == ' ') break;
        }
        return $response;
    }
}
?>
