# Laravel Demo Multi-Tenant

Applicazione web demo sviluppata con **Laravel 12** che simula una struttura 
multi-tenant basata su company isolation — ogni azienda registrata vede 
e gestisce esclusivamente i propri clienti.

---

## Processo di sviluppo

Il progetto è stato iniziato da zero tramite terminale.

Prima ho creato la cartella di lavoro e installato Laravel:
```bash
mkdir laravel-demo-multi-tenant
cd laravel-demo-multi-tenant
laravel new laravel-demo-multi-tenant
```

Aperto il progetto in VS Code:
```bash
code .
```

Installate le dipendenze:
```bash
composer install
npm install
npm install bootstrap
```

Ho configurato il file `.env` impostando il database.
Per comodità in ambiente demo ho utilizzato **SQLite**, 
anche se per un progetto in produzione la scelta corretta sarebbe **MySQL**.
```env
DB_CONNECTION=sqlite
```

---

## Struttura del progetto

Una volta configurato l'ambiente ho seguito questo ordine:

**1. Frontend base**
Ho creato la cartella `resources/views/components/` con il file `layout.blade.php`, 
che funge da template principale condiviso da tutte le pagine.
Al suo interno ho incluso `@vite` per caricare i file CSS e JS compilati.

**2. Database**
Ho creato le migration per le tabelle `users`, `companies` e `clients`,
definendo le relazioni tra di esse.
Per verificare i dati nel database ho utilizzato **TablePlus**.

**3. Backend**
Ho creato le rotte nel file `web.php`, i controller e i model con le rispettive relazioni Eloquent.

La relazione tra `Company` e `Client` è **one-to-many**:
una company può avere molti clienti, ogni cliente appartiene a una sola company.
```php
// Company.php
public function clients() {
    return $this->hasMany(Client::class);
}

// Client.php
public function company() {
    return $this->belongsTo(Company::class);
}
```

**4. Middleware**
Ho implementato un middleware personalizzato `EnsureCompany` per proteggere 
le rotte e isolare i dati tra tenant diversi.
Ogni richiesta viene verificata: se l'utente tenta di accedere a un cliente 
che non appartiene alla sua azienda, viene bloccato con un errore 403.

**5. Frontend e grafica**
Ho personalizzato il CSS e completato le viste Blade per tutte le operazioni CRUD.
Infine ho testato il flusso completo: registrazione, login, creazione clienti, 
modifica ed eliminazione.

---

## Funzionalità

- Registrazione e login utente
- Associazione utente a una Company
- CRUD completo dei clienti isolato per company
- Middleware personalizzato per protezione accessi cross-tenant
- Paginazione sulla lista clienti
- Layout condiviso tramite Blade components

---

## Stack tecnico

| Tecnologia | Utilizzo |
|---|---|
| Laravel 12 | Framework backend |
| SQLite | Database (demo) |
| Blade | Template engine |
| Bootstrap | CSS framework |
| Vite | Asset bundling |
| TablePlus | Gestione visuale del database |

---

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

---

## Note

Progetto creato come demo tecnica per mostrare la gestione di architetture 
multi-tenant in Laravel.
I progetti in produzione (QuotigyDash, CreatorLedger) seguono la stessa logica 
con funzionalità estese come fatturazione, gestione ruoli
