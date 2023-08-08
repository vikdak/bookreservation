<?php

class Message
{
    public const SUCCESS_HEADER = 'Operacija sėkminga!!!';
    public const ERROR_HEADER = 'Operacija nesėkminga!!!';

    public function __construct(
        public $header = '',
        public $body = '',
        public $type = 'success',
    ){}

    public function getErrors(): array
    {
        return isset($_GET['errors']) ? json_decode($_GET['errors'], true) : [];
    }

    public function errors(bool $elseSuccess = true): string|null
    {
        $errors = $this->getErrors();

        if ($errors) {
            $this->header = self::ERROR_HEADER;
            $this->type = 'danger';

            foreach ($errors as $error) {
                $this->body .= "<p>$error</p>";
            }

            return $this->message();
        }

        if ($elseSuccess && ($_GET['status'] ?? '')) {
            $this->header = self::SUCCESS_HEADER;
            $this->type = 'success';
            return $this->message();
        }

        return null;
    }

    public function message(): string
    {
        return "
        <div class='message {$this->type}'>
            <div class='message-header'>
                {$this->header}
            </div>
            <div class='message-body'>
                {$this->body}
            </div>
        </div>";
    }
}