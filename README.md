# News Management System

A modern news management platform built with Laravel and Vue.js.

## Features

### Content Management
- Create, edit, and delete news articles
- Category organization
- Text content support
- Full-text search
- Pagination

### Admin Panel
- News and category management
- Advanced search and filtering
- Form validation with error handling

### API
- RESTful endpoints for news and categories
- Search functionality
- Pagination support
- Proper error handling

## Tech Stack

- **Backend**: Laravel 11, MySQL
- **Frontend**: Vue.js 4, Tailwind CSS
- **Infrastructure**: Docker

## Quick Start

1. Clone and setup:
```bash
git clone https://github.com/leosanlima/news_management_laravel_vue.git
cd news_management_laravel_vue
cp .env.example .env
```

2. Start Docker containers:
```bash
docker-compose up -d
```

3. Access the application:
- Frontend: http://localhost:8000
- Admin Panel: http://localhost:8000/admin

## API Endpoints

### News
- `GET /api/news` - List all news
- `GET /api/news/{id}` - Get single news
- `GET /api/news/search` - Search news


## Development

### Available Commands

```bash
# Start development environment
docker-compose up --build
