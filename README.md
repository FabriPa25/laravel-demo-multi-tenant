# Laravel Demo Multi-Tenant

Applicazione demo sviluppata con Laravel 12 per mostrare una struttura **multi-tenant** 
basata su company isolation — ogni azienda vede e gestisce solo i propri clienti.

## Funzionalità

- Registrazione e login utente
- Ogni utente è associato a una Company
- CRUD completo dei clienti isolato per company
- Middleware personalizzato per protezione accessi cross-tenant
- Interfaccia semplice con layout Blade e CSS custom

## Stack tecnico

- **Laravel 12** — framework backend
- **SQLite** — database (per semplicità in ambiente demo)
- **Blade** — template engine
- **Vite** — asset bundling

## Architettura multi-tenant

La separazione dei dati tra tenant avviene a livello applicativo:
ogni query filtra per `company_id` dell'utente loggato.
Il middleware `EnsureCompany` verifica inoltre che nessun utente 
possa accedere a risorse di un'altra azienda tramite ID diretti nell'URL.

## Installazione
```bash
git clone https://github.com/FabriPa25/laravel-demo-multi-tenant
cd laravel-demo-multi-tenant

cp .env.example .env
composer install
npm install

php artisan key:generate
php artisan migrate
npm run build

php artisan serve
```

## Struttura principale
```
app/
├── Http/
│   ├── Controllers/
│   │   └── ClientController.php   # CRUD clienti
│   └── Middleware/
│       └── EnsureCompany.php      # isolamento tenant
├── Models/
│   ├── Client.php
│   ├── Company.php
│   └── User.php
resources/views/
├── components/
│   └── layout.blade.php
├── clients/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
```

## Note

Progetto creato come demo tecnica per mostrare la gestione
di architetture multi-tenant in Laravel.
I progetti in produzione (QuotigyDash, CreatorLedger) seguono 
la stessa logica con funzionalità estese.