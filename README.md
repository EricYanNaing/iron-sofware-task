# CodeIgniter Portfolio Sample

This project is a small landing page and project showcase built with CodeIgniter 4. The content is driven from a local JSON file so the pages can be updated without adding a database layer.

## Technology Used

- PHP 8.2+
- CodeIgniter 4
- Bootstrap 5.3.8
- JSON content stored in `app/Data/site-content.json`
- Modular custom CSS in `public/assets/css/site.css`
- Small client-side enhancements in `public/assets/js/site.js`

## Project Setup

1. Install PHP 8.2+ and Composer.
2. Install dependencies:

```bash
composer install
```

3. Create your local environment file:

```bash
cp env .env
```

4. Update `.env` if needed:
- Set `CI_ENVIRONMENT = development` for local development.
- Set `app.baseURL` to the URL you want to use locally.

5. Start the local server:

```bash
php spark serve
```

6. Open the app in your browser:
- Home page: `/`
- Projects page: `/projects`

## Notes

- Main layout: `app/Views/layouts/site.php`
- Home page: `app/Views/pages/home.php`
- Projects pages: `app/Views/pages/projects/`
- Content source: `app/Data/site-content.json`
