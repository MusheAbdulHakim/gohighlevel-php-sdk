## Media Library API

```php
$client = GoHighLevel::client($access_token,'2021-07-28')->mediaLibrary();
```


### Get List of Files
```php

    $tag = $location->list($altId, $altType, $sortBy, $sortOrder, [
        //parameters
    ]);
```


### Upload File into Media Library

```php

    $tag = $location->upload([
        //parameters
    ]);
```


### Delete File or Folder

```php

    $tag = $location->delete($id, $altId, $alttype);
```