# Project Setup Instructions

Follow the steps below to set up and run the project.

## 1. Clone the repository

```bash
git clone emi-calculator
cd emi-calculator
```

## 2. Copy the environment file

```bash
cp .env.example .env
```

## 3. Install dependencies

```bash
composer install
```

## 4. Generate the application key

```bash
php artisan key:generate
```

## 5. Start the Laravel development server

```bash
php artisan serve
```

The API will be available at:

```
http://localhost:8000/api/loan/calculate
```

## 6. Test the API

Using `curl`:

```bash
curl -X POST http://localhost:8000/api/loan/calculate \
  -H "Content-Type: application/json" \
  -d '{"principal":500000,"annual_rate":10.5,"tenure_months":24}'
```

Expected response:

```json
{
    "emi": 23188.02,
    "total_interest": 56512.5,
    "total_payment": 556512.5,
    "schedule": [
        {
            "month": 1,
            "principal_paid": 18813.02,
            "interest_paid": 4375,
            "balance": 481186.98
        },
        {
            "month": 2,
            "principal_paid": 18977.63,
            "interest_paid": 4210.39,
            "balance": 462209.34
        },
        {
            "month": 3,
            "principal_paid": 19143.69,
            "interest_paid": 4044.33,
            "balance": 443065.66
        },
        {
            "month": 4,
            "principal_paid": 19311.2,
            "interest_paid": 3876.82,
            "balance": 423754.46
        },
        {
            "month": 5,
            "principal_paid": 19480.17,
            "interest_paid": 3707.85,
            "balance": 404274.29
        },
        {
            "month": 6,
            "principal_paid": 19650.62,
            "interest_paid": 3537.4,
            "balance": 384623.67
        },
        {
            "month": 7,
            "principal_paid": 19822.56,
            "interest_paid": 3365.46,
            "balance": 364801.11
        },
        {
            "month": 8,
            "principal_paid": 19996.01,
            "interest_paid": 3192.01,
            "balance": 344805.09
        },
        {
            "month": 9,
            "principal_paid": 20170.98,
            "interest_paid": 3017.04,
            "balance": 324634.12
        },
        {
            "month": 10,
            "principal_paid": 20347.47,
            "interest_paid": 2840.55,
            "balance": 304286.65
        },
        {
            "month": 11,
            "principal_paid": 20525.51,
            "interest_paid": 2662.51,
            "balance": 283761.13
        },
        {
            "month": 12,
            "principal_paid": 20705.11,
            "interest_paid": 2482.91,
            "balance": 263056.02
        },
        {
            "month": 13,
            "principal_paid": 20886.28,
            "interest_paid": 2301.74,
            "balance": 242169.74
        },
        {
            "month": 14,
            "principal_paid": 21069.04,
            "interest_paid": 2118.99,
            "balance": 221100.71
        },
        {
            "month": 15,
            "principal_paid": 21253.39,
            "interest_paid": 1934.63,
            "balance": 199847.32
        },
        {
            "month": 16,
            "principal_paid": 21439.36,
            "interest_paid": 1748.66,
            "balance": 178407.96
        },
        {
            "month": 17,
            "principal_paid": 21626.95,
            "interest_paid": 1561.07,
            "balance": 156781.01
        },
        {
            "month": 18,
            "principal_paid": 21816.19,
            "interest_paid": 1371.83,
            "balance": 134964.82
        },
        {
            "month": 19,
            "principal_paid": 22007.08,
            "interest_paid": 1180.94,
            "balance": 112957.74
        },
        {
            "month": 20,
            "principal_paid": 22199.64,
            "interest_paid": 988.38,
            "balance": 90758.1
        },
        {
            "month": 21,
            "principal_paid": 22393.89,
            "interest_paid": 794.13,
            "balance": 68364.21
        },
        {
            "month": 22,
            "principal_paid": 22589.83,
            "interest_paid": 598.19,
            "balance": 45774.38
        },
        {
            "month": 23,
            "principal_paid": 22787.49,
            "interest_paid": 400.53,
            "balance": 22986.89
        },
        {
            "month": 24,
            "principal_paid": 22986.89,
            "interest_paid": 201.14,
            "balance": 0
        }
    ]
}
```