# Your-Reselling PHP SDK 3

PHP **8.1+**, Guzzle 7, JSON. 599 konkrete Methoden mit nativen Parametertypen und PHPDoc-Array-Shapes für IDE-Autovervollständigung, Tooltips und Analysewerkzeuge. PHPDoc gibt es schon lange; hierfür sind keine PHP-8-Attribute nötig. Die API-Attribute im Laravel-Backend liefern die Quelldokumentation für diesen Client.

```sh
composer install
composer test
```

In einem anderen Projekt über das GitHub-Repository einbinden:

```json
{
  "repositories": [{"type": "vcs", "url": "https://github.com/YourReselling/php-client"}],
  "require": {"your-reselling/php-client": "^3.0"}
}
```

Danach `composer update your-reselling/php-client` ausführen. Das Paket ist über GitHub verfügbar; ein Packagist-Eintrag ist für diese Installation nicht erforderlich.

```php
<?php
declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use YourReselling\Client;
use YourReselling\ApiException;

$client = new Client((string) getenv('RESELLING_API_KEY'));
try {
    $response = $client->api()->rootserver()->list(['page' => 1, 'per_page' => 25]);
    $payload = $response->json(); // Vollständiges Objekt: success, data, meta usw.
} catch (ApiException $error) {
    // status, errorCode, validationErrors, requestId, retryAfter
    // Bestellungen nach einem Timeout nicht blind wiederholen.
    throw $error;
}
```

Eigene Basis-URL: `new Client($key, baseUrl: 'https://api.example.com/')` hängt `v1` an. Der neue `Transport($key, 'https://api.example.com/v1')` erwartet bereits die vollständige URL; `new YourReselling\Api($transport)` liefert dieselben Ressourcen. Ein `GuzzleHttp\ClientInterface` kann in beiden Konstruktoren injiziert werden.

## Upload, Download und SSE

```php
$audio = fopen('/path/to/audio.wav', 'rb');
$result = $client->api()->inference()->create([
    'model' => $modelId,
    'file' => new YourReselling\Upload($audio, 'audio.wav', 'audio/wav'),
])->json();
fclose($audio);

$response = $client->api()->inference()->completions([
    'model' => $modelId,
    'messages' => [['role' => 'user', 'content' => 'Hallo']],
    'stream' => true,
]);
foreach ($response->events() as $event) {
    // event, data (unveränderte JSON-Zeichenkette), id
}
```

Für Binärantworten `stream()` nutzen und nach Verwendung schließen. `text()`/`json()` lesen den Body; `data()` ist ein optionaler Zugriff nur auf den `data`-Teil. Nicht alle Endpunkte besitzen dieses Envelope. Bei `204` ergibt `json()` `null`. Transkriptionen können je nach `response_format` Text statt JSON liefern; OpenAI-/Anthropic-Endpunkte verwenden eigene Antwortformate.

Anfrage-IDs werden URL-kodiert; Query-Arrays verwenden Laravel-kompatible Klammernotation. `null`-Querywerte werden weggelassen, `false` und `0` bleiben erhalten. HTTPS und Zertifikatsprüfung sind Pflicht; Redirects und automatische Retries sind aus. `Transport` erlaubt ein eigenes Timeout (Standard 120 Sekunden).

## Umstieg von Version 2

Die bisherigen Ressourcenhelfer bleiben für den Übergang vorhanden. Neue Integrationen sollten ausschließlich `$client->api()` verwenden; dies ist die vollständig generierte Oberfläche. Alte Helfer geben überwiegend nur `data` zurück. Fehler laufen jetzt einheitlich über `ApiException`. Code, der auf alte Exception-Klassen prüft, muss angepasst werden.

Der nicht mehr registrierte `PbsStorage`-Helfer wurde entfernt. Es gibt keinen stillen Ersatz durch StorageBox, da das ein anderes Produkt ist. `Credentials::__toString()` und Debug-Ausgaben enthalten keinen API-Key mehr. API-Keys gehören ausschließlich auf den Server und nicht in Browser-JavaScript oder Kundenlogs.

Methodenverzeichnis und Produktparameter: [API-Methoden](docs/api-methoden.md), [OpenAPI](spec/openapi.json). Antwortobjekte bleiben als `mixed`/Array offen, wo keine verlässlichen Backend-Schemas existieren. Preise unverändert übernehmen, insbesondere Dezimal-Strings nicht unbemerkt in Gleitkommazahlen umwandeln.

## Release-Paket bauen

Nach den lokalen Tests `python3 tools/package.py` ausführen. Das Skript verwendet nur dieses Repository und erzeugt das Paket sowie eine SHA-256-Prüfsumme unter `artifacts/`.
