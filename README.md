# Census

Helper package to interact with the Planetside 2 Census service by Daybreak Game Company.

- Steam events from the Census Websocket API
- Query the Census API endpoints
- Useful Enums
    - Faction
    - World
    - Zone
    - Platform
    - MetagameEvent
    - MetagameEventState
- Useful Data
    - ZoneEvents list

## Requirements

- PHP 8.1
- Laravel 9
- [Service ID](https://census.daybreakgames.com/#devSignup) from Daybreak Game Company

## Installation
```
composer require nicekiwi/census
```
#### Publish config
```
php artisan vendor:publish --provider="Nicekiwi\Census\CensusServiceProvider"
```

#### Add Service ID to .env
```
CENSUS_SERVICE_ID=your-service-id
```

## Usage

### StreamClient

Stream kills from all worlds on the PC platform.

```php
use Nicekiwi\Census\StreamClient;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Enums\MetagameEvent;

$client = new StreamClient(Platform::PC);

$client->subscribe([MetagameEvent::CHARACTER_DEATH], function($payload, $exception) {
    if ($exception) {
        echo $exception->getMessage();
        echo $payload;
    } else {
        var_dump($payload['attacker_character_id'] . ' killed ' . $payload['character_id']);
    }
});

/*
[
    'attacker_character_id' => '54200000000000000',
    'attacker_fire_mode_id' => '1',
    'attacker_loadout_id' => '1',
    'attacker_vehicle_id' => '0',
    'attacker_weapon_id' => '26003',
    'character_id' => '54200000000000000',
    'character_loadout_id' => '1',
    'character_vehicle_id' => '0',
    'facility_id' => '0',
    'is_headshot' => '0',
    'event_name' => 'Death',
    'timestamp' => '1510000000',
    'world_id' => '1',
    'zone_id' => '2',
]
 */
```

### ApiClient
Query the API for character information from the PC platform.

```php
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\ApiClient;

$client = new ApiClient(Platform::PC);

$ids = ['5428010618020694593'];

$detail = $client->request('character', [
    'character_id' => implode(',', $ids),
    'c:resolve' => 'world',
    'c:show' => 'character_id,world_id'
]);

var_dump($detail);

/*
[
    [
        'character_id' => '5428010618020694593',
        'world_id' => '17'
    ]
]
*/
```

etc
