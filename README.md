# Eloquent Constructed Event
Eloquent model trait to add a 'constructed' event, which will fire immediately after object construction

# Install
```composer require adamthehutt/eloquent-constructed-event```

# Use
Add the trait to an Eloquent model:
```php
class MyModel extends Model
{
    use AdamTheHutt\EloquentConstructedEvent\HasConstructedEvent;
}
```

Do interesting things after model construction:
```php
public static function boot()
{
    static::registerModelEvent("constructed", function (MyModel $model) {
        $model->generateUuid();
        $model->tellTheWorldIExist();
    });
}
```
