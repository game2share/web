
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
	- available plateforms,
	- download links,
	- app manual,
- download apps,
- leave comments on an app,
- mark an app,
- search for apps,
- adapt pages to user plateform

DataBase
--------

Basic beginning db schema (will certainly be modified) :

- plateforms	[id], name
- apps			[id], name, description
- tags			[name]

- appInfos		[id], #idApp, #idPlateform, downloadPath
- appTags		[#idApp, #idTag]
- comments		[id], #idAppInfo, comment
- marks			[id], #idAppInfo, mark

in appInfos : Couple (idApp, idPlateform) is unique.

Legend :
- [] is primary key
- # is foreign key

Symfony Bundles
---------------

The application is divided in several bundles :
- app
- search
- admin

