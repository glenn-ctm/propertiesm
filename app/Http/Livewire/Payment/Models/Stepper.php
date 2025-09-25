<?php

namespace App\Http\Livewire\Payment\Models;

use App\Enums\PaymentStep;
use Illuminate\Support\Collection;

class Stepper extends Collection
{
    protected int $active = -1;

    public static function instantiateFromEnum()
    {
        $instance = new self();
        array_map(fn ($key) => $instance->addStep($key), PaymentStep::getKeys());

        return $instance;
    }

    public function addStep(string|PaymentStep $item)
    {
        return $this->add($this->ensureItem($item));
    }

    public function setActive(int $step)
    {
        $this->active = $step;

        return $this;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getActiveValue(): ?PaymentStep
    {
        return $this->get($this->active);
    }

    /**
     * Determine whether the given step is the active step
     */
    public function isActive(PaymentStep $item)
    {
        return (bool) $this->getActiveValue()?->is($item);
    }

    /**
     * Determine whether the given step is trailing the current step
     */
    public function isTrailing(PaymentStep $item)
    {
        return !$this->isActive($item) && $this->search($item) < $this->getActive();
    }

    /**
     * Determine whether the given step is leading the current step
     */
    public function isLeading(PaymentStep $item)
    {
        return !$this->isActive($item) && $this->search($item) > $this->getActive();
    }


    /**
     * Step forward for the given steps
     */
    public function stepForward(int $steps = 1)
    {
        $this->step(abs($steps));
        return $this;
    }

    /**
     * Step back for the given steps
     */
    public function stepBack(int $steps = 1)
    {
        $this->step(abs($steps) * -1);
        return $this;
    }

    public function step(int $count)
    {
        if ($count === 0) {
            return;
        }

        $next = $count;

        // Step forward
        if ($next > 0) {
            $next += $this->getActive();
            // Prevent from overflowing
            if ($next >= $this->count()) {
                $next = $this->count() - 1;
            }
        } else { // Step back
            $next -= $this->getActive();
            // Prevent from overflowing
            if ($next <= 0) {
                $next = 0;
            }
        }

        // No need to step further, we are at the edge
        if ($next === $this->getActive()) {
            return;
        }

        $this->setActive($next);
    }

    public function stepOn(string|PaymentStep $item)
    {
        return $this->setActive($this->search($this->ensureItem($item)));
    }

    public function search(mixed $step, $strict = false)
    {
        $step = $this->ensureItem($step);
        return parent::search(fn (PaymentStep $item) => $item->is($step));
    }

    public function toArray()
    {
        $active = $this->getActiveValue();

        return [
            'items' => $this->all(),
            'active' => [
                'index' => $this->active,
                'key'   => $active->key,
                'value' => $active->value,
            ],
        ];
    }

    public function jsonSerialize():Array
    {
        $items = parent::jsonSerialize();
        $active = $this->getActiveValue();

        return [
            'items' => $items,
            'active' => [
                'index' => $this->active,
                'key'   => $active->key,
                'value' => $active->value,
            ],
        ];
    }

    protected function ensureItem(string|PaymentStep $item)
    {
        return is_string($item) ? PaymentStep::coerce($item) : $item;
    }
}
