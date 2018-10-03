# LazyFixtures

**LazyFixtures**  it's for lazy developers, who do not mind messing up their model layer a bit,
if they will have absolute amazing fixtures in minutes.

Install the package with:

```console
composer require gmoqa/lazy-fixtures --dev
```

## Basic Usage

This will be easy, promise of lazy

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Annotation\LazyFixtures;

/**
 * @LazyFixtures\Entity(quantity=50)
 */
class Brand
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @LazyFixtures\Field(type="domainWord")
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="brands")
     * @LazyFixtures\Relation
     */
    private $createdBy;
}
```

_**LazyFixtures** use the [fzaninotto/Faker](https://github.com/fzaninotto/Faker) library to create
the fixtures, so you can use any type of those supported by faker._

* @LazyFixtures\Field(type="datetime")

* @LazyFixtures\Field(type="sentence")

* ...etc

Now  run the following command.

```console
php bin/console lazy:fixtures:load
```

That's all, easy, right?

## Dependencies 

I said it would be simple

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Annotation\LazyFixtures;

/**
 * @LazyFixtures\Entity(quantity=50, dependencies={"Brand", "User"})
 */
class Brand
{
    ...
}
```

## Summary

1) Add `use` on your target entity.
2) Add `@LazyFixtures\Entity` Annotation on your target entity.
3) Add `@LazyFixtures\Field` Annotation on your target properties.
4) Add `@LazyFixtures\Relation` Annotation on your target `OneToMany/ManyToOne property. 
5) Run the command. 

Thats is All. 

Happy Coding! ☕️

## Roadmap

* Support custom providers.
* Ultra Lazy Mode (whitout any Annotations).



