<?php

namespace N98\Magento\Command\System\Cron;

use Symfony\Component\Console\Tester\CommandTester;
use N98\Magento\Command\PHPUnit\TestCase;

class ListCommandTest extends TestCase
{
    public function testExecute()
    {
        $application = $this->getApplication();
        $application->add(new ListCommand());
        $command = $this->getApplication()->find('sys:cron:list');

        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));
    
        $this->assertRegExp('/Cronjob List/', $commandTester->getDisplay());
    }
}
