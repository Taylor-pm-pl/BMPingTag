<div align="center">
<h1>RoyalPingTag | v1.0.0<h1>
</div>
<p align="center">
<a href="https://poggit.pmmp.io/p/KillDeathSound"><img src="https://poggit.pmmp.io/shield.state/RoyalPingTag"></a>
<br>
✔️ show player's ping number under their name ✔️
</p>

<br>

## Features
- show player's ping number under their name

<br>

## Commands
| **Commands** | **Description** |
| --- | --- |
| **/royalpingtag** | **Ping Tag Commands** |

<br>

## Permissions
- use permission `royalpingtag.command` to use commands /royalpingtag

<br>

## For Developer
- You can access to RoyalPingTag by using RoyalPingTag::getInstance()
- Update ping tag usage:
```php
RoyalPingTag::getInstance()->updatePing();
```
- Set custom format usage:
```php
RoyalPingTag::getInstance()->setCustomFormat("Format Ping");
```
  
<br>

## Config
```
---
# RoyalPingTag config
# Time update ping
update-ping-interval: 1 # 1 seconds

# Format ping tags
tag-format: "§a{ping} ms"
...
```

<br>

## Install
- Step 1: Click the "Direct Download" button to download the plugin
- Step 2: move the file "RoyalPingTag.phar" into the file "plugins"
- Step 3: Restart server for plugins to work
