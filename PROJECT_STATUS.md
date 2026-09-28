# Mizani — Project Status

Last updated: 2026-09-28

## Current phase

Mizani is currently in the **foundation and authentication phase**. The repository contains a Laravel 12 application with Laravel Breeze authentication, but the product-specific accounting and financial features have not been implemented yet.

## Completed foundation

- Laravel 12 project structure on PHP 8.2.
- User registration, login, logout, password reset, email verification, and password confirmation flows.
- Authenticated dashboard and profile management.
- User, session, cache, and queue database migrations.
- Vite, Tailwind CSS, and Alpine.js frontend toolchain.
- Authentication and profile feature tests supplied by the application scaffold.
- A guarded testing configuration that requires the `testing` environment and an in-memory SQLite database before tests can run.
- Dependency lock files for Composer and npm.

## Current checkpoint

The codebase is still close to the Laravel/Breeze foundation. No Mizani domain models, financial workflows, reports, permissions, or production deployment configuration have been added. The next work should begin with requirements and domain design rather than expanding the scaffold blindly.

## Planned stages

1. **Product definition**
   - Define Mizani's target users, accounting scope, currencies, locale, and reporting needs.
   - Write the first release requirements and acceptance criteria.

2. **Domain and data design**
   - Model organizations, members, accounts, categories, transactions, transfers, and opening balances.
   - Decide authorization roles and data isolation rules.
   - Design migrations, validation rules, and audit fields.

3. **Core financial workflows**
   - Implement account and category management.
   - Implement income, expense, and transfer entry.
   - Add balances, transaction history, filtering, and reconciliation rules.

4. **Dashboard and reports**
   - Add financial summaries, cash flow, category breakdowns, and date filters.
   - Add export formats required by the product definition.

5. **Quality and security**
   - Add tests for domain rules, authorization, tenant isolation, and financial calculations.
   - Review dependency advisories, validation, rate limits, logging, backups, and recovery.

6. **Release preparation**
   - Configure the production environment and database.
   - Add CI checks, deployment instructions, monitoring, and an operational checklist.

## Guidance for the next development session

Read this file before changing the project. Treat the repository as a foundation checkpoint. Start by confirming the first release requirements and designing the domain model; do not assume that the current dashboard or default Laravel schema represents the finished Mizani product.
