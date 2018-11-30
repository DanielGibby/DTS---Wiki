<?php

namespace Solarium\Component\Result\Debug;

/**
 * Select component debug timing phase result.
 */
class TimingPhase implements \IteratorAggregate, \Countable
{
    /**
     * Phase name.
     *
     * @var string
     */
    protected $name;

    /**
     * Phase time.
     *
     * @var float
     */
    protected $time;

    /**
     * Timing array.
     *
     * @var array
     */
    protected $timings;

    /**
     * Constructor.
     *
     * @param string $name
     * @param float  $time
     * @param array  $timings
     */
    public function __construct($name, $time, $timings)
    {
        $this->name = $name;
        $this->time = $time;
        $this->timings = $timings;
    }

    /**
     * Get total time.
     *
     * @return float
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get a timing by key.
     *
     * @param mixed $key
     *
     * @return float|null
     */
    public function getTiming($key)
    {
        if (isset($this->timings[$key])) {
            return $this->timings[$key];
        }
    }

    /**
     * Get timings.
     *
     * @return array
     */
    public function getTimings()
    {
        return $this->timings;
    }

    /**
     * IteratorAggregate implementation.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->timings);
    }

    /**
     * Countable implementation.
     *
     * @return int
     */
    public function count()
    {
        return count($this->timings);
    }
}
