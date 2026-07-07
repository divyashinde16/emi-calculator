<?php

namespace App\Services;

class LoanEmiService
{

    public function calculate(float $principal, float $annualRate, int $tenureMonths): array
    {
        $monthlyRate = $annualRate / 12 / 100;

        $emi = $this->calculateEmi($principal, $monthlyRate, $tenureMonths);

        $schedule = $this->buildSchedule($principal, $monthlyRate, $tenureMonths, $emi);

        $totalPayment = round($emi * $tenureMonths, 2);
        $totalInterest = round($totalPayment - $principal, 2);

        return [
            'emi' => round($emi, 2),
            'total_interest' => $totalInterest,
            'total_payment' => $totalPayment,
            'schedule' => $schedule,
        ];
    }

    private function calculateEmi(float $principal, float $monthlyRate, int $tenureMonths): float
    {
        if ($monthlyRate == 0.0) {
            return $principal / $tenureMonths;
        }

        $factor = pow(1 + $monthlyRate, $tenureMonths);

        return ($principal * $monthlyRate * $factor) / ($factor - 1);
    }

    private function buildSchedule(float $principal, float $monthlyRate, int $tenureMonths, float $emi): array
    {
        $schedule = [];
        $balance = $principal;  

        for ($month = 1; $month <= $tenureMonths; $month++) {
            $interestPaid = $monthlyRate == 0.0 ? 0 : $balance * $monthlyRate;
            $principalPaid = $emi - $interestPaid;

            if ($month === $tenureMonths) {
                $principalPaid = $balance; // clear exactly, avoid rounding residue
            }

            $balance -= $principalPaid;

            if ($balance < 0.005) {
                $balance = 0;
            }

            $schedule[] = [
                'month' => $month,
                'principal_paid' => round($principalPaid, 2),
                'interest_paid' => round($interestPaid, 2),
                'balance' => round($balance, 2),
            ];
        }

        return $schedule;
    }
}