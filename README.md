
Game2Share
==========

Game2Share is a application search and download web site.

Features
--------

- app page with :
	- app description,
	- other users comments,
	- average users mark,
	- associated tags,
	- available platforms,
	- download links,
	- app manual,
- download apps,
- leave comments on an app,
- mark an app,
- search for apps,
- adapt pages to user platform

DataBase
--------

Basic beginning db schema (will certainly be modified) :

- platforms		[id], name
- apps			[id], name, description
- tags			[id], name

- appInfos		[id], #idApp, #idPlatform, downloadPath
- appTags		[#idApp, #idTag]
- comments		[id], #idAppInfo, comment
- marks			[id], #idAppInfo, mark

in appInfos : Couple (idApp, idPlatform) is unique.

Legend :
- [] is primary key
- # is foreign key

Symfony Bundles
---------------

The application is divided in several bundles :
- app
- search
- admin

