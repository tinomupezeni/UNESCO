# UNESCO Country Website

A complete redesign of a UNESCO country-specific website built with Laravel. Serving as the primary digital presence for a UNESCO office, providing information about programmes, news, resources, and country-specific UNESCO designations.

## Tech Stack

- **Backend:** Laravel 11+
- **Database:** MySQL 8+ / PostgreSQL
- **Frontend:** Blade + Alpine.js + Tailwind CSS
- **Cache:** Redis
- **Multilingual:** Spatie Translatable

## Documentation

- [Project Plan](docs/PROJECT_PLAN.md) — Full project overview, data models, design system, and development phases
- [Sitemap](docs/SITEMAP.md) — URL structure and navigation hierarchy

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 8+ or PostgreSQL 15+
- Redis

### Installation

```bash
git clone https://github.com/tinomupezeni/UNESCO.git
cd UNESCO
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

## License

MIT
