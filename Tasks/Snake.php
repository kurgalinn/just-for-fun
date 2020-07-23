<?php declare(strict_types=1);

/**
 * This class generate route snaky journey
 *
 * @author Kurgalin Nikita https://github.com/kurgalinn
 */

class Snake
{
    /**
     * Route map
     * @var array
     */
    private $map = [];

    /**
     * Current position line
     * @var int
     */
    private $cLine = 1;

    /**
     * Current position column
     * @var int
     */
    private $cCol = 1;

    /**
     * Current step number
     * @var int
     */
    private $step = 1;


    /**
     * Map size
     * @var int
     */
    private $col;
    private $line;

    public function __construct($col, $line)
    {
        $this->col = $col;
        $this->line = $line;
        $this->map[1][1] = $this->step;
    }

    /**
     * Rendering snake route
     */
    public function renderRoute(): void
    {
        $map = $this->getRouteMap();
        for ($i = 1; $i <= $this->line; $i++) {
            for ($j = 1; $j <= $this->col; $j++) {
                echo sprintf("%4d", $map[$i][$j]);
            }
            echo "\n";
        }
    }

    /**
     * Generate route map
     * @return array
     */
    private function getRouteMap(): array
    {
        $this->step++;
        if (($this->canGoRight() && !$this->canGoUp())) {
            $this->goRight();
        } else if ($this->canGoDown()) {
            $this->goDown();
        } else if ($this->canGoLeft()) {
            $this->goLeft();
        } else if ($this->canGoUp()) {
            $this->goUp();
        } else {
            return $this->map;
        }
        return $this->getRouteMap();
    }

    /**
     * @return bool
     */
    private function canGoRight(): bool
    {
        return $this->cCol + 1 <= $this->col && !isset($this->map[$this->cLine][$this->cCol + 1]);
    }

    /**
     * @return bool
     */
    private function canGoDown(): bool
    {
        return $this->cLine + 1 <= $this->line && !isset($this->map[$this->cLine + 1][$this->cCol]);
    }

    /**
     * @return bool
     */
    private function canGoLeft(): bool
    {
        return $this->cCol - 1 >= 1 && !isset($this->map[$this->cLine][$this->cCol - 1]);
    }

    /**
     * @return bool
     */
    private function canGoUp(): bool
    {
        return $this->cLine - 1 >= 1 && !isset($this->map[$this->cLine - 1][$this->cCol]);
    }

    /**
     * Step right
     */
    private function goRight(): void
    {
        $this->cCol++;
        $this->map[$this->cLine][$this->cCol] = $this->step;
    }

    /**
     * Step down
     */
    private function goDown(): void
    {
        $this->cLine++;
        $this->map[$this->cLine][$this->cCol] = $this->step;
    }

    /**
     * Step left
     */
    private function goLeft(): void
    {
        $this->cCol--;
        $this->map[$this->cLine][$this->cCol] = $this->step;
    }

    /**
     * Step up
     */
    public function goUp(): void
    {
        ksort($this->map[$this->cLine]);
        $this->cLine--;
        $this->map[$this->cLine][$this->cCol] = $this->step;
    }
}
