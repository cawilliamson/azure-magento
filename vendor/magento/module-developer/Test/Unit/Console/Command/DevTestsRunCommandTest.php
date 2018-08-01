<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Developer\Test\Unit\Console\Command;

use Magento\Developer\Console\Command\DevTestsRunCommand;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class DevTestsRunCommandTest
 *
 * Tests dev:tests:run command.  Only tests error case because DevTestsRunCommand calls phpunit with
 * passthru, so there is no good way to mock out running the tests.
 */
class DevTestsRunCommandTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var DevTestsRunCommand
     */
    private $command;

    protected function setUp()
    {
        $this->command = new DevTestsRunCommand();
    }

    public function testExecuteBadType()
    {
        $commandTester = new CommandTester($this->command);
        $commandTester->execute([DevTestsRunCommand::INPUT_ARG_TYPE => 'bad']);
        $this->assertContains('Invalid type: "bad"', $commandTester->getDisplay());
    }

    public function testPassArgumentsToPHPUnit()
    {
        $commandTester = new CommandTester($this->command);
        $commandTester->execute(
            [
                DevTestsRunCommand::INPUT_ARG_TYPE                    => 'unit',
                '-' . DevTestsRunCommand::INPUT_OPT_COMMAND_ARGUMENTS_SHORT => '--list-suites',
            ]
        );
        $this->assertContains(
            'phpunit  --list-suites',
            $commandTester->getDisplay(),
            'Parameters should be passed to PHPUnit'
        );
    }
}
