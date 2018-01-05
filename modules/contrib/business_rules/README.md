The Business rules module is inspired on Rules module and allow site
administrators to define conditionally actions execution based on events. It's
based on variables and completely build for Drupal 8.

This module has a fully featured user interface to completely allow the site
administrator to understand and create the site business rules.

It's also possible to extend it by creating new ReactsOn Events, Variables,
Actions and Conditions via plugins.

### Known issues
* There are some occasions that the subscribed events will not be available. it
happens because the getSubscribed Events in some occasions is called before 
Drupal has prepared the container. I.e.: When user add new language. If it 
happens just clear your cache.

* The reactsOn event for "Entity is viewed" is triggered only if Drupal is
loading the entity from database but not from cache. If you need to trigger this
type of rules every time entity is being viewed, you need to disable caches for 
entities.

#####Project homepage: https://www.drupal.org/business_rules
#####Documentation page: https://www.drupal.org/docs/8/modules/business-rules

#Author
* Yuri Seki
* yuriseki@gmail.com
* https://www.drupal.org/u/yuriseki
