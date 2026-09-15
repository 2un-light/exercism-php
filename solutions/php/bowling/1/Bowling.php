<?php

declare(strict_types=1);

class Game
{
    private array $rolls = [];

    public function roll(int $pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new Exception();
        }

        // 이미 게임이 끝났는데 또 던진 경우
        if ($this->isComplete()) {
            throw new Exception();
        }

        $this->rolls[] = $pins;

        // 방금 던진 공으로 잘못된 프레임이 된 경우
        try {
            $this->isComplete();
        } catch (Exception $e) {
            array_pop($this->rolls);
            throw $e;
        }
    }

    public function score(): int
    {
        if (!$this->isComplete()) {
            throw new Exception();
        }

        $score = 0;
        $index = 0;

        for ($frame = 0; $frame < 10; $frame++) {

            // Strike
            if ($this->rolls[$index] === 10) {
                $score += 10
                    + $this->rolls[$index + 1]
                    + $this->rolls[$index + 2];

                $index++;
            }

            // Spare
            elseif (
                $this->rolls[$index]
                + $this->rolls[$index + 1] === 10
            ) {
                $score += 10 + $this->rolls[$index + 2];

                $index += 2;
            }

            // 일반
            else {
                $score += $this->rolls[$index]
                    + $this->rolls[$index + 1];

                $index += 2;
            }
        }

        return $score;
    }

    private function isComplete(): bool
    {
        $index = 0;

        // 1 ~ 9 프레임
        for ($frame = 0; $frame < 9; $frame++) {

            if (!isset($this->rolls[$index])) {
                return false;
            }

            // Strike
            if ($this->rolls[$index] === 10) {
                $index++;
                continue;
            }

            if (!isset($this->rolls[$index + 1])) {
                return false;
            }

            if ($this->rolls[$index] + $this->rolls[$index + 1] > 10
            ) {
                throw new Exception();
            }

            $index += 2;
        }

        // 10프레임 첫 공이 아직 없음
        if (!isset($this->rolls[$index])) {
            return false;
        }

        $first = $this->rolls[$index];

        // 10프레임 Strike
        if ($first === 10) {
            if (!isset($this->rolls[$index + 1])) {
                return false;
            }

            if (!isset($this->rolls[$index + 2])) {
                return false;
            }

            $second = $this->rolls[$index + 1];
            $third  = $this->rolls[$index + 2];

            // 두 번째 공이 Strike가 아니라면
            // 두 보너스 공 합은 10을 넘을 수 없음
            if ($second !== 10 && $second + $third > 10) {
                throw new Exception();
            }

            return true;
        }

        // 10프레임 두 번째 공 필요
        if (!isset($this->rolls[$index + 1])) {
            return false;
        }

        $second = $this->rolls[$index + 1];

        if ($first + $second > 10) {
            throw new Exception();
        }

        // Spare면 보너스 공 하나 필요
        if ($first + $second === 10) {
            return isset($this->rolls[$index + 2]);
        }

        return true;
    }
}