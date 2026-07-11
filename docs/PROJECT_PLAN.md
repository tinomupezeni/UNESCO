# UNESCO Country-Specific Website — Project Plan

## 1. Project Overview

A complete redesign of a UNESCO country-specific website built with Laravel. The site will serve as the primary digital presence for a UNESCO office in a specific country, providing information about programmes, news, resources, and country-specific UNESCO designations.

### Goals
- Modern, accessible, multilingual website
- Easy content management for non-technical staff
- Fast performance with SEO optimization
- Mobile-first responsive design
- Aligned with UNESCO's global brand identity

### Reference
Based on analysis of the current UNESCO Regional Office for Southern Africa site (`unesco.org/en/fieldoffice/harare`), which covers 9 countries and includes news, stories, publications, and programme information.

---

## 2. Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11+ |
| Database | MySQL 8+ / PostgreSQL |
| Frontend | Blade templates + Alpine.js + Tailwind CSS |
| Cache | Redis |
| Search | Laravel Scout + Meilisearch (optional) |
| Media | Laravel Media Library |
| Multilingual | Laravel Translatable / Spatie Translatable |
| Hosting | Ubuntu Linux + Nginx + PHP-FPM |

### Why Laravel?
- Built-in authentication, authorization, and CSRF protection
- Eloquent ORM for clean data modeling
- Blade templating for clean, maintainable views
- Rich ecosystem (Nova for admin, Horizon for queues, etc.)
- Strong multilingual support

---

## 3. Site Architecture

```
uneco-country/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ProgrammeController.php
│   │   ├── NewsController.php
│   │   ├── PublicationController.php
│   │   ├── EventController.php
│   │   ├── CountryController.php
│   │   ├── DesignationController.php
│   │   ├── ContactController.php
│   │   └── SearchController.php
│   ├── Models/
│   │   ├── Page.php
│   │   ├── Article.php
│   │   ├── Programme.php
│   │   ├── Event.php
│   │   ├── Publication.php
│   │   ├── Country.php
│   │   ├── Designation.php
│   │   ├── TeamMember.php
│   │   ├── Media.php
│   │   └── Setting.php
│   ├── Services/
│   └── View/Components/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── components/
│   │   ├── pages/
│   │   ├── articles/
│   │   ├── programmes/
│   │   ├── events/
│   │   └── publications/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── config/
```

---

## 4. Content Types & Data Models

### 4.1 Pages (Static/CMS Pages)
| Field | Type | Notes |
|-------|------|-------|
| title | translatable string | |
| slug | string | URL-safe |
| content | translatable rich text | Main body |
| meta_title | translatable string | SEO |
| meta_description | translatable text | SEO |
| featured_image | media | Hero/banner |
| template | enum | default, full-width, two-column |
| status | enum | draft, published |

### 4.2 Articles (News/Stories)
| Field | Type | Notes |
|-------|------|-------|
| title | translatable string | |
| slug | string | |
| excerpt | translatable text | Short summary |
| content | translatable rich text | Full article |
| featured_image | media | |
| category | enum | news, story, press_release |
| tags | many-to-many | |
| published_at | datetime | |
| sdg_alignment | many-to-many | SDG goals |
| related_programmes | many-to-many | |
| status | enum | draft, published |

### 4.3 Programmes
| Field | Type | Notes |
|-------|------|-------|
| title | translatable string | |
| slug | string | |
| description | translatable text | Short description |
| content | translatable rich text | Full page |
| featured_image | media | |
| icon | string | SVG icon reference |
| themes | many-to-many | Education, Science, Culture, etc. |
| status | enum | active, archived |

### 4.4 Events
| Field | Type | Notes |
|-------|------|-------|
| title | translatable string | |
| slug | string | |
| description | translatable text | |
| content | translatable rich text | |
| event_date | date | |
| event_end_date | date | nullable |
| location | string | |
| event_type | enum | conference, workshop, webinar, meeting |
| registration_url | string | nullable |
| status | enum | upcoming, ongoing, past |

### 4.5 Publications
| Field | Type | Notes |
|-------|------|-------|
| title | translatable string | |
| slug | string | |
| description | translatable text | |
| cover_image | media | |
| file | media | PDF download |
| publication_date | date | |
| author | string | |
| category | enum | report, newsletter, handbook, policy |
| isbn | string | nullable |
| pages | integer | nullable |

### 4.6 Countries
| Field | Type | Notes |
|-------|------|-------|
| name | translatable string | |
| code | string | ISO 3166-1 alpha-2 |
| profile_url | string | Link to UNESCO country page |
| data_url | string | Link to UIS data |
| description | translatable text | |

### 4.7 Designations (UNESCO Sites)
| Field | Type | Notes |
|-------|------|-------|
| name | string | |
| type | enum | world_heritage, biosphere_reserve, creative_city, intangible_heritage, memory_of_world |
| country | belongs-to | |
| description | text | |
| external_url | string | Link to UNESCO designation page |
| image | media | |

### 4.8 Team Members
| Field | Type | Notes |
|-------|------|-------|
| name | string | |
| title | translatable string | |
| bio | translatable text | |
| photo | media | |
| email | string | |
| social_links | json | |
| sort_order | integer | |

### 4.9 Settings (Global)
| Field | Type | Notes |
|-------|------|-------|
| key | string | Unique setting key |
| value | text | |
| group | string | contact, social, seo, etc. |

---

## 5. Page Templates

### 5.1 Homepage
- Hero section with rotating banners/featured content
- About section (brief intro)
- Programmes/themes cards (4-6 featured)
- Latest news grid (4 articles)
- Stories carousel
- UNESCO designations showcase (World Heritage, Biosphere, etc.)
- Publications slider
- Get involved CTA
- Contact/map footer

### 5.2 About Page
- Office history timeline
- Mission/vision
- Team members grid
- Mandate and coverage area
- Partner institutions

### 5.3 Programme Detail Page
- Hero with programme icon/image
- Overview and objectives
- Key activities
- Related news and stories
- Publications and resources
- Impact statistics

### 5.4 News/Articles Listing
- Filter by category (news, stories, press releases)
- Filter by date
- Search functionality
- Paginated grid layout

### 5.5 Article Detail Page
- Featured image hero
- Article content with rich formatting
- Share buttons (Facebook, X, WhatsApp, LinkedIn, Email)
- Related articles sidebar
- SDG alignment badges
- Tags and categories
- Author info and publication date

### 5.6 Events Listing
- Filter by type and status (upcoming/past)
- Calendar view option
- Registration links

### 5.7 Publications Listing
- Filter by category
- Cover image grid
- Download links
- Search functionality

### 5.8 Country Profile Page
- Country overview
- Key statistics (links to UIS data)
- UNESCO presence in country
- Designations in country
- Related news

### 5.9 Contact Page
- Office address and map
- Contact form
- Team directory
- Social media links

### 5.10 Search Results
- Full-text search across all content types
- Filter by content type
- Highlighted results

---

## 6. Design System

### 6.1 Brand Colors
Based on UNESCO's current brand:
| Color | Hex | Usage |
|-------|-----|-------|
| UNESCO Blue | #0072C6 | Primary, links, buttons |
| Dark Blue | #003DA5 | Headers, footer |
| Light Blue | #E8F4FD | Backgrounds, highlights |
| White | #FFFFFF | Backgrounds |
| Dark Gray | #333333 | Body text |
| Light Gray | #F5F5F5 | Card backgrounds |
| Accent Green | #4CAF50 | Success states |
| Accent Orange | #FF9800 | Warnings, highlights |

### 6.2 Typography
- **Headings**: UNESCO brand font or fallback to Inter/Roboto
- **Body**: Inter/Roboto (400, 500, 600 weights)
- **Monospace**: For data/statistics

### 6.3 Components
- Navigation (mega-menu with dropdowns)
- Hero banners (with overlays and CTAs)
- Card grids (articles, publications, events)
- Featured content carousels
- Share buttons
- Breadcrumbs
- Pagination
- Search bar
- Footer (multi-column with links)
- Language switcher
- Newsletter subscription form

### 6.4 Accessibility
- WCAG 2.1 AA compliance
- Keyboard navigation
- Screen reader support
- High contrast mode
- Alt text for all images
- Focus indicators

---

## 7. Multilingual Support

### Languages (minimum)
- English (default)
- French
- Portuguese (if applicable to country)
- Local language(s)

### Implementation
- Spatie Laravel Translatable package
- Language switcher in header
- SEO-friendly URLs: `/en/about`, `/fr/a-propos`
- Database: JSON columns for translatable fields
- Fallback to default language

---

## 8. Admin Panel (Laravel Nova / Filament)

### Features
- Dashboard with content statistics
- CRUD for all content types
- Media library with image optimization
- SEO fields editor
- Multilingual content editing
- Role-based access (Admin, Editor, Viewer)
- Draft/publish workflow
- Scheduled publishing

---

## 9. Performance & SEO

### Performance
- Laravel page caching (Redis)
- Image optimization (WebP conversion, lazy loading)
- Minified CSS/JS via Vite
- CDN for static assets
- Database query optimization

### SEO
- Dynamic meta tags per page
- Open Graph and Twitter Card tags
- XML sitemap generation
- Canonical URLs
- Structured data (JSON-LD)
- robots.txt management

---

## 10. Development Phases

### Phase 1: Foundation (Weeks 1-2)
- [ ] Laravel project setup
- [ ] Database schema and migrations
- [ ] Authentication and admin setup
- [ ] Basic Blade layout and components
- [ ] Tailwind CSS configuration

### Phase 2: Core Content (Weeks 3-4)
- [ ] Pages CRUD and rendering
- [ ] Articles/News system
- [ ] Programme pages
- [ ] Media library integration

### Phase 3: Features (Weeks 5-6)
- [ ] Events calendar
- [ ] Publications with downloads
- [ ] Country profiles
- [ ] UNESCO designations listing
- [ ] Team members

### Phase 4: Search & Multilingual (Week 7)
- [ ] Full-text search
- [ ] Multilingual content support
- [ ] Language switcher
- [ ] SEO optimization

### Phase 5: Polish & Launch (Week 8)
- [ ] Performance testing
- [ ] Accessibility audit
- [ ] Content entry
- [ ] Deployment setup
- [ ] Documentation

---

## 11. Deployment

### Server Requirements
- PHP 8.2+
- MySQL 8+ or PostgreSQL 15+
- Redis
- Nginx or Apache
- Node.js 18+ (for build)

### Deployment Strategy
- Git-based deployment
- Environment configuration via `.env`
- Database migrations on deploy
- Queue workers for background tasks
- SSL/HTTPS enforcement

---

## 12. Maintenance

- Regular Laravel updates
- Security patches
- Content backups (daily)
- Performance monitoring
- Analytics integration (Matomo or similar)
