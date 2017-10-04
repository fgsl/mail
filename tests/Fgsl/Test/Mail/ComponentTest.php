<?php
/**
 * Fgsl Mail - a component for sending mail messages
 *
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @link      https://github.com/fgsl/mail for the canonical source repository
 * @copyright Copyright (c) 2017 FGSL (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl.txt GNU AFFERO GENERAL PUBLIC LICENSE
*/
namespace Fgsl\Test\Mail;

use Fgsl\Mail\Mailer;
/**
 * 
 * @package    Fgsl
 * @subpackage Test
 */
class ComponentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test instance creation
     */
    public function testCreateMail()
    {
    	$options = ['host' => 'localhost'];
        $mailer = new Mailer($options);
        $sender = ['someone@somewhere.com'];
        $recipient = ['anotherone@anotherwhere.com'];
        $message = 'something';
        $mailer->sendMessage($sender, $recipient, $message);
        
        $this->assertTrue($mailer instanceof Mailer);
    }


}