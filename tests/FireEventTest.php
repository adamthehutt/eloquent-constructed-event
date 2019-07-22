<?php
declare(strict_types=1);

namespace AdamTheHutt\EloquentConstructedEvent\Tests;

use Orchestra\Testbench\TestCase;

class FireEventTest extends TestCase
{
    /** @test */
    public function it_adds_observable()
    {
        $model = new TestModelWithTrait();

        $this->assertContains("constructed", $model->getObservableEvents());
    }

    /**
     * This is a bit awkward but there doesn't seem to be a more direct
     * way to test that the Eloquent event fired.
     *
     * @test
     */
    public function it_fires_constructed_event()
    {
        TestModelWithTrait::registerModelEvent("constructed", function (TestModelWithTrait $model) {
            throw new TestException("Throw this so we can catch it and confirm the event fired.");
        });

        $this->expectException(TestException::class);

        new TestModelWithTrait();
    }
}
