# Standart data to test MercadoPagos's API

## Standart Credit Cards

| Card | Credit card number | CVV | DD/YYYY |
| --- | --- | --- | --- |
| Mastercard | 5031 4332 1540 6351 | 123 | 11/2025 |
| Visa | 4235 6477 2802 5682 | 123 | 11/2025 |
| American Express | 3753 651535 56885 | 1234 | 11/2025 |

For test diferent results, define the **Holder Name** like:

| Name | Description | Document |
| --- | --- | --- |
| APRO | Payment Aproved | (CPF) 12345678909 |
| OTHE | General refused error | (CPF) 12345678909 |
| CONT | Pendent payment | - |
| CALL | Refused with auth validation | - |
| FUND | Refused with insuficient montant | - |
| ... | ... | ... |

Complete documentation on [the oficial page](https://www.mercadopago.com.br/developers/pt/docs/checkout-api/integration-test/test-cards).
