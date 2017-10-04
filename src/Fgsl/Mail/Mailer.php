<?php
/**
 * Fgsl Mail - a component for sending mail messages
 *
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @link      https://github.com/fgsl/mail for the canonical source repository
 * @copyright Copyright (c) 2017 FGSL (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl.txt GNU AFFERO GENERAL PUBLIC LICENSE
 */
namespace Fgsl\Mail;

use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

class Mailer
{
    /**
     * @var Message
     */
    private $message;
    /**
     * @var Smtp
     */
    private $transport;

    /**
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->message = new Message();
        $smtpOptions = new SmtpOptions();
        $smtpOptions->setHost($options['host']);
        $this->transport = new Smtp($smtpOptions);
    }

    /**
     * @param array $sender
     * @param array $recipient
     * @param string $message
     * @param string $subject
     */
    public function sendMessage(array $sender,array $recipient, $message, $subject = null)
    {
        $this->message->setSubject(is_null($subject) ? 'No subject' : $subject);
        $this->message->addFrom($sender);
        $this->message->addTo($recipient);
        $this->message->setBody($message);
        $this->transport->send($this->message);
    }
}